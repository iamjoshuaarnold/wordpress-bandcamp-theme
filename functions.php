<?php

$BandcampDomainName = '';
include_once(TEMPLATEPATH . '/BandcampContent/headerimage.php');


if (BC_DEMO_SITEURL == get_bloginfo('siteurl')) {
	include_once(TEMPLATEPATH . '/content/demomode.php');
} elseif (!isset($BandcampDomainName) || $BandcampDomainName == '') {
	include_once(TEMPLATEPATH . '/content/unconfigured.php');
} else {
	// include_once(TEMPLATEPATH . '/content/unconfigured.php');

// This should be loaded if we do not have a stored array or need to
// refetch the bandcamp html
include_once(TEMPLATEPATH . '/classes/DOMDocument.php');

/*** fetch the html ***/
$html = file_get_contents('http://music.bff.site4fans.com/');

/*** a new dom object ***/
$dom = new ExtendedDOMDocument;
$dom->strictErrorChecking = false;
/*** load the html into the object ***/
$dom->loadHTML($html);

/*** discard white space ***/
$dom->preserveWhiteSpace = false;

//$body = $dom->documentElement->getElementsByTagName('div');
//rightColumn

$rightColumn = $dom->getElementById('rightColumn');

//echo $dom->saveXML($rightColumn);



$bandcamp = $dom->toArray();

}



?>
