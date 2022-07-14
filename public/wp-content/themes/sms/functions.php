<?php

function sms_custom_scripts(){
	
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js');
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );

	wp_enqueue_style( 'sms', get_template_directory_uri() . '/css/sms.css' );
	
	wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js');

	wp_enqueue_script( 'sms', get_template_directory_uri() . '/js/sms.js');
	
	
}

add_action( 'wp_enqueue_scripts', 'sms_custom_scripts' );



//customize excerpt
function sms_custom_excerpt_length(){
	return 20;
}

add_filter('excerpt_length', 'sms_custom_excerpt_length');


function sms_setup(){
	
	// Navigation menus
	register_nav_menus(array(
		'primary' => __('Primary Menu'),
		'footer' => __('Footer Menu'),
	));

	//add featured image support
	add_theme_support('post-thumbnails');
	
	add_image_size('small-thumbnail', 180, 120, true);
	add_image_size('banner-image', 920, 210, true);
}

add_action('after_setup_theme', 'sms_setup');

//add widget locations
function sms_widgets_init(){
	
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => 'Newsletter',
		'id' => 'newsletter',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) );
	
}

add_action('widgets_init', 'sms_widgets_init');
