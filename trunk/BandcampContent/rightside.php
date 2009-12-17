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
		$googleImage = get_bloginfo('template_url') . "/images/WPBC-Google-code-100x100.jpg";

$rightside = <<< EOF
<div id="rightColumn" class="rightColumn">
	<div id="discography">
		<h3 class="title">Useful Links</h3>
		<ul title="Get Involved at Google Code">
			<li>
				<div>
					<div class="thumbthumb">
						<a href="http://code.google.com/p/wordpress-bandcamp-theme/"><img class="thumbthumb" src="$googleImage" alt="Get Involved at Google Code"/></a>
					</div>
				</div>
				<div class="trackTitle"><a href="http://code.google.com/p/wordpress-bandcamp-theme/">Submit code and report bugs</a></div>
				<div class="trackYear secondaryText">Get Involved</div>
			</li>
		</ul>
	</div>
</div>
EOF;

	}
	echo $rightside;
}
add_action('bandcamp_rightside', 'bandcamp_rightside');
?>
