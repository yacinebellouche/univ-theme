<?php
//use this inside a folder in the wp-content under the name mu-plugins ( must used )  

function university_post_types()
{
    register_post_type('event', array(
        'rewrite'=>array('slug'=>'events'),
        'supports'=>array('excerpt','title','editor'),
        'has_archive'=>true,
        'public' => true,
        'menu_icon' => 'dashicons-calendar',
        'show_in_rest'=> true,
        'labels' => array(
            'name'=>'Events',
            'add_new_item' =>'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        ),
    ));
}


add_action('init', 'university_post_types');