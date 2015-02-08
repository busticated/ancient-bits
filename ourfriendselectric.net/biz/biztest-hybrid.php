<?php

$db_host = "localhost";
$db_user = "sharkattack";
$db_pwd = "sunactual8";
$db_name = "sharkattack";
$db_table = "BizUser";

if ($chbizcookie[2] != "b") {

	// error variables
	$noemail = $bademail = false;
	$showsignin = true;

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
				/* insert if no match is found */
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


		} else {

// parse cookie
$biz_rowid = substr($chbizcookie, 9);
$rowidchop = strlen($biz_rowid);
$biz_type = substr($chbizcookie, 0, -$rowidchop);

// connect to db
$connection_handle = mysql_connect ($db_host, $db_user, $db_pwd)
	or die("*** Can't connect to database server. Try kicking it. ***");

// select db
mysql_select_db($db_name, $connection_handle)
	or die ("*** Unable to select database. God said no. ***");

// look for matching record already in db
$biz_visitsquery = mysql_query("SELECT Visits FROM $db_table WHERE RowID = '$biz_rowid' AND Type = '$biz_type'");
$biz_visitsarray = mysql_fetch_array($biz_visitsquery);
$biz_visits = ++$biz_visitsarray[Visits];

/* update visits count */
mysql_query("UPDATE $db_table SET Visits = '$biz_visits', LastUpdate = NOW() WHERE RowID = '$biz_rowid'")
	or die ("*** Dangit. Unable to update db. ***");

// Close db connection
mysql_close($connection_handle);
}
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

<? if ($showsignin) { ?> 
<div id="signin">
<h1>Charlene Media Kit: Sign-in</h1>
<? if ($noemail) { ?> 

<div class='error'><br>> > We need more info: Email Address. < <</div>  

<? } elseif ($bademail) { ?> 

<div class='error'><br>> > Your email address looks wrong, it needs to be in the format: you@yourisp.com < <</div> 

<? } ?>
<br>
<form method="POST" action="biztest-hybrid.php">
<label for="name">Name:</label>
<input type="text" name="biz_name" value="<? echo($biz_name); ?>" id="name" size="24" maxlength="64">
<label for="email">Email:</label>
<input type="text" name="biz_email" value="<? echo($biz_email); ?>" id="email" size="24" maxlength="64"><br>
<label for="company">Company:</label>
<input type="text" name="biz_company" value="<? echo($biz_company); ?>" id="company" size="24" maxlength="64">
<label for="company">Website:</label>
<input type="text" name="biz_website" value="<? echo($biz_website); ?>" id="website" size="24" maxlength="64"><br>
<input type="image" src="images/submit.gif" name="submit" alt="Click here to sign up"> <a href="signup.php?biz_anon=true"><img src="images/submitanon.gif" alt="" class="anonbutton" width="118" height="14"></a>
</form>
</div>
<? } ?>
<div id="content">
<h1>CHARLENE MEDIA KIT</h1>
<h2>Contact:</h2>
<script language="Javascript" type="text/javascript">
<!--
var name = "charlene"
var domain = "sharkattackmusic.com"
document.write("<a href='mailto:" + name + "@" + domain + "'>")
document.write(name + "@" + domain)
document.write("<\/a>")
//-->
</script>
<br>
Myspace: <a href="http://www.myspace.com/charleneband" target="_top">Charlene</a>
<br>
AOL IM: <A href="aim:goim?screenname=sharkmusic&amp;message=whatup+dawg?">sharkmusic</a><br>
P.O. Box 600-466<br>
Newtonville, MA 02460-9998
<h2>Photos:</h2>
<a href="files/ch-bandpic-greentile-300dpi.jpg"><img src="files/ch-bandpic-greentile.jpg" border="0" alt="" width="93" height="75"></a>
<a href="files/ch-bandpic-greentile04-300dpi.jpg"><img src="files/ch-bandpic-greentile04.jpg" border="0" alt="" width="115" height="75"></a>
<a href="files/ch-bandpic-greentile05-300dpi.jpg"><img src="files/ch-bandpic-greentile05.jpg" border="0" alt="" width="111" height="75"></a>
<a href="files/ch-bandpic-table07-300dpi.jpg"><img src="files/ch-bandpic-table07.jpg" border="0" alt="" width="113" height="75"></a>
<a href="files/ch-bandpic-orb01-300dpi.jpg"><img src="files/ch-bandpic-orb01.jpg" border="0" alt="" width="113" height="75"></a>
<a href="files/ch-bandpic-live-04-300dpi.jpg"><img src="files/ch-bandpic-live-04.jpg" border="0" alt="" width="114" height="75"></a>
<a href="files/ch-bandpic-live-05-300dpi.jpg"><img src="files/ch-bandpic-live-05.jpg" border="0" alt="" width="113" height="75"></a>
<br>
<i>right click > save as for 300dpi file</i>

