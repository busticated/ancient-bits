<?php
// handy dandy file downloader - needs to run before any HTML hits screen
// look for dl parameter
$dl = $_GET['dl'];
// if match is found, prompt to download file
if ($dl == "oh") {
	header('Content-type: audio/mpeg');
	header('Content-Disposition: attachment; filename="charlene-ohhey.mp3"');
	readfile('http://www.ourfriendselectric.net/audio/Charlene-Oh_Hey_[single]-01-Oh_Hey.mp3');
	exit;
}
if ($dl == "btch") {
	header('Content-type: audio/mpeg');
	header('Content-Disposition: attachment; filename="charlene-beforethecomethits.mp3"');
	readfile('http://www.ourfriendselectric.net/audio/Charlene-Oh_Hey_[single]-02-Before_The_Comet_Hits.mp3');
	exit;
}
if ($dl == "bw") {
	header('Content-type: audio/mpeg');
	header('Content-Disposition: attachment; filename="charlene-bigwinds.mp3"');
	readfile('http://www.ourfriendselectric.net/audio/Charlene-Oh_Hey_[single]-03-Big_Winds.mp3');
	exit;
}
if ($dl == "4h") {
	header('Content-type: application/zip');
	header('Content-Disposition: attachment; filename="4Herb.zip"');
	readfile('http://www.ourfriendselectric.net/audio/4Herb.zip');
	exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
<title>Charlene</title>
<META NAME="description" CONTENT="Official website for the band Charlene">
<META NAME="keywords" CONTENT="charlene, boston, massachusetts, music, records, shark attack music, sharkattack music, dented, head, dented head, studio">
<?php

$randimage = rand(1, 5);
if ($randimage == "1") {$randimage="ch";}
// if ($randimage == "2") {$randimage="oh";}
if ($randimage == "2") {$randimage="ch";} // delete this if / when you add Oh Hey art
if ($randimage == "3") {$randimage="st";}
if ($randimage == "4") {$randimage="nf";}
if ($randimage == "5") {$randimage="td";}

if ($charleneCookie == "") {$st=$randimage;}
else {$st=$charleneCookie;}

echo "<link rel=\"stylesheet\" type=\"text/css\" media=\"print\" href=\"styles/$st.css\">";

echo "<style type=\"text/css\" media=\"all\">@import \"styles/$st.css\";> </style>";
?>
<link rel="shortcut icon" href="http://www.ourfriendselectric.net/favicon.ico" type="image/vnd.microsoft.icon">
</head>

<body>
<div id="horizon">
<div id="splash">
<a href="ch.php?pg=news&amp;st=<?= $st ?>"><img src="images/<?= $st ?>-header.jpg" width="500" height="200" alt="welcome to charlene's official website"></a>
</div>
</div>
<!-- Analytics Start -->
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-2876347-1";
urchinTracker();
</script>
<!-- Analytics End -->
</body>
</html>