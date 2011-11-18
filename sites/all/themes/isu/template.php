<?php

/**
 * @file
 * Theme functions for ISU base template.
 */

function isu_template_base_preprocess_page(&$variables) {
  // Add the title bar.
  $isu_titlebar = '';
  $titlebar = theme_get_setting('isu_titlebar');
  if (!empty($titlebar)) {
	  if (isset($variables['node']) && $variables['node']->nid==7) {
      if (theme_get_setting('isu_titlebar_show_link')) {
        $isu_titlebar = l($titlebar, theme_get_setting('isu_titlebar_link'));
      }
      else {
        $isu_titlebar = check_plain($titlebar);
      }
    }
  }
  $variables['isu_titlebar'] = $isu_titlebar;
}


function isu_template_base_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $show_crumb = theme_get_setting('isu_breadcrumb');
  $separator = '';
  if (($show_crumb == 'yes') || ($show_crumb == 'admin' && arg(0) == 'admin')) {
    $show_home_crumb = theme_get_setting('isu_breadcrumb_home');
    if (!$show_home_crumb) {
      array_shift($breadcrumb);
    }
    if (!empty($breadcrumb)) {
      $separator = theme_get_setting('isu_breadcrumb_separator');
    }
    return '<div class="breadcrumb">' .  implode($separator, $breadcrumb) . '</div>';
  }
  return '';
}
