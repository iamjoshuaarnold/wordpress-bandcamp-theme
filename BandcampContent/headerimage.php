<?php

function bandcamp_unconfigured_headerimg() {
	$headerImage = get_bloginfo('template_url') . "/images/WordPress-Bandcamp-Theme-975x86-png8-64color.png";
	$headerLink = get_option('home');
	$headerName = get_bloginfo('name');
	$headerDesc = get_bloginfo('description');
echo <<<END
		<!--<div id="header">-->
				<h1 class="hiddenAccess"><a href="$headerLink/">$headerName</a></h1>
				<div class="hiddenAccess description">$headerDesc</div>
			<div id="customHeaderWrapper">
				<div id="customHeader">
					<a href="$headerLink/"><img id="headerImage" src="$headerImage" /></a>
				</div>
			</div>
		<!--</div>-->
END;
	
}


	add_action('bandcamp_headerimg', 'bandcamp_unconfigured_headerimg', 1);

if (!isset($BandcampDomainName) || $BandcampDomainName == '') {
	add_action('bandcamp_headerimg', 'bandcamp_unconfigured_headerimg', 1);
} else {
	
}

?>
