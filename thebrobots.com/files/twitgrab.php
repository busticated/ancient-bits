<?php

// Your twitter username.
$username = "brobots";
// Prefix - some text you want displayed before your latest tweet. (HTML is OK, but be sure to escape quotes with backslashes: for example href=\"link.html\")
$prefix = "";
// Suffix - some text you want display after your latest tweet. (Same rules as the prefix.)
$suffix = "";
// Limit - the number of tweets you want to display
$limit = 1;

$feed = "http://search.twitter.com/search.atom?q=from:" . $username . "&rpp=" . $limit;

function parse_feed($feed) {
	$stepOne = explode("<content type=\"html\">", $feed);
	$stepTwo = explode("</content>", $stepOne[1]);

	$tweet = $stepTwo[0];
	$tweet = str_replace("&lt;", "<", $tweet);
	$tweet = str_replace("&gt;", ">", $tweet);
	// $tweet = nl2br($tweet); //add html line returns
	$tweet = str_replace(chr(10), " ", $tweet); //remove carriage returns
	$tweet = str_replace(chr(13), " ", $tweet); //remove carriage returns

	return $tweet;
}

function get_content($url) {
	$ch = curl_init();

	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_HEADER, 0);

	ob_start();

	curl_exec ($ch);
	curl_close ($ch);
	$string = ob_get_contents();

	ob_end_clean();
   
	return $string;    
};

$twitterFeed = get_content($feed);
$twitgrab = html_entity_decode(stripslashes($prefix) . parse_feed($twitterFeed) . stripslashes($suffix));

echo "var txt = '". addslashes($twitgrab) ."'; document.write(txt);"; 

?>