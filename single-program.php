<?php
get_header();
pageBanner();
?>
<div class="container container--narrow page-section">
    <?php
    ?>
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Programs </a> <span class="metabox__main">
                <?php
                the_title() ?></span></p>
    </div>
    <div class="generic-content">
        <p> <?= the_content() ?> </p>
    </div>
    <?php

    $professors = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'professor',
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'related_program',
                'compare' => 'LIKE',
                'value' => '"' . get_the_ID() . '"'
            )
        )
    ));
    if ($professors->have_posts()) {
        echo "<hr class='section-break' >";
        echo '<h2 class="headline headline--medium" >' . get_the_title() . ' Professors </h2>';
        echo "<ul class='professor-cards'>";
        while ($professors->have_posts()) {
            $professors->the_post();
    ?>
            <li class='professor-card__list-item'>
                <a class="professor-card" href="<?= the_permalink() ?>">
                    <img class="professor-card__image" src="<?= the_post_thumbnail_url('professorLandscape') ?>">
                    <span class="professor-card__name"><?= the_title() ?></span>
                </a>
            </li>
    <?php
        }
        echo "</ul>";
    }
    wp_reset_postdata();
    $homepageEvents = new WP_Query(array(
        'posts_per_page' => 2,
        'post_type' => 'event',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_key' => 'event_date',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => date('Ymd'), //today
                'type' => 'numeric'
            ),
            array(
                'key' => 'related_program',
                'compare' => 'LIKE',
                'value' => '"' . get_the_ID() . '"'
            )
        )
    ));
    if ($homepageEvents->have_posts()) {
        echo "<hr class='section-break' >";
        echo '<h2 class="headline headline--medium" > Upcoming ' . get_the_title() . ' Events </h2>';

        while ($homepageEvents->have_posts()) {
            $homepageEvents->the_post();
            get_template_part('template-parts/event');
        }
    }

    ?>

</div>
<?php

get_footer();
?>