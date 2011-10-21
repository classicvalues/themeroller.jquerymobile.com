<?php
	//php script use to query the kuler-api
	//using timeSpan constraint on every query to improve performance
	//kuler api consists of a few url params:
	//search.cfm used to search by tag, title, hex value
	//get.cfm gets certain listTypes

	//referenced in $kuler_key below
	//private file that stores the kuler-api key being used
	require_once( "kuler-api-key.php" );
	
	$post = $_POST;
	
	$query_string = '';
	foreach($post as $key => $p) {
		$query_string .= '&' . $key . '=' . $p;
	}
	
	
	header("Content-type: text/xml");
	if(isset($post['list'])) {
		echo( file_get_contents("http://kuler-api.adobe.com/rss/get.cfm?" . $query_string. "&key=" . $kuler_key));
	} else if(isset($post['search'])) {
		echo( file_get_contents("http://kuler-api.adobe.com/rss/search.cfm?" . $query_string . "&key=" . $kuler_key));
	}
?>
