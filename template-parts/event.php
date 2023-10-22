<div class="event-summary">
    <?php       $eventDate = new DateTime(get_field('event_date'));?>
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