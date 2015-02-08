<?php 

// db login info for later
$db_host = "localhost";
$db_user = "sharkattack";
$db_pwd = "sunactual8";
$db_name = "sharkattack";
$db_table = "BizUser";

// error variables
$noemail = $bademail = false;

// BizAnon Processing
if (isset($_GET) && count($_GET)) { 
/* they hit anon submit */ 

	if (isset($_GET['biz_anon'])  || !empty($_GET['biz_anon'])) { 
    /* adding to the database happens right here */ 

	// connect to db
	$connection_handle = mysql_connect ($db_host, $db_user, $db_pwd)
		or die("*** Can't connect to database server. Try kicking it. ***");

	// select db
	mysql_select_db($db_name, $connection_handle)
		or die ("*** Unable to select database. God said no. ***");

	// look for highest RowID in db
	$biz_rowidquery = mysql_query("SELECT MAX(RowID) FROM $db_table");
	$biz_rowid = mysql_fetch_array($biz_rowidquery);

	// add Anon user to db
	mysql_query("INSERT INTO $db_table (Type, CreateDate) VALUES ('chbizanon', NOW())")
		or die ("*** Whoopsie Daisy. Unable to insert into db. Shit happens. ***");

  	// Anon Cookie set
	$biz_cookievalue = "chbizanon" . ++$biz_rowid["MAX(RowID)"];
	setcookie ("chbizcookie", $biz_cookievalue, time()+40000000, "/biz", "ourfriendselectric.net");

	// Close db connection
	mysql_close($connection_handle);

	/* they were added successfully, redirect them to the thank you page */ 
	Header ("Location: http://www.ourfriendselectric.net/biz/biztest.php");
	exit; 
	} 

} 

// BizUser Input
if (isset($_POST) && count($_POST)) { 
  /* they hit submit */ 

	if (!isset($_POST['biz_email']) || empty($_POST['biz_email'])) { 
	/* no email */ 
	$noemail = true; 

	} elseif (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $biz_email)) { 
	/* no email */ 
	$bademail = true; 

	} else { 

	/* adding to the database happens right here */ 

	// connect to db
	$connection_handle = mysql_connect ($db_host, $db_user, $db_pwd)
		or die("*** Can't connect to database server. Try kicking it. ***");

	// select db
	mysql_select_db($db_name, $connection_handle)
		or die ("*** Unable to select database. God said no. ***");

	// Escape Insert strings and kill off whitespace for email addy
	$biz_nameclean = mysql_real_escape_string($biz_name);
	$biz_emailclean = trim(mysql_real_escape_string($biz_email));
	$biz_companyclean = mysql_real_escape_string($biz_company);
	$biz_websiteclean = mysql_real_escape_string($biz_website);

	// look for matching record already in db
	$biz_matchquery = mysql_query("SELECT Email, Visits FROM $db_table WHERE Email = '$biz_emailclean'");
	$biz_match = mysql_fetch_array($biz_matchquery);
	$biz_visits = ++$biz_match[Visits];

	If ($biz_match[Email] == $biz_emailclean) {
		/* update if match is found */
    	mysql_query("UPDATE $db_table SET Name = '$biz_nameclean', Company = '$biz_companyclean', Website = '$biz_websiteclean', LastUpdate = NOW() WHERE Email = '$biz_email'")
			or die ("*** Dangit. Unable to update db. ***");
} else {
	mysql_query("INSERT INTO $db_table (Name, Email, Company, Website, Type, CreateDate) VALUES ('$biz_nameclean', '$biz_emailclean', '$biz_companyclean', '$biz_websiteclean', 'chbizuser', NOW())")
		or die ("*** Whoopsie Daisy. Unable to insert into db. Shit happens. ***");
}
	// Query db for cookie value
	$biz_cookiequery = mysql_query("SELECT * FROM $db_table WHERE Name = '$biz_nameclean' AND Email = '$biz_emailclean' AND Company = '$biz_companyclean' AND Website = '$biz_websiteclean'");
	$biz_cookietype = mysql_fetch_array($biz_cookiequery);

	// Set Cookie
	$biz_cookievalue = "$biz_cookietype[Type]$biz_cookietype[RowID]";
	setcookie ("chbizcookie", $biz_cookievalue, time()+40000000, "/biz", "ourfriendselectric.net");

	// Close db connection
	mysql_close($connection_handle);

	// Redirect to biz index page
      Header ("Location: http://www.ourfriendselectric.net/biz/biztest.php"); 
      exit; 
    } 

  }

if ($chbizcookie[2] == "b") {Header ("Location: http://www.ourfriendselectric.net/biz/biztest.php");}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Charlene - Media Kit</title>
<link rel="stylesheet" type="text/css" media="all" href="styles/media.css">
</head>
<body>
<div id="horizon">
<div id="center">
<div id="content">
<h1>Charlene Media Kit: Sign-in</h1>
<? if ($noname) { ?> 

<div class='error'><br>> > We need more info: Name. < <</div> 

<? } elseif ($noemail) { ?> 

<div class='error'><br>> > We need more info: Email Address. < <</div>  

<? } elseif ($nocompany) { ?> 

<div class='error'><br>> > You forgot: Company < <</div>

<? } elseif ($nowebsite) { ?> 

<div class='error'><br>> > You forgot: Website < <</div> 

<? } elseif ($bademail) { ?> 

<div class='error'><br>> > Your email address looks wrong, it needs to be in the format: you@yourisp.com < <</div> 

<? } ?>
<br>
<form method="POST" action="signup.php">
<label for="name">Name:</label>
<input type="text" name="biz_name" value="<? echo($biz_name); ?>" id="name" size="24" maxlength="64">
<label for="email">Email:</label>
<input type="text" name="biz_email" value="<? echo($biz_email); ?>" id="email" size="24" maxlength="64"><br>
<label for="company">Company:</label>
<input type="text" name="biz_company" value="<? echo($biz_company); ?>" id="company" size="24" maxlength="64">
<label for="company">Website:</label>
<input type="text" name="biz_website" value="<? echo($biz_website); ?>" id="website" size="24" maxlength="64"><br>
<input type="image" src="images/submit.gif" name="submit" alt="Click here to sign up">
</form>
<br>
<br>
<br>
<br>
<a href="signup.php?biz_anon=true">Anon User</a>
<br>
<? echo $bizcookievalue; ?>
<br>
<a href="biztest.php">retest</a>
</div>
</div>
</div>
</body>
</html>
