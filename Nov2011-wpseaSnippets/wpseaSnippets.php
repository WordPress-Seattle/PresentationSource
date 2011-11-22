<?php
/*
Plugin Name: wpseaSnippets
Plugin URI: http://wpseattle.com
Description: Custom code snippet sharing plugin for the Seattle WordPress Developer Meetup group
Version: 0.1
Author: WordPress Seattle Meetup Developers
Author URI: http://wpseattle.com
*/

add_action('init', 'wpseaSnippets_init');

function wpseaSnippets_init() {
	$labels = array(
		'name' => __('WPSea Snippets'),
		'singular_name' => __('WPSea Snippets'),
		'add_new' => __('New Snippet'),
		'add_new_item' => __('Add New Snippets'),
		'edit_item' => __('Edit Snippet'),
		'new_item' => __('New Snippet'),
		'all_items' => __('All Books'),
		'view_item' => __('View Snippet'),
		'search_items' => __('Search Snippets'),
		'not_found' => __('No Snippets found'),
		'not_found_in_trash' => __('No Snippets found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'WPSea Snippets'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_in_menu' => true,
		'rewrite' => array('slug' => 'snippets'),
		'has_archive' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title', 'editor', 'author', 'comments')
	);

	register_post_type('wpseaSnippets', $args);
}
