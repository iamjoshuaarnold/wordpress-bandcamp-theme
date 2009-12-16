<?php
class GETDocument {

	public $html;


public function __construct($BandcampDomainName) {
	
	
}







public function get_html($BandcampDomainName) {
	$headerendfound = false;

	#ok, this is self explanitory
	$socket = fsockopen($BandcampDomainName, 80, $errno, $errstr, 30);
	if (!$socket) {
		echo "$errstr ($errno)<br />\n"; // 404 here
		echo '<pre>';
		print_r($_SERVER);
		echo '</pre>';
		exit;
	} else {
		# we request the file and give a lil more info (user agent would be good here too)
		$out = "GET / HTTP/1.1\r\n";
		$out .= "Host: " . $BandcampDomainName . "\r\n";
		$out .= "User-Agent: WordPress Bandcamp theme (+http://myblogdomain.com/)\r\n";
		$out .= "Connection: Close\r\n\r\n";
		#now we use the socket
		fwrite($socket, $out);
		#we also open a temp file to dload the content to
		#this will need a lil work... not sure about file locking if 2 requests are made
		#we do not want to start streaming 2 large files or cause a race condition
		//$fp = fopen('cache/site/' . SUB_HOST . '/' . SUB_ORIGINAL . '/' . SUB_VER . '/' . SUB_ATT . '/' . SUB_FILE, 'w');
		$buffer = '';
		while (!feof($socket)) {
			$out = fgets ($socket,16384);
			if ($headerendfound) {
				# header end is found - so spit out what we get to file and browser
				//fwrite($fp, $out);
				//print $out;
				
			}
			if (!$headerendfound) {
				# header end is not found so we spit out nothing
				# BUT WE DO want to start setting php headers here
				$buffer .= $out;
			
				//print "searching for header\n";
			
				$headerend = strpos($buffer, "\r\n\r\n");
				if ($headerend !== false) {
					$headerendfound = true;

					// A good time to identify ourselves to nosy ppl
					//header("Live-Fetch-By: " . USER_AGENT . ")");

					$headers = $this->http_parse_headers($buffer);
					//print_r($headers);
					//exit;
					if ($headers['status'] !== 'HTTP/1.1 200 OK') {
						//header("Status: 404 Not Found");
						//header("Live-Fetch-Error:" . $headers['status']);
						//echo '--- 404';
						fclose($socket);
						return false;
					}
					//header("Status: 200 OK");
					//header("Content-Type: " . $headers['Content-Type']);

					//create_dirs();
					//create_link();
					//convert any spaces back to '+'
					//$file_name = str_replace(" ", "+", 'cache/site/' . SUB_HOST . '/' . SUB_ORIGINAL . '/' . SUB_VER . '/' . SUB_ATT . '/' . SUB_FILE);
					
					//$fp = fopen($file_name, 'w');
					//fwrite($fp, substr($buffer, $headerend+4));

					// Clear the buffer
					$buffer = '';
		        }
			}
		}
	}
	//fclose($fp);
	fclose($socket);
}

private function http_parse_headers($headers=false){
	if($headers === false){
		return false;
	}
    $headers = str_replace("\r","",$headers);
	$headers = explode("\n",$headers);
	foreach($headers as $value){
		$header = explode(": ",$value);
		if($header[0] && !$header[1]){
			$headerdata['status'] = $header[0];
		}
		elseif($header[0] && $header[1]){
			$headerdata[$header[0]] = $header[1];
		}
	}
	return $headerdata;
}



} // end of GETDocument class

?>
