<?php
get_header();

pageBanner(array(
    "title"=> get_the_title(),
));
?>

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
        <p> <?= the_content() ?> </p>
    </div>
</div>
<?php

get_footer();
?>