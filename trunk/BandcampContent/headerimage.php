<?php


function bandcamp_headerimg() {
	global $BandcampDomainName;
	global $bandcamp_dom;
	//$bandcamp_dom =& new ExtendedDOMDocument;
	
	if ($BandcampDomainName != false) {
		$html = $bandcamp_dom->getElementById('customHeader');
		if ($html) {
			$customHeader = $bandcamp_dom->saveXML($html);
		}
		//add_action('bandcamp_headerimg', 'bandcamp_configured_headerimg', 1);
	} else {
		$headerImage = get_bloginfo('template_url') . "/images/WordPress-Bandcamp-Theme-975x86-png8-64color.png";
		$customHeader = '<div id="customHeader">';
		$customHeader .= '	<a href="$headerLink/"><img id="headerImage" src="' . $headerImage . '" /></a>';
		$customHeader .= '</div>';
	}
	
	
	$headerImage = get_bloginfo('template_url') . "/images/WordPress-Bandcamp-Theme-975x86-png8-64color.png";
	$headerLink = get_option('home');
	$headerName = get_bloginfo('name');
	$headerDesc = get_bloginfo('description');
echo <<<END
		<!--<div id="header">-->
				<h1 class="hiddenAccess"><a href="$headerLink/">$headerName</a></h1>
				<div class="hiddenAccess description">$headerDesc</div>
			<div id="customHeaderWrapper">
				$customHeader
			</div>
		<!--</div>-->
END;
	
}
add_action('bandcamp_headerimg', 'bandcamp_headerimg', 1);
?>
