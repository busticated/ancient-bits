<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" content="text/html; charset=iso-8859-1">
<? 
//******************************

//SRK Nav template 

//******************************

$sPage = $_REQUEST['page'];

$PAGE_TAKINGADIVEFRONT="0";
$PAGE_TAKINGADIVEBACK="1";
$PAGE_NOFLYFRONT="2";
$PAGE_NOFLYBACK="3";
$PAGE_SOMETHINGTOGIVEFRONT="4";
$PAGE_SOMETHINGTOGIVEBACK="5";
$PAGE_ANTONIOFRONT="6";
$PAGE_ANTONIOBACK="7";
$PAGE_TALKMEDOWNFRONT="8";
$PAGE_TALKMEDOWNBACK="9";
$PAGE_COMPILATIONRFRONT="10";
$PAGE_COMPILATIONRBACK="11";
$PAGE_COMPILATIONBFRONT="12";
$PAGE_COMPILATIONBBACK="13";
$PAGE_COMPILATIONGFRONT="14";
$PAGE_COMPILATIONGBACK="15";
$PAGE_CHARLENEDEBUTFRONT="16";
$PAGE_CHARLENEDEBUTBACK="17";
$PAGE_LGCALMRIGHTDOWNFRONT="18";
$PAGE_LGCALMRIGHTDOWNBACK="19";
$PAGE_CPMUNCHFRONT="20";
$PAGE_CPMUNCHBACK="21";

//---------------------------------------------


