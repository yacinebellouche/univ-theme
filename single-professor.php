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
        <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home </a> <span class="metabox__main">
                <?php
                the_title() ?></span></p>
    </div>
    <div class="generic-content">
        <h2> <?= the_title() ?> </h2>
        <p> <?= the_content() ?> </p>
    </div>
    <?php
    $relatedPrograms = get_field('related_program');
    if ($relatedPrograms) {
        echo'<hr class ="section-break">';
        echo'<h2 class="headline headline--medium"> Subject(s) Taught </h2>';
        echo "<ul class='link-list min-list'>";
        foreach ($relatedPrograms as $program) { ?>
            <li><a href="<?= get_the_permalink($program) ?>"> <?= get_the_title($program) ?> </a></li>

    <?php
        }
        echo '</ul>';
    }
    ?>


</div>
<?php

get_footer();
?>