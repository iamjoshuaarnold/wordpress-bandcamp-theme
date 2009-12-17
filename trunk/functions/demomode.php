<?php
function bandcamp_demomode_leftside() {
	?>
	<li id="trydemo">
		<form id="domainform" method="post" action="<?php bloginfo('home'); ?>">
			<div>
				<h2>Try It Out Now!</h2>
				<label for="BandcampDomain"><?php _e('Enter your Bandcamp domain:'); ?></label>
				<input type="text" name="BandcampDomain" id="BandcampDomain" size="15" value="<?php echo $_COOKIE['BandcampDomain']; ?>"/>
				<br />
				<input type="submit" value="<?php esc_attr_e('Go'); ?>" />
				<input type="button" value="<?php esc_attr_e('Reset'); ?>" />
				<br />
				<span>*not working yet!</span>
			</div>
		</form>
	</li>
	<?php
}

?>
