<?php
get_header();

pageBanner(array(
    "title" => "All Events",
));
?>

<div class="container container--narrow page-section">
    <?php

    while (have_posts()) {
        the_post();
        get_template_part('template-parts/content-event');
    }
    echo paginate_links();
    ?>

    <hr class='section-break'>
    <p> How about you check the previous <a href="<?= site_url("/past-events") ?>"> Events ? </a> </p>

</div>

<?php
get_footer();
?>