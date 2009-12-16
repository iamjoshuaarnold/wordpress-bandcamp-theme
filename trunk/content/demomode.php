<?php
// disable wp-supercache for the demo
define( 'DONOTCACHEPAGE', true);


//print_r($_POST);

// Set domain name
if (isset($_POST['BandcampDomain'])) {
	$BandcampDomainName = $_POST['BandcampDomain'];
	if (false === ($bandcamp_html = bandcamp_demomode_check($BandcampDomainName))) {
		add_action('bandcamp_content', 'bandcamp_demomode_error');
	} else {
		// print_r($bandcamp_html);
	}
}

function bandcamp_demomode_check($BandcampDomainName) {
	$blacklist = array(
		'bandcamp.com', 'dom.bandcamp.com'
		);
	if (in_array($BandcampDomainName,$blacklist)) return false;
	
	$bcip = gethostbyname('dom.bandcamp.com');
	$urip = gethostbyname($BandcampDomainName);
	
	if ($bcip != $urip) return false;

//echo $urip;
include_once(TEMPLATEPATH . '/classes/GETDocument.php');
	$get = new GETDocument($BandcampDomainName);
	return $get->get_html($BandcampDomainName);

}




function bandcamp_demomode_error() {
	echo '
		<p class="alert alertActive">ERROR: Invalid Bandcamp domain name, please try again!</p>
	';
}




function bandcamp_demomode_leftside() {
?>
<li id="trydemo">
   <form id="domainform" method="post" action="<?php bloginfo('home'); ?>">
	<div>
		<h2>Try It Out Now!</h2>
		<label for="BandcampDomain"><?php _e('Enter your Bandcamp domain:'); ?></label>
		<input type="text" name="BandcampDomain" id="BandcampDomain" size="15" />
		<br />
		<input type="submit" value="<?php esc_attr_e('Go'); ?>" />
		<input type="button" value="<?php esc_attr_e('Reset'); ?>" />
		<br />
		*not working yet!
	</div>
	</form>
</li>
<?php
}




add_action('bandcamp_leftside', 'bandcamp_demomode_leftside', 1);
?>
