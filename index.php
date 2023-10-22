<!--Blog page-->
<?php
get_header();

pageBanner(array(
    "title"=> "Welcome to the Blog Page",
    "subtitle"=>"Catch up with the latest News"
));
?>
<div class="container container--narrow page-section">
    <?php
    while (have_posts()) {
        the_post();
    ?>

        <div class="post-item">
            <h2 class="headline headline--medium headline--post-title"><a href="<?= the_permalink() ?>"><?php the_title() ?></a></h2>
            <div class="metabox">
                <p><?php echo "Posted by ";
                    the_author_posts_link();
                    echo " on ";
                    the_time('n-j-y') ?> in <?php echo get_the_category_list(', ') ?></p>
            </div>
            <div class="generic-content">
                <p><?= the_content() ?> </p>
                <p><a class="btn btn--blue" href="<?= the_permalink() ?>"> Continue reading &raquo; </a></p>

            </div>
        </div>

    <?php
    }
    echo paginate_links();
    ?>

</div>


<?php




get_footer();
?>