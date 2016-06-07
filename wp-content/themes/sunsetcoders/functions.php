<?php

$defaults = array(
	'default-image'          => '',
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );

register_sidebar(array(
	'name' => 'Header Widget 1',
	'id'        => 'header-1',
	'description' => 'First Header widget area',
	'before_widget' => '<div id="header-widget1">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));

register_sidebar(array(
'name' => 'Footer Widget 1',
'id'        => 'footer-1',
'description' => 'First footer widget area',
'before_widget' => '<div id="footer-widget1">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

register_sidebar(array(
'name' => 'Footer Widget 2',
'id'        => 'footer-2',
'description' => 'Second footer widget area',
'before_widget' => '<div id="footer-widget2">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

register_sidebar(array(
'name' => 'Footer Widget 3',
'id'        => 'footer-3',
'description' => 'Third footer widget area',
'before_widget' => '<div id="footer-widget3">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

//Navagation Menus;
register_nav_menus(array('primary' => __('Primary Menu')));

add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}