	<div class="hwrapper" id="header">
		<div id="top-strip">
			<div class="grids-24">
				<div class="grid-8">
					<ul class="left">
						<li><a href="http://cymail.iastate.edu/">CyMail</a></li>
						<li><a href="http://exchange.iastate.edu/">Outlook</a></li>
						<li><a href="http://webct.its.iastate.edu/">WebCT</a></li>
						<li><a href="http://bb.its.iastate.edu/">Blackboard</a></li>
						<li><a href="http://accessplus.iastate.edu/">AccessPlus</a></li>
					</ul>
				</div>
				<div class="grid-16">
					<ul class="right">
						<?php
							foreach (range('A', 'Z') as $l)
								echo '<li class="idx"><a href="http://www.iastate.edu/index/', $l, '/">', $l, '</a></li>';
						?>
						<li><a href="http://info.iastate.edu/">Directory</a></li>
						<li><a href="http://www.fpm.iastate.edu/maps/">Maps</a></li>
						<li><a href="http://www.iastate.edu/contact/">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="ribbon">
			<div class="grids-24">
				<div class="grid-16">
					<h1 class="nameplate">
						<a accesskey="1" href="http://www.iastate.edu/">
							<img alt="Iowa State University" src="<?php print base_path() . drupal_get_path('theme', 'isu_template_base'); ?>/img/sprite.png"/>
						</a>
					</h1>
				</div>
				<div class="grid-8">
					<form action="http://google.iastate.edu/search" method="GET">
						<input name="output" type="hidden" value="xml_no_dtd"/>
						<input name="client" type="hidden" value="default_frontend"/>
						<input name="site" type="hidden" value=""/>
						<input name="proxystylesheet" type="hidden" value="default_frontend"/>
						<input accesskey="s" name="q" placeholder="Search" tabindex="1" type="text"/>
						<input name="btnG" title="Search" type="submit" value=""/>
					</form>
				</div>
			</div>
			<div class="grids-24">
				<div class="grid-12">
					<h2 class="site-title"><a href="<?php print $front_page; ?>"><?php print $site_name; ?></a></h2>
				</div>
				<div class="grid-12">
					<h2 class="site-tagline"><?php if ($site_slogan) print $site_slogan; ?></h2>
				</div>
			</div>
		</div>
	</div>
	<div id="container">
		<?php if ($isu_titlebar): ?>
		<div class="grids-24" id="titlebar">
			<div class="grids-24"><h1 class="titlebar">
			<?php print $isu_titlebar; ?>
			</h1></div>
		</div>
		<?php endif; ?>
		<div class="grids-24">
			<div class="grid-5 sidebar" id="left-sidebar">
				<?php print render($page['sidebar_first']) ?>
			</div>
			<?php
				// XXX: what is $picture?
				$picture = 0;
				if ((count($page['sidebar_right'])) || ($picture))
					$gridClass = 'grid-13';
				else
					$gridClass = 'grid-19';
			?>
			<div class="<?php echo $gridClass; ?>" id="content">
				<div class="header gutter">
					<?php print render($tabs); ?>
					<?php
						if ($show_messages)
							echo $messages;

						if ($action_links)
						{
							echo '<ul class="action-links left">';
							print render($action_links);
							echo '</ul>';
						}

						print render($page['help']);
					?>
					<?php print render($page['above_content'])?>
					<?php if (count($page['right_corner'])) print render($page['right_corner']) ?>
					<?php echo '<h1>', $title, '</h1>'; ?>
					<?php print $breadcrumb; ?>
					<?php
						//	dprint_r($variables);
						//	dprint_r($page['content']);
						//	print render($tabs); -- Moved above the page title
						//	print render($page['help']); -- See above
					?>
				</div>
				<div class="gutter">
					<?php print render($page['content']) ?>
				</div>
			</div>
			<?php if (count($page['sidebar_right'])) {?>
			<div class="grid-6 sidebar" id="right-sidebar">
				<?php print render($page['sidebar_right'])?>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="fwrapper grids-24">
		<div class="grids-24" id="footer">
			<div class="grid-3 first">
				<a class="nameplate" href="/"><img alt="Iowa State University" src="<?php print $base_path . drupal_get_path('theme', 'isu_template_base'); ?>/img/sprite.png"></a>
			</div>
			<div class="grid-21 last">
				<?php print render($page['footer'])?>
			</div>
		</div>
	</div>