<!-- START AUDIO -->
<h2>Audio:</h2>
<b>7ins:</b> 
<a href="http://www.sharkattackmusic.com/audio/srk000-a-charlene-taking_a_dive.mp3">Taking a Dive</a> | 
<a href="http://www.sharkattackmusic.com/audio/srk001-a-charlene-no_fly.mp3">No Fly</a> | 
<a href="http://www.sharkattackmusic.com/audio/srk004-a-charlene-summertimer.mp3">Summertimer</a> [1999 - 2001]<br>

<b>3.5eps:</b>
<a href="http://www.sharkattackmusic.com/audio/srkcomp-track06-charlene-radio_son.mp3">Radio Son</a> [2002]<br>

<b>CHARLENE S/T:</b> <a href="http://www.sharkattackmusic.com/audio/srk006-charlene-01-ripoff-edit.mp3">Ripoff</a> | 
<a href="http://www.sharkattackmusic.com/audio/srk006-charlene-03-shoot_yr_life.mp3">Shoot Yr. Life</a> | 
<a href="http://www.sharkattackmusic.com/audio/srk006-charlene-04-cathode.mp3">Cathode</a> | 
<a href="http://www.sharkattackmusic.com/audio/srk006-charlene-09-sugarblocker.mp3">Sugarblocker</a> [2002]
<br>

<b>DEMO 1:</b> 
<a href="../audio/Charlene-Demo01-01-The_Beatings.mp3">The Beatings</a> | 
<a href="../audio/Charlene-Demo01-02-Broke_Down.mp3">Broke Down</a> | 
<a href="../audio/Charlene-Demo01-03-The_Way_of_Things.mp3">The Way of Things</a> | 
<a href="../audio/Charlene-Demo01-04_Fooling.mp3">Fooling</a> [2005]<br>

