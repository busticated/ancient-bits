<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Brobots!</title>
<META NAME="description" CONTENT="Official website for the Brobots!">
<META NAME="keywords" CONTENT="brobots, boston, massachusetts, music, records, dj, spin, soul, funk, R&B, disco, hip-hop, rap, rock, pop, electro, beats, break-beats, breaks, turntablism">
<!--<link rel="stylesheet" type="text/css" media="print" href="styles/bots.css"><style type="text/css" media="all">@import "styles/bots.css";> </style>
<link rel="shortcut icon" href="http://www.ourfriendselectric.net/favicon.ico" type="image/vnd.microsoft.icon">-->

<style type="text/css">
<!--
 body {
	margin:0px;
	padding:0px;
	font-family : Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
	background-color : #FFFFFF;
	font-size : 8pt;
	line-height : 11pt;
}

H2 {
	font-size : 10pt;
	font-weight : bold;
	margin-top : 15px;
	margin-bottom : 0px;
	padding-bottom : 0px;
	text-transform: uppercase;
	text-decoration: underline;
}

DIV {

}

A:LINK {
	color: #000000
}

A:VISITED {
	color:#000000
}

#hiddenPic {
	display: none;
}

#center {
	position: absolute;
	left: 50%;
	width: 600px;
	margin-left: -300px;
	margin-top: 5px;
}

#header {
	width: 600px;
	height: 600px;
	margin-top: 10px;
	background-color: #FFFFFF;
	background-image: url(images/Brobots-Logo.gif);
	background-repeat: no-repeat;
	background-position: bottom left;
}

#header:hover {
	/* IE>7 no likey */
	background-image: url(images/Brobots-Logo-Ani.gif);
}

.left {
	text-align: left;
}

.right {
	text-align: right;
}

-->
</style>
</head>

<body>
<?php require("hostbaby");?>
<div id="center">
<div id="header"><img src="images/Brobots-Logo-Ani.gif" width="600" height="600" id="hiddenPic"></div>
<div class="left">
<h2>News:</h2>
<? show_news("brobots", "news.tmpl", 5); ?>
</div>
<div class="right">
<h2>Events:</h2>
<? if (!show_calendar("brobots", "events.tmpl")) { ?> 
<i>No dates scheduled at the moment. Check back soon!</i> 
<? } ?>
</div>
<div class="left">
<h2>Contact:</h2>
<b>Email:</b>
<script language="Javascript" type="text/javascript">
<!--
var name = "brobots"
var domain = "sharkattackmusic.com"
document.write("<a href='mailto:" + name + "@" + domain + "'>")
document.write(name + "@" + domain)
document.write("<\/a>")
//-->
</script>
<br>
<b>Myspace:</b> <a href="http://www.myspace.com/wearebrobots" target="_top">myspace.com/wearebrobots</a>
<br>
<b>AOL IM:</b> <A href="aim:goim?screenname=sharkmusic&amp;message=whatup+dawg?">sharkmusic</a><br>
<b>Address:</b> P.O. Box 600-466 Newtonville, MA 02460-9998<br>
</div>
</div>
<!-- Analytics Start -->
<!-- <script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-2876347-1";
urchinTracker();
</script>
<!-- Analytics End -->

</body>
</html>
