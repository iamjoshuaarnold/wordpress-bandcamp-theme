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
		$bandcampImage = get_bloginfo('template_url') . "/images/Bandcamp-100x100.jpg";
		$site4fansImage = get_bloginfo('template_url') . "/images/Site4FansBCtheme-promo-100x100.jpg";
$rightside = <<< EOF
<div id="rightColumn" class="rightColumn">
	<div id="discography">
		<h3 class="title">Useful Links</h3>
		<ul title="Useful Links">
			<li>
				<div>
					<div class="thumbthumb">
						<a href="http://code.google.com/p/wordpress-bandcamp-theme/"><img class="thumbthumb" src="$googleImage" alt="Get Involved at Google Code"/></a>
					</div>
				</div>
				<div class="trackTitle"><a href="http://code.google.com/p/wordpress-bandcamp-theme/">Submit code and report bugs</a></div>
				<div class="trackYear secondaryText">Get Involved</div>
			</li>
			<li>
				<div>
					<div class="thumbthumb">
						<a href="http://bandcamp.com/"><img class="thumbthumb" src="$bandcampImage" alt="Behold! Bandcamp"/></a>
					</div>
				</div>
				<div class="trackTitle"><a href="http://bandcamp.com/">The best home on the web for your band's music</a></div>
				<div class="trackYear secondaryText">Sign up now</div>
			</li>
			<li>
				<div>
					<div class="thumbthumb">
						<a href="http://site4fans.com/"><img class="thumbthumb" src="$site4fansImage" alt="The home of fansites"/></a>
					</div>
				</div>
				<div class="trackTitle"><a href="http://site4fans.com.com/">Host your band's blog for FREE</a></div>
				<div class="trackYear secondaryText">The home of fansites</div>
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
