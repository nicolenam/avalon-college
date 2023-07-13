<?php
 
function post_types() {
  // Event post type
  register_post_type('event', array(
    'show_in_rest' => true,
    'rewrite' => array('slug' => 'events'),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    'menu_icon' => 'dashicons-calendar'
  ));

  //Program Post type
  register_post_type('program', array(
    'show_in_rest' => true,
    'rewrite' => array('slug' => 'programs'),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Programs',
      'add_new_item' => 'Add New Program',
      'edit_item' => 'Edit Program',
      'all_items' => 'All Programs',
      'singular_name' => 'Program'
    ),
    'supports' => array( 'title', 'editor'),
    'menu_icon' => 'dashicons-awards'
  ));
}
 

add_action('init', 'post_types');