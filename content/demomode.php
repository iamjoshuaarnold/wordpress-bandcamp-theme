<?php
function bandcamp_demomode_leftside() {
?>
<li id="trydemo">
   <label for="tryme"><?php _e('Try Me:'); ?></label>
   <form id="domainform" method="post" action="<?php bloginfo('home'); ?>">
	<div>
		<input type="text" name="BandcampDomain" id="BandcampDomain" size="15" /><br />
		<input type="submit" value="<?php esc_attr_e('Go'); ?>" />
	</div>
	</form>
</li>
<?php
}




add_action('bandcamp_leftside', 'bandcamp_demomode_leftside', 1);
?>
