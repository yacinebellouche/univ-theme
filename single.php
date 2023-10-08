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
        <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog') ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a> <span class="metabox__main">
                <?php
                the_post();
                echo "Posted by ";
                the_author_posts_link();
                echo " on ";
                the_time('n-j-y') ?> in <?php echo get_the_category_list(', '); ?></span></p>
    </div>
    <div class="generic-content">
        <h2> <?= the_title() ?> </h2>
        <p> <?= the_content() ?> </p>
    </div>
</div>
<?php

get_footer();
?>