<b>DEMO 2:</b> <a href="../audio/Charlene-Demo02-01-HeyK.mp3">Hey K</a> | 
<a href="../audio/Charlene-Demo02-02-TheComas.mp3">The Comas</a> | 
<a href="../audio/Charlene-Demo02-03-BJM.mp3">BJM</a> | 
<a href="../audio/Charlene-Demo02-04-BigWinds.mp3">Big Winds</a> [2006]<br>
<i>please do not widely circulate demos... they ain't done yet!</i>
<!-- END AUDIO -->
<h2>Bio:</h2>
<i>Ugh... coming soon... maybe.</i>
<!-- START PRESS -->
<h2>Press Clips:</h2>
<a href="http://www.sharkattackmusic.com/media/files/srkbiz-charlene-debut-pressclips-web.pdf">Web [72dpi]</a> | <a href="http://www.sharkattackmusic.com/media/files/srkbiz-charlene-debut-pressclips-print.pdf">Print [300dpi]</a>
<br>
<!-- <b>Interviews:</b> 
<a href="http://www.sharkattackmusic.com/media/files/press-charlene-interview-magnet.jpg" target="_top">Magnet</a> | 
<a href="http://www.sharkattackmusic.com/media/files/press-charlene-interview-undertheradar.jpg" target="_top">Under the Radar (1 of 2)</a> | 
<a href="http://www.undertheradarmag.com/issue4/charlene.html" target="_top">Under the Radar (2 of 2)</a> | 
<a href="http://www.sharkattackmusic.com/media/files/press-charlene-interview-globe-pg1.jpg" target="_top">Boston Globe (1 of 2)</a> | 
<a href="http://www.sharkattackmusic.com/media/files/press-charlene-interview-globe-pg2.jpg" target="_top">Boston Globe (2 of 2)</a> | 
<a href="http://www.sharkattackmusic.com/media/files/press-charlene-interview-weeklydig.gif" target="_top">WeeklyDig</a> | 
<a href="http://www.sponiczine.com/article_detail.asp?id=743">Sponic Webzine</a> 
<br>
<b>Reviews:</b> 
<a href="http://www.sharkattackmusic.com/media/files/press-charlene-review-blender.gif" target="_top">Blender Magazine</a> | 
<a href="http://www.sharkattackmusic.com/media/files/press-charlene-review-ap.jpg" target="_top">Alternative Press</a> | 
<a href="http://www.sharkattackmusic.com/media/files/press-charlene-review-magnet.jpg" target="_top">Magnet</a> | 
<a href="http://www.tinymixtapes.com/musicreviews/c/charlene.htm">Tiny Mix Tapes</a> | 
<a href="http://www.pitchforkmedia.com/article/record_review/16423/Charlene_Charlene">Pitchfork</a> | 
<a href="http://www.sharkattackmusic.com/media/files/press-charlene-review-skyscraper.jpg" target="_top">Skyscraper Magazine</a> | 
<a href="http://www.sharkattackmusic.com/media/files/srk-review-charlene-brainwashed.gif" target="_top">Brainwashed Webzine</a> | 
<a href="http://www.sharkattackmusic.com/media/files/press-charlene-review-cmjmonthly.jpg" target="_top">CMJ Monthly</a> | 
<a href="http://www.fakejazz.com/reviews/2002/charlene.shtml" target="_top">FakeJazz.com</a> | 
<a href="http://www.sharkattackmusic.com/media/files/press-charlene-review-outburn.jpg" target="_top">Outburn Magazine</a> | 
<a href="http://www.dustedmagazine.com/reviews/760">Dusted Magazine</a> | 
<a href="http://www.popmatters.com/music/concerts/g/gardener-mark-030913.shtml">Popmatters.com</a> | 
<a href="http://www.sharkattackmusic.com/media/files/charlene-press-review-alarmpress.jpg" target="_top">Alarm Press</a> | 
<a href="files/press-charlene-review-lostatsea.gif" target="_top">Lost At Sea</a> | 
<a href="files/press-charlene-review-bigta.jpg" target="_top">Big Takeover</a> | 
<a href="http://www.bostonphoenix.com/boston/music/otr/documents/02811211.htm" target="_top">Boston Phoenix</a> | 
<a href="files/press-charlene-review-columbusalive.gif" target="_top">Columbus Alive</a> -->
<!-- END PRESS -->
<h2>Album Art:</h2>
<a href="http://www.sharkattackmusic.com/media/files/charlene-album-final-cover.jpg"><img src="http://www.sharkattackmusic.com/images/charlene-albumart-debut-front-small.gif" border="0" alt=""></a>
<img src="http://www.sharkattackmusic.com/images/compilation-albumart-red-front-small.jpg" border="0" alt="">
<img src="http://www.sharkattackmusic.com/images/charlene-albumart-summertimer-front-small.jpg" border="0" alt="">
<img src="http://www.sharkattackmusic.com/images/charlene-albumart-nofly-front-small.jpg" border="0" alt="">
<img src="http://www.sharkattackmusic.com/images/charlene-albumart-takindadive-front-small.jpg" border="0" alt="">
<br>
<i>right click > save as for 300dpi file</i>
<h2>Tour Dates:</h2>
<?php require("hostbaby");?>
<? if (!show_calendar("charlene", "biztours.tmpl")) { ?> 
<i>No dates scheduled at the moment. Check back soon!</i> 
<? } ?>
<h2>Latest News:</h2>
<? show_news("charlene", "biznews.tmpl"); ?>
<h2>Misc:</h2>
<a href="http://www.sharkattackmusic.com/media/files/charlene-stageplot.pdf">Stage Plot</a>
</div>
</div>
</div>

TEST BIZ PAGE
<br>
<? echo $chbizcookie[2]; ?>
<br>
<? echo $chbizcookie; ?>
<br>
<a href="signup.php">signup</a>
</body>
</html>