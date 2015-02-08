<HTML>
<HEAD>
<script type="text/javascript" language="JavaScript" src="scripts/srk.js"></script>
<META HTTP-EQUIV="Content-Type" content="text/html; charset=iso-8859-1">
<? 
//******************************

//SRK Nav template 

//******************************

$sPage = $_REQUEST['page'];

$PAGE_NEWS="0";
$PAGE_CATALOG="1";
$PAGE_TOURS="2";
$PAGE_CONTACT="3";
$PAGE_UPLOAD="4";

$randimage = 'roadsandcars-header-' . sprintf('%02d', rand(1, 24)) . 'b.gif';

//---------------------------------------------


?>
<TITLE>SRK HOME</TITLE>
<link href="styles/srk-body.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<table width="100%" height="90%" border="0" cellspacing="0" cellpadding="15">
<tr>
<td width="33%" align="center" valign="middle"></td>
<td width="33%" align="center" valign="middle">
<!--start links-->
<table border="0">
<tr>
<td align="left"><img src="images/<? echo $randimage; ?>" width=100 height=45 border=0 alt=""><br><font>
1. <?= ($sPage == $PAGE_NEWS)    ? "News --------->" : "<A href='news.php' target='_top'>News</A>"; ?><br>
2. <?= ($sPage == $PAGE_CATALOG) ? "Catalog ------>" : "<A href='catalog.php' target='_top'>Catalog</A>"; ?><br>
3. <?= ($sPage == $PAGE_TOURS)   ? "Tours -------->" : "<A href='tours.php' target='_top'>Tours</A>"; ?><br>
4. <?= ($sPage == $PAGE_CONTACT) ? "Contact ------>" : "<A href='contact.php' target='_top'>Contact</A>"; ?><br>
5. <a href="http://->pop-up view" onclick="NewWindow('emailsignup.php','Newsletters','350','350');return false;">Newsletters</A></font></td>
</tr>
</table>
<!--end links-->
</td>
</tr>
</table>
</BODY>
</HTML>

