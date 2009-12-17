<?php
class BandcampMsg {
	public $error;
}
$BandcampMsg = new BandcampMsg;
include_once(TEMPLATEPATH . '/classes/DOMDocument.php');
$bandcamp_dom = new ExtendedDOMDocument;

function Bandcamp_check_BlackList($BandcampDomainName) {
	global $BandcampMsg;
	// we could combine this with a user defined list
	$BlackList = array(
			'bandcamp.com', 'dom.bandcamp.com', 'test.bandcamp.com'
		);
	if (in_array($BandcampDomainName,$BlackList)) {
		$BandcampMsg->error = 'The domain name is not allowed';
		return false;
	}
	// these should be cached on your server when used (standard DNS lookup)
	$bcip = gethostbyname('dom.bandcamp.com');
	$urip = gethostbyname($BandcampDomainName);
	// we could store these but would need a timeout just in case
	if ($bcip != $urip) {
		$BandcampMsg->error = 'The domain name does not point to Bandcamp';
		return false;
	}
}

function Bandcamp_create_Theme($BandcampDomainName) {
		global $BandcampMsg;
		global $bandcamp_dom;
	if  ($BandcampDomainName != false){
		if (false === Bandcamp_check_BlackList($BandcampDomainName)) {
			Bandcamp_check_BlackList($BandcampDomainName);
			
			add_action('bandcamp_content', 'bandcamp_error_msg');
		} else{
	
		include_once(TEMPLATEPATH . '/classes/GETDocument.php');		
		$bandcamp_get = new GETDocument($BandcampDomainName, $Blacklist);
	
			if (false === $bandcamp_get->html($BandcampDomainName)) {
				$BandcampMsg->error = 'The Bandcamp domain name is not in use';
				add_action('bandcamp_content', 'bandcamp_error_msg');
				$BandcampDomainName = false;

			} else {
				/*** discard white space ***/
				$bandcamp_dom->preserveWhiteSpace = false;

				//$bandcamp_dom->validateOnParse = false;
				//$bandcamp_dom->strictErrorChecking = false;
				
				/*** load the html into the object ***/
				$oer = error_reporting(0); //turn off errors
				$bandcamp_dom->loadHTML($bandcamp_get->html($BandcampDomainName));
				error_reporting($oer); // restore errors
			}
		}
	}
	// Do page
	include_once(TEMPLATEPATH . '/BandcampContent/headerimage.php');
	include_once(TEMPLATEPATH . '/BandcampContent/rightside.php');
}

function bandcamp_error_msg($error) {
	global $BandcampMsg;
	//if ($BandcampMsg->error) {
	echo '<p class="alert alertActive">ERROR: ' . $BandcampMsg->error . '</p>';
}

?>
