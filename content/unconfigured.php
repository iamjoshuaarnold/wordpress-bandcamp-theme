<?php
function bandcamp_unconfigured_content() {
	echo '
		<p class="alert alertActive">NOTICE: This theme is not yet linked to a Bandcamp domain name,
		please visit your WordPress admin pages to configure it.</p>
	';
	
}

//add_action('bandcamp_headerimg', 'bandcamp_unconfigured_headerimg', 1);
add_action('bandcamp_content', 'bandcamp_unconfigured_content', 1);
//add_action('bandcamp_leftside', 'bandcamp_unconfigured_leftside', 1);
//add_action('bandcamp_rightside', 'bandcamp_unconfigured_rightside', 1);
//add_action('bandcamp_footer', 'bandcamp_unconfigured_footer', 1);


?>
