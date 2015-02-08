<?php

$chbizcookie = "chbizanon12222";

$db_host = "localhost";
$db_user = "sharkattack";
$db_pwd = "sunactual8";
$db_name = "sharkattack";
$db_table = "BizUser";

$biz_name = "matt";
$biz_email = "matt@sharkattackmusic.com";
$biz_company = "SRK";
$biz_website = "www.sharkattackmusic.com";

	// connect to db
	$connection_handle = mysql_connect ($db_host, $db_user, $db_pwd)
		or die("*** Can't connect to database server. Try kicking it. ***");

	// select db
	mysql_select_db($db_name, $connection_handle)
		or die ("*** Unable to select database. God said no. ***");

	// look for highest RowID in db
	$biz_matchquery = mysql_query("SELECT Email, Visits FROM $db_table WHERE Email = '$biz_email'");
	$biz_match = mysql_fetch_array($biz_matchquery);

	$biz_rowid = substr($chbizcookie, 9);
	$rowidchop = strlen($biz_rowid);
	$biz_type = substr($chbizcookie, 0, -$rowidchop);

	echo '<pre>Got this row:';
	var_dump ($biz_match);
	echo '</pre>';

	echo $biz_type . "<--Biz Type<br>";
	echo $biz_rowid . "<--Row ID<br>";
	echo $cookielength . "<br>";
	echo $rowidchop . "<br>";

	// Close db connection
	mysql_close($connection_handle);

?>