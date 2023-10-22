<?php
get_header();

pageBanner(array(
    'title' => 'All Programs',
));
?>
<div class="container container--narrow page-section">

    <ul class="link-list min-list">
        <?php
        while (have_posts()) {
            the_post();
        ?>
            <li><a href="<?= get_the_permalink() ?>"> <?= get_the_title() ?></a></li>
        <?php
        }
        echo paginate_links();
        ?>
    </ul>


    <?php
    get_footer();
    ?>