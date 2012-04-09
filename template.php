<?php
// $Id: template.php,v 1.21 2009/08/12 04:25:15 johnalbin Exp $

/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can add new regions for block content, modify
 *   or override Drupal's theme functions, intercept or make additional
 *   variables available to your theme, and create custom PHP logic. For more
 *   information, please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to fjmtheme_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: fjmtheme_breadcrumb()
 *
 *   where fjmtheme is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override any of the theme functions used in Zen core,
 *   you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_item_link()   in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and template suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440
 *   and http://drupal.org/node/190815#template-suggestions
 */


// Optionally add CSS files for the user-selected color design.
$design = theme_get_setting('fjm_design');
switch ($design) {
  case '0':
    // Default
    break;
  case '1':
    drupal_add_css(drupal_get_path('theme', 'fjmtheme') . '/css/custom/atmusica.css', 'theme', 'all');
    break;
  case '2':
    drupal_add_css(drupal_get_path('theme', 'fjmtheme') . '/css/custom/ceacs.css', 'theme', 'all');
    break;
  case '3':
    drupal_add_css(drupal_get_path('theme', 'fjmtheme') . '/css/custom/merce.css', 'theme', 'all');
    break;
}


/**
 * Implementation of HOOK_theme().
 */
function fjmtheme_theme(&$existing, $type, $theme, $path) {
  $hooks = zen_theme($existing, $type, $theme, $path);
  // Add your theme hooks like this:
  /*
  $hooks['hook_name_here'] = array( // Details go here );
  */
  // @TODO: Needs detailed comments. Patches welcome!
  return $hooks;
}

/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */
/* -- Delete this line if you want to use this function
function fjmtheme_preprocess(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

//function fjmtheme_preprocess_islandora_fjm_solr_result(&$vars, $attributes = array()) {
//  dpm ($vars);
//  $toReturn[] = theme_table(NULL, $rows, array('class' => 'islandora_solr_search_results_object'));
//}

/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */

function fjmtheme_preprocess_page(&$vars, $hook) {

  // Optionally add CSS files for the user-selected color design.
  $design = theme_get_setting('fjm_design');
  $vars['design'] = $design;

//dsm($design);
}


/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function fjmtheme_preprocess_node(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // fjmtheme_preprocess_node_page() or fjmtheme_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $vars['node']->type;
  if (function_exists($function)) {
    $function($vars, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function fjmtheme_preprocess_comment(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function fjmtheme_preprocess_block(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */


/**
* Theme override for theme_menu_item()
*/
function phptemplate_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
  $class = ($menu ? 'expanded' : ($has_children ? 'collapsed' : 'leaf'));
  if (!empty($extra_class)) {
    $class .= ' '. $extra_class;
  }
  if ($in_active_trail) {
    $class .= ' active-trail';
  }
 
  // Add semi-unique class
  $class .= ' ' . preg_replace("/[^a-zA-Z0-9]/", "", strip_tags($link));
 
  return '<li class="'. $class .'" id="' . $id . '">'. $link . $menu ."</li>\n";
}

/**
 * Theme override for theme_menu_item_link()
 */
function phptemplate_menu_item_link($link) {
	if (empty($link['localized_options'])) {
		$link['localized_options'] = array();
	}
	
	// Add a unique identifier to the link
	if (!empty($link['mlid'])) {
		$link['localized_options']['attributes']['id'] = "menu-item-id-".$link['mlid'];
	}
	
	return l($link['title'], $link['href'], $link['localized_options']);
}

// change default file field size from 60 to 40
function phptemplate_file($element){
  $element['#size'] = 40;
  return theme_file($element);
}



/**
* Theme's a form table for this module.
*
* @param array $element
* A Drupal Form Element.
*
* @return sting
* HTML that renders a table of settings for datastreams.
*/
function fjmtheme_scholar_search_results_table(array $element) {
  /* We might need to redo the table header theming */
  /* '#header' => array(theme('table_select_header_cell'), $title), */

  /* set caption */

  //$element['caption'] = $element['#header'][1];
  
  //$element['#header'][1] = t('Title') . ', ' . t('Bibliography');


  $rows = array();
  foreach (element_children($element['rows']) as $child) {
    $setting = $element['rows'][$child];
    $pid = $setting['#pid'];
    $fields = array(
      drupal_render($element['selections'][$pid]) // First field is a checkbox
    );
    foreach (element_children($setting) as $property) {
      $field = $setting[$property];
      $fields[] = drupal_render($field);
    }
    $rows[] = array(
      'data' => $fields,
      'class' => isset($setting['#attributes']['class']) ? $setting['#attributes']['class'] : NULL
    );
  }
  $attributes = isset($element['#id']) ? array('id' => $element['#id']) : NULL;

  return '<div class="scholar-search-results">' . theme_table($element['#header'], $rows, $attributes, $element['#caption'] ) . '</div>';

}
