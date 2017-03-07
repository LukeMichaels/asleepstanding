<?php
/*
 *  Author: Luke Michaels
 *  Custom functions, support, custom post types and more.
 */

// Remove Admin bar
function remove_admin_bar() {
  return true;
}

// :::::::::: External Modules/Files ::::::::::

// Theme support options
require_once(get_template_directory().'/assets/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php');
//require_once(get_template_directory().'/assets/functions/menu-walkers.php');

// Add custom post type(s)
require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php');

// Adds support for multiple languages
//require_once(get_template_directory().'/assets/translation/translation.php');

// Customize the WordPress login menu
require_once(get_template_directory().'/assets/functions/login.php'); 

// Customize the WordPress admin
require_once(get_template_directory().'/assets/functions/admin.php'); 

// WooCommerce Theme Support
require_once(get_template_directory().'/assets/functions/woocommerce.php');


// :::::::::: Other Functions ::::::::::

// Create menu for pages
function wpb_list_child_pages() { 
  global $post;
  global $string;
  if ( is_page() && $post->post_parent )
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
  else
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
  if ( $childpages ) {
    $string = '<ul>' . $childpages . '</ul>';
  }
  return $string;
}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var) {
  return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist) {
  return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes) {
  global $post;
  if (is_home()) {
    $key = array_search('blog', $classes);
    if ($key > -1) {
      unset($classes[$key]);
    }
  } elseif (is_page()) {
    $classes[] = sanitize_html_class($post->post_name);
  } elseif (is_singular()) {
    $classes[] = sanitize_html_class($post->post_name);
  }

  return $classes;
}

?>
