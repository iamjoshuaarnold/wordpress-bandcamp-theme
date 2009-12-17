<?php

$BandcampDomainName = false;
include_once(TEMPLATEPATH . '/functions/common.php');

// Demo Mode
if (BC_DEMO_SITEURL == get_bloginfo('url')) {
	// disable wp-supercache for the demo
	if (!defined('DONOTCACHEPAGE')) define( 'DONOTCACHEPAGE', true);
	
	// include the demomode functions
	include_once(TEMPLATEPATH . '/functions/demomode.php');
	add_action('bandcamp_leftside', 'bandcamp_demomode_leftside', 1);
	
	if ((isset($_POST['BandcampDomain'])) &&  ($BandcampDomainName == false)) {
		$BandcampDomainName = $_POST['BandcampDomain'];
		setcookie("BandcampDomain", $BandcampDomainName);
		$_COOKIE['BandcampDomain'] = $BandcampDomainName; //set the global

	}
	if ((isset($_COOKIE['BandcampDomain'])) &&  ($BandcampDomainName == false)) {
		$BandcampDomainName = $_COOKIE['BandcampDomain'];
	} 
	Bandcamp_create_Theme($BandcampDomainName);


// DO NOT USE ANYTHING OTHER THAN DEMOMODE ATM

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
