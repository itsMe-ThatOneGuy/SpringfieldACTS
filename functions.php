<?php

function springfieldacts_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'springfieldacts_theme_support');

function springfieldacts_register_scripts()
{
    wp_enqueue_script('springfieldacts-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'springfieldacts_register_scripts');

function springfieldacts_register_styles()
{
    wp_enqueue_style('springfieldacts-style', get_stylesheet_uri(), array('springfieldacts-normalize'), "1.0", "all");
    wp_enqueue_style('springfieldacts-normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css', array());
}
add_action('wp_enqueue_scripts', 'springfieldacts_register_styles');

function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu')
        )
    );
}
add_action('init', 'register_my_menus');

function get_first_image_url($post_id = null)
{
    // Use the global $post object if no post ID is provided
    if (!$post_id) {
        global $post;
        $post_id = $post->ID;
    }

    // Get the post content
    $post_content = get_post_field('post_content', $post_id);

    // Search for the first <img> tag in the content
    preg_match_all('/<img[^>]+src="([^">]+)"/i', $post_content, $matches);

    // Return the first image URL if found
    if (isset($matches[1][0])) {
        return $matches[1][0];
    }

    // Return false if no image found
    return false;
}

function get_tags_by_category($category_id)
{
    $args = array(
        'category' => $category_id,
        'posts_per_page' => -1,
        'fields' => 'ids'
    );

    // Get all post IDs in the category
    $posts = get_posts($args);

    if ($posts) {
        // Get all tags associated with these posts
        $tags = wp_get_object_terms($posts, 'post_tag');
        return $tags;
    }

    return array();
}

function get_image_url_by_title($image_title)
{
    $args = array(
        'post_type'      => 'attachment',
        'post_status'    => 'inherit',
        'posts_per_page' => 1,
        'title'          => $image_title,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $query->the_post();
        $image_url = wp_get_attachment_url(get_the_ID());
        wp_reset_postdata();
        return $image_url;
    }

    return false;
}
