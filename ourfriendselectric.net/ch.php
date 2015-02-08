<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
<title>Charlene</title>
<META NAME="description" CONTENT="Official website for the band Charlene">
<META NAME="keywords" CONTENT="charlene, boston, massachusetts, music, records, shark attack music, sharkattack music, dented, head, dented head, studio">
<script type="text/javascript">

/*
Form2Pop Script- By Peter Bailey (http://www.peterbailey.net)
Featured on JavaScriptKit.com
Visit http://www.javascriptkit.com for this script and more
*/

function createTarget(t){
window.open("", t, "width=350,height=350");
return true;
}

</script>

<?php

// check to see if "st" is available, if not check the cookie for "st"
if (!isset($_GET['st'])  || empty($_GET['st'])) {$st=$charleneCookie;}

// set "st" value in charlene cookie 
setcookie ("charleneCookie", $st, time()+40000000);

// all the possible values of $pg need to be in this array
$possible_pg = array('news', 'music', 'music2', 'gallery', 'tours', 'contact');

// check and see if $pg is NOT in the array
if (!in_array($pg, $possible_pg)) {
   // and if it's not, send them to the news page
   $pg = 'news';
}

// repeat for $st
$possible_st = array('oh', 'ch', 'td', 'nf', 'st');

if (!in_array($st, $possible_st)) {
   $st = 'ch';
}

echo "<link rel=\"stylesheet\" type=\"text/css\" media=\"print\" href=\"styles/$st.css\">";

echo "<style type=\"text/css\" media=\"all\">@import \"styles/$st.css\";> </style>"; ?>
<link rel="shortcut icon" href="http://www.ourfriendselectric.net/favicon.ico" type="image/vnd.microsoft.icon">
</head>

<body>
<div id="header">
<?php @ require_once ("menu.php"); ?>
</div>


<div id="content">
<div id="data">
<?php @ require_once ("$pg.html"); ?>
</div>
<div id="bottom"> </div>
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
