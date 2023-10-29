<?php


add_action('rest_api_init', 'univRegisterSearch');

function univRegisterSearch()
{
    register_rest_route('univ/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'univSearchResults'
    ));
}
function univSearchResults($data)
{
    $mainQuery = new WP_Query(array(
        'post_type' => array('page', 'post', 'event', 'professor', 'program'),
        's' => sanitize_text_field($data['term']),
    ));
    $results = array(
        'generalInfo' => array(),
        'professors' => array(),
        'programs' => array(),
        'events' => array(),
    );
    while ($mainQuery->have_posts()) {
        $mainQuery->the_post();
        if (get_post_type() == 'post' or get_post_type() == 'page') {
            array_push($results['generalInfo'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'authorName' => get_the_author(),
                'type' => get_post_type(),

            ));
        }
        if (get_post_type() == 'event') {
            array_push($results['events'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'type' => get_post_type(),

            ));
        }

        if (get_post_type() == 'program') {
            array_push($results['programs'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'type' => get_post_type(),
            ));
        }
        if (get_post_type() == 'professor') {
            array_push($results['professors'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'type' => get_post_type(),
            ));
        }
        return $results;
    }
}
