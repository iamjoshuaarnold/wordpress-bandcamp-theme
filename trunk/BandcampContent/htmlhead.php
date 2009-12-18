<?php
//do_action('bandcamp_htmlhead');


function bandcamp_htmlhead_usercss() {
	global $BandcampDomainName;
	global $bandcamp_dom;
	
	if ($BandcampDomainName != false) {
		$html = $bandcamp_dom->getElementsByTagName('style')->item(0);
		if ($html) {
			$user_css = $bandcamp_dom->saveXML($html);
			echo strip_cdata($user_css);
		}
	}
}
add_action('wp_head', 'bandcamp_htmlhead_usercss');



?>
