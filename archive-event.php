<?php
get_header();

?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
            <?php the_archive_title();
            ?></h1>
        <div class="page-banner__intro">
            <p><?= the_archive_description() ?></p>
        </div>
    </div>
</div>
<div class="container container--narrow page-section">
    <?php
    while (have_posts()) {
        the_post();
        $eventDate = new DateTime(get_field('event_date'));
    ?>

<div class="event-summary">
          <a class="event-summary__date t-center" href="<?= the_permalink() ?>">
            <span class="event-summary__month"><?= $eventDate->format('M') ?></span>
            <span class="event-summary__day"><?= $eventDate->format('d') ?></span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?= the_permalink() ?>"><?= the_title() ?></a></h5>
            <p><?= wp_trim_words(get_the_content(), 15) ?><a href="<?= the_permalink() ?>" class="nu gray">Learn more</a></p>
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