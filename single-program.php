<?php
get_header();
?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
            <p>DONT FORGET TO REPLACE ME LATER</p>
        </div>
    </div>
</div>

<?php
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
            $eventDate = new DateTime(get_field('event_date'));
    ?>
            <div class="event-summary">
                <a class="event-summary__date t-center" href="<?= the_permalink() ?>">
                    <span class="event-summary__month"><?= $eventDate->format('M') ?></span>
                    <span class="event-summary__day"><?= $eventDate->format('d') ?></span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="<?= the_permalink() ?>"><?= the_title() ?></a></h5>
                    <p><?php
                        if (has_excerpt()) {
                            echo get_the_excerpt();
                        } else {
                            echo wp_trim_words(get_the_content(), 15);
                        }; ?><a href="<?= the_permalink() ?>" class="nu gray">Learn more</a></p>
                </div>
            </div>

    <?php
        }
    }

    ?>

</div>
<?php

get_footer();
?>