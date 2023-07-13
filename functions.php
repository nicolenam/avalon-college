<?php

/* Custom Post Types */

require( get_template_directory() . '/custom-posts.php');

function college_files(){
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('college_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('college_extra_styles', get_theme_file_uri('/build/index.css'));
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_script('college_main_script', get_theme_file_uri('/build/index.js'), array('jquery'),'1.0', true);
}

add_action('wp_enqueue_scripts','college_files');

function university_features(){
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerLocationOne', 'Footer Location One');
    register_nav_menu('footerLocationTwo', 'Footer Location Two');

    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'university_features');


function adjust_default_queries($query){
    if(!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()){
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('post_per_page', -1);
    }


    
    if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query',array(
                array(
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value'=> $today,
                    'type' => 'numeric'
                )
            )
        );
    }
}
add_action('pre_get_posts', 'adjust_default_queries');

// Event archive pagination
// function enable_event_archive_pagination($query) {
//     if (is_post_type_archive('event') && $query->is_main_query()) {
//         $query->set('posts_per_page', 1); 
//     }
// }
// add_action('pre_get_posts', 'enable_event_archive_pagination');



?>