?>
<TITLE>SRK ALBUM ART</TITLE>
<link href="styles/srk-body.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY marginheight=0 marginwidth=0 topmargin=0 leftmargin=0 text="Silver" link="Red" vlink="Red" alink="White">
<!--start links-->
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left">
<?= ($sPage == $PAGE_TAKINGADIVEFRONT) ? "<img src='images/charlene-albumart-takindadive-front-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><DIV class=albumart><font>front&nbsp;-&nbsp;<A HREF='albumart.php?page=1' TARGET='_top'>back</A></DIV>" : ""; ?>
<?= ($sPage == $PAGE_TAKINGADIVEBACK) ? "<img src='images/charlene-albumart-takindadive-back-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><br><DIV class=albumart><font><A HREF='albumart.php?page=0'>front</A>&nbsp;-&nbsp;back</DIV>" : ""; ?>
<?= ($sPage == $PAGE_NOFLYFRONT) ? "<img src='images/charlene-albumart-nofly-front-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><DIV class=albumart><font>front&nbsp;-&nbsp;<A HREF='albumart.php?page=3' TARGET='_top'>back</A></DIV>" : ""; ?>
<?= ($sPage == $PAGE_NOFLYBACK) ? "<img src='images/charlene-albumart-nofly-back-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><br><DIV class=albumart><font><A HREF='albumart.php?page=2'>front</A>&nbsp;-&nbsp;back</DIV>" : ""; ?>
<?= ($sPage == $PAGE_SOMETHINGTOGIVEFRONT) ? "<img src='images/lockgroove-albumart-somethingtogive-front-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><DIV class=albumart><font>front&nbsp;-&nbsp;<A HREF='albumart.php?page=5' TARGET='_top'>back</A></DIV>" : ""; ?>
<?= ($sPage == $PAGE_SOMETHINGTOGIVEBACK) ? "<img src='images/lockgroove-albumart-somethingtogive-back-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><br><DIV class=albumart><font><A HREF='albumart.php?page=4'>front</A>&nbsp;-&nbsp;back</DIV>" : ""; ?>
<?= ($sPage == $PAGE_ANTONIOFRONT) ? "<img src='images/compass-albumart-antoniorumori-front-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><DIV class=albumart><font>front&nbsp;-&nbsp;<A HREF='albumart.php?page=7' TARGET='_top'>back</A></DIV>" : ""; ?>
<?= ($sPage == $PAGE_ANTONIOBACK) ? "<img src='images/compass-albumart-antoniorumori-back-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><br><DIV class=albumart><font><A HREF='albumart.php?page=6'>front</A>&nbsp;-&nbsp;back</DIV>" : ""; ?>
<?= ($sPage == $PAGE_TALKMEDOWNFRONT) ? "<img src='images/charlene-albumart-summertimer-front-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><DIV class=albumart><font>front&nbsp;-&nbsp;<A HREF='albumart.php?page=9' TARGET='_top'>back</A></DIV>" : ""; ?>
<?= ($sPage == $PAGE_TALKMEDOWNBACK) ? "<img src='images/charlene-albumart-summertimer-back-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><br><DIV class=albumart><font><A HREF='albumart.php?page=8'>front</A>&nbsp;-&nbsp;back</DIV>" : ""; ?>
<?= ($sPage == $PAGE_COMPILATIONRFRONT) ? "<img src='images/compilation-albumart-red-front-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><DIV class=albumart>front&nbsp;-&nbsp;<A HREF='albumart.php?page=11' TARGET='_top'>back</A> | <A HREF='albumart.php?page=12' TARGET='_top'>Blue</A> | <A HREF='albumart.php?page=14' TARGET='_top'>Green</A></DIV>" : ""; ?>
<?= ($sPage == $PAGE_COMPILATIONRBACK) ? "<img src='images/compilation-albumart-red-back-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><br><DIV class=albumart><font><A HREF='albumart.php?page=10'>front</A>&nbsp;-&nbsp;back | <A HREF='albumart.php?page=12' TARGET='_top'>Blue</A> | <A HREF='albumart.php?page=14' TARGET='_top'>Green</A></DIV>" : ""; ?>
<?= ($sPage == $PAGE_COMPILATIONBFRONT) ? "<img src='images/compilation-albumart-blue-front-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><DIV class=albumart>front&nbsp;-&nbsp;<A HREF='albumart.php?page=13' TARGET='_top'>back</A> | <A HREF='albumart.php?page=10' TARGET='_top'>Red</A> | <A HREF='albumart.php?page=14' TARGET='_top'>Green</A></DIV>" : ""; ?>
<?= ($sPage == $PAGE_COMPILATIONBBACK) ? "<img src='images/compilation-albumart-blue-back-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><br><DIV class=albumart><font><A HREF='albumart.php?page=12'>front</A>&nbsp;-&nbsp;back | <A HREF='albumart.php?page=10' TARGET='_top'>Red</A> | <A HREF='albumart.php?page=14' TARGET='_top'>Green</A></DIV>" : ""; ?>
<?= ($sPage == $PAGE_COMPILATIONGFRONT) ? "<img src='images/compilation-albumart-green-front-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><DIV class=albumart>front&nbsp;-&nbsp;<A HREF='albumart.php?page=15' TARGET='_top'>back</A> | <A HREF='albumart.php?page=10' TARGET='_top'>Red</A> | <A HREF='albumart.php?page=12' TARGET='_top'>Blue</A></DIV>" : ""; ?>
<?= ($sPage == $PAGE_COMPILATIONGBACK) ? "<img src='images/compilation-albumart-green-back-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><br><DIV class=albumart><font><A HREF='albumart.php?page=14'>front</A>&nbsp;-&nbsp;back | <A HREF='albumart.php?page=10' TARGET='_top'>Red</A> | <A HREF='albumart.php?page=12' TARGET='_top'>Blue</A></DIV>" : ""; ?>
<?= ($sPage == $PAGE_CHARLENEDEBUTFRONT) ? "<img src='images/charlene-albumart-debut-front-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><DIV class=albumart><font>front&nbsp;-&nbsp;<A HREF='albumart.php?page=17' TARGET='_top'>back</A></DIV>" : ""; ?>
<?= ($sPage == $PAGE_CHARLENEDEBUTBACK) ? "<img src='images/charlene-albumart-debut-back-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><br><DIV class=albumart><font><A HREF='albumart.php?page=16'>front</A>&nbsp;-&nbsp;back</DIV>" : ""; ?>
<?= ($sPage == $PAGE_LGCALMRIGHTDOWNFRONT) ? "<img src='images/lockgroove-albumart-calmrightdown-front-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><DIV class=albumart><font>front&nbsp;-&nbsp;<A HREF='albumart.php?page=19' TARGET='_top'>back</A></DIV>" : ""; ?>
<?= ($sPage == $PAGE_LGCALMRIGHTDOWNBACK) ? "<img src='images/lockgroove-albumart-calmrightdown-back-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><br><DIV class=albumart><font><A HREF='albumart.php?page=18'>front</A>&nbsp;-&nbsp;back</DIV>" : ""; ?>
<?= ($sPage == $PAGE_CPMUNCHFRONT) ? "<img src='images/compass-albumart-munchy-front-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><DIV class=albumart><font>front&nbsp;-&nbsp;<A HREF='albumart.php?page=21' TARGET='_top'>back</A></DIV>" : ""; ?>
<?= ($sPage == $PAGE_CPMUNCHBACK) ? "<img src='images/compass-albumart-munchy-back-large.jpg' width='350' height='350' border='0' hspace='0' vspace='0'><br><DIV class=albumart><font><A HREF='albumart.php?page=20'>front</A>&nbsp;-&nbsp;back</DIV>" : ""; ?>
</td>
</tr>
</table>
<!--end links-->
</BODY>
</HTML>