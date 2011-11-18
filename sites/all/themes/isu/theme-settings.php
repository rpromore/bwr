<?php

/**
 * @file
 * Provides customized form items on the theme-specific settings page.
 */

/**
 * Implements theme_settings_form().
 */
function isu_template_base_form_system_theme_settings_alter(&$form, $form_state) {
  $form['titlebar'] = array(
    '#type' => 'fieldset',
    '#title' => t('Titlebar Settings'),
    '#description' => t('Show a secondary site title with optional link in a title bar below the header.'),
  );
  $form['titlebar']['isu_titlebar'] = array(
    '#type' => 'textfield',
    '#title' => t('Titlebar'),
    '#description' => t('Enter the text you would like to display in the title bar.'),
    '#default_value' => theme_get_setting('isu_titlebar'),
  );
  $form['titlebar']['isu_titlebar_show_link'] = array(
    '#type' => 'checkbox',
    '#title' => t('Output as link'),
    '#default_value' => theme_get_setting('isu_titlebar_show_link'),
    '#description' => t('Check this box and enter the path below to display the secondary title as a link'),
  );
  $form['titlebar']['isu_titlebar_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Link'),
    '#default_value' => theme_get_setting('isu_titlebar_link'),
    '#description' => t('Enter a valid path within the site.  You may enter &lt;front&gt; to indicate the front page.'),
    '#states' => array(
      'visible' => array(
        ':input[name="isu_titlebar_show_link"]' => array('checked' => TRUE),
      ),
    ),
  );
  $form['breadcrumb'] = array(
    '#type' => 'fieldset',
    '#title' => t('Breadcrumb Settings'),
  );
  $form['breadcrumb']['isu_breadcrumb'] = array(
    '#type' => 'select',
    '#title' => t('Display Breadcrumb'),
    '#default_value' => theme_get_setting('isu_breadcrumb'),
    '#options' => array(
      'yes' => t('Yes'),
      'admin' => t('Only in admin section'),
      'no' => t('No'),
    ),
  );
  $form['breadcrumb']['breadcrumb_options'] = array(
    '#type' => 'container',
    '#states' => array(
      'invisible' => array(
        ':input[name="isu_breadcrumb"]' => array('value' => 'no'),
      ),
    ),
  );
  $form['breadcrumb']['breadcrumb_options']['isu_breadcrumb_separator'] = array(
    '#type' => 'textfield',
    '#title' => t('Breadcrumb Separator'),
    '#description' => t('Text only.  Don\'t forget to include spaces.'),
    '#default_value' => theme_get_setting('isu_breadcrumb_separator'),
    '#size' => 5,
    '#maxlength' => 10,
  );
  $form['breadcrumb']['breadcrumb_options']['isu_breadcrumb_home'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show home page link in breadcrumb.'),
    '#default_value' => theme_get_setting('isu_breadcrumb_home'),
  );

  $logo_enabled = theme_get_setting('toggle_logo', 'isu_template_base');
  if ($logo_enabled) {
    $foo = 'bar';
  }

  // By default, logos are disabled. If you want to use a logo, which
  // will be available in the theme layer as the $logo variable, comment out the section below.
  $form['logo']['default_logo']['#default_value'] = 0;
  $form['logo']['settings']['logo_path']['#type'] = 'hidden';
  $form['logo']['settings']['logo_upload']['#type'] = 'hidden';
  $form['theme_settings']['toggle_logo']['#disabled'] = TRUE;
  $form['theme_settings']['toggle_logo']['#default_value'] = 0;
  $form['theme_settings']['toggle_logo']['#description'] = t('Edit theme-settings.php to enable logo support.');
}
