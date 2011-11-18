<!DOCTYPE html>
<html>
<head>
	<title><?php echo $head_title; ?></title>
	<?php echo $head; ?>
	<?php echo $styles; ?>
	<!--[if lte IE 8]>
		<link rel="stylesheet" href="<?php print drupal_get_path('theme', 'isu_template_base'); ?>/ie-fix.css">
	<![endif]-->
	<?php echo $scripts; ?>
	<?php // Defined in CSS. jQuery hack no longer needed.
	/*<script>
	jQuery('body:not(.main_page)').css("background-color:white;");
	</script>*/ ?>
</head>
<body class="main_page <?php print $classes; ?>">
	<?php 
	//	dpm($variables);
	//	dprint_r(array_keys($variables));
	//	echo dprint_r($variables['head_title']);
	?>
	<?php print $page_top; ?>
	<?php print $page; ?>
	<?php print $page_bottom; ?>
</body>
</html>
