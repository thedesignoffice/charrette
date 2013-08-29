<div class="inner-wrapper">
	<div id="footer">
			<ul id="sidebar2">
				<?php if ( !function_exists('dynamic_sidebar')
				        || !dynamic_sidebar(2) ) : ?>
					<li>Set up sidebar 2 in "Widgets"</li>
				<?php endif; ?>	
			<ul>
			<div style="clear: left; padding: 20px 0;" class="lucida">
				<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/charrette.png">
				<a href="http://www.charrette.ws" target=_new style="border: 0;">Charrette Wordpress Theme v0.91</a>  <a href="http://thedesignoffice.org" target=_new style="padding-left: 20px; border: 0;">Project of The Design Office, Providence, R.I.</a>
			</div>
	</div>
</div>
<iframe src="/wp-mail.php" name="mailiframe" width="0" height="0" frameborder="0" scrolling="no" title=""></iframe>
<?php wp_footer(); ?>