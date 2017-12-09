<?php
	require('simple_html_dom.php');
	function get_price($find){
	$url = 'http://tgftp.nws.noaa.gov/data/observations/metar/stations/'.$find.'.TXT';
	
	$text=file_get_html($url)->plaintext;
	return $text;
	}
	?>