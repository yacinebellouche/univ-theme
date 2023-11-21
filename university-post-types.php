<?php
//use this inside a folder in the wp-content under the name mu-plugins ( must used )  

function university_post_types()
{
    // Event post type
    register_post_type('event', array(
        'capability_type' => "event",
        'map_meta_cap' => true,
        'rewrite' => array('slug' => 'events'),
        'supports' => array('excerpt', 'title', 'editor'),
        'has_archive' => true,
        'public' => true,
        'menu_icon' => 'dashicons-calendar',
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        ),
    ));
    //Program post tyoe
    register_post_type('program', array(
        'rewrite' => array('slug' => 'programs'),
        'supports' => array('title'),
        'has_archive' => true,
        'public' => true,
        'menu_icon' => 'dashicons-awards',
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Programs',
            'add_new_item' => 'Add New Program',
            'edit_item' => 'Edit Program',
            'all_items' => 'All Programs',
            'singular_name' => 'Program'
        ),
    ));
    //professor post type
    register_post_type('professor', array(
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'menu_icon' => 'dashicons-businessperson',
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Professors',
            'add_new_item' => 'Add New Professor',
            'edit_item' => 'Edit Professor',
            'all_items' => 'All Professor',
            'singular_name' => 'Professor'
        ),
    ));
      //note post tyoe
    register_post_type('note', array(
        'show_in_rest' => true,
        'supports' => array('title', 'editor'),
        'public' => false,
        'show_ui' => true, // shows it in the admin dashboard
        'menu_icon' => 'dashicons-welcome-write-blog',
        'labels' => array(
            'name' => 'Notes',
            'add_new_item' => 'Add New Note',
            'edit_item' => 'Edit Note',
            'all_items' => 'All Notes',
            'singular_name' => 'Note'
        ),
    ));
}


add_action('init', 'university_post_types');
