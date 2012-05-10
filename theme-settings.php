<?php
// $Id: theme-settings.php,v 1.7 2008/09/11 09:36:50 johnalbin Exp $

// Include the definition of zen_settings() and zen_theme_get_default_settings().
include_once './' . drupal_get_path('theme', 'zen') . '/theme-settings.php';

/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   An array of saved settings for this theme.
 * @return
 *   A form array.
 */
function fjmtheme_settings($saved_settings) {

  // Get the default values from the .info file.
  $defaults = zen_theme_get_default_settings('corporate');

  // Merge the saved variables and their default values.
  $settings = array_merge($defaults, $saved_settings);

  /*
   * Create the form using Forms API: http://api.drupal.org/api/6
   */
  $form = array();


  $form['fjm_design'] = array(
    '#type'          => 'radios',
    '#title'         => t('Collection Color Scheme'),
    '#default_value' => $settings['fjm_design'],
    '#options'       => array(
      '0' => t('None (default)'),
      '1' => t('atmusica'),
      '2' => t('ceacs'),
      '3' => t('merce'),
      '4' => t('turina'),
      '5' => t('ensayos'),
     ),
    '#description'   => t('Select an option above if you wish to use a pre-designed color scheme.'),
    
  );

  // Add the base theme's settings.
  $form += zen_settings($saved_settings, $defaults);

  // Remove some of the base theme's settings.
  unset($form['themedev']['zen_layout']); // We don't need to select the base stylesheet.

  // Return the form
  return $form;
}
