<?php
get_header();
pageBanner();

?>
<div class="container container--narrow page-section">
    <?php

    $pastEvents = new WP_Query(array(
        'paged' => get_query_var('paged', 1),
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'order' => 'ASC',
        'orderby' => 'meta_value_num',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '<',
                'value' => date('Ymd'), //today
                'type' => 'numeric'
            )
        )
    ));

    while ($pastEvents->have_posts()) {
        $pastEvents->the_post();
        get_template_part('template-parts/content-event');
    }
    echo paginate_links();
    ?>

</div>


<?php




get_footer();
?>