<?php
function bandcamp_rightside() {
	global $BandcampDomainName;
	global $bandcamp_dom;
	//$bandcamp_dom =& new ExtendedDOMDocument;
	
	if ($BandcampDomainName != false) {
		$html = $bandcamp_dom->getElementById('rightColumn');
		if ($html) {
			$rightside = $bandcamp_dom->saveXML($html);
		}
	} else {
		$rightside = 'Bandcamp Discography';
	}
	echo $rightside;
}
add_action('bandcamp_rightside', 'bandcamp_rightside');
?>
