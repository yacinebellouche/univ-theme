<div class="post-item">
    <h2 class="headline headline--medium headline--post-title"><a href="<?= the_permalink() ?>"><?php the_title() ?></a></h2>
    <div class="generic-content">
        <p><?= wp_trim_words(get_field('main_body_content'), 10) ?> </p>
        <p><a class="btn btn--blue" href="<?= the_permalink() ?>"> View Program &raquo; </a></p>

    </div>
</div>