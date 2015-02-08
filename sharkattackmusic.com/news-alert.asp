<%
'******************************
'SRK ASP template 
'******************************

Dim sPage, sTitle, sImgURL, sLinks, sContent

const ALERT = "0"
const CHARLENEPARTY = "1"
const LOCKGROOVEPARTY = "2"

sPage = Request("Page")

Select Case sPage

	Case ALERT
		sTitle = "ALERT!"
		sContent = "<table width='100%' height='90%' border='0' cellspacing='0' cellpadding='15'><tr><td align='left' valign='middle'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td colspan='2' align='left' valign='top'><font class='new'>FRIDGE GEAR STOLEN, PLEASE KEEP A LOOK OUT:<P>PLEASE FORWARD THIS LIST TO PEOPLE WHO MIGHT BE HELPFUL IN RECOVERING THE GEAR...</font><P><font><B>STOLEN EQUIPMENT</B><br>Equipment Stolen from Grey Dodge Van in Arlington, MA on morning of 11th October between 5AM and 9AM. Any details contact Jon Whitney (<script language='Javascript'><!--var name = 'jon'var domain = 'brainwashed.com'document.write('<a href='mailto:' + name + '@' + domain + ''>')document.write(name + '@' + domain)document.write('</a>')//--></script>).<P><b>List of stolen items</b> (serial numbers where known):</td></tr><tr><td align='left' valign='top'><font>*&nbsp;</td><td align='left' valign='top'><font>Cream Fender Telecaster guitar (case covered in distinctive orange brainwashed stickers) (SN:  N7293594)</td></tr><tr><td align='left' valign='top'><font>*&nbsp;</td><td align='left' valign='top'><font>Dark red sunburst Fender Jazz Deluxe V bass (SN: N7236945)</td></tr><tr><td align='left' valign='top'><font>*&nbsp;</td><td align='left' valign='top'><font>Brown Sunburst Fender Stratocaster Guitar</td></tr><tr><td align='left' valign='top'><font>*&nbsp;</td><td align='left' valign='top'><font>Hartke 300W Bass Amp/Head</td></tr><tr><td align='left' valign='top'><font>*&nbsp;</td><td align='left' valign='top'><font>Akai MPC2000 sampler (SN: A9855-01035)</td></tr><tr><td align='left' valign='top'><font>*&nbsp;</td><td align='left' valign='top'><font>2 x Iomega SCSI Zip drives and cables</td></tr><tr><td align='left' valign='top'><font>*&nbsp;</td><td align='left' valign='top'><font>EMU Proteus 2000 sound module (SN: 109901940)</td></tr><tr><td align='left' valign='top'><font>*&nbsp;</td><td align='left' valign='top'><font>Roland PK5 Midi trigger footpedals (SN: AL62788)<br><br></td></tr><tr><td colspan='2' align='left' valign='top'><font>All flight cases have distinctive circular blue stickers with 'FRIDGE' on them.<P>This list has been faxed to music shops in MA, RI, and NH as well as the proper authorities.</td></tr></table></td></tr></table>" 
	
	Case CHARLENEPARTY
		sTitle = "Release Party - 11/2 @ The Lizard Lounge"
		sContent = "<a href='tix/' target='_new'><img src='images/srk-promo-charlene-releasepartyinvite.gif' width='342' height='447' border='0'></a>" 
	
	Case LOCKGROOVEPARTY
		sTitle = "Lockgroove Release Party - 10/8 @ TT the Bear's"
		sContent = "<img src='images/srk-promo-lg-releasepartyinvite.jpg' width='621' height='406' border='0'>"
	
	Case Else
		'default main page
		sTitle = "SRK HOME"
		sContent = "<DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>go home</A></DIV>"
		
End Select

'---------------------------------------------

'*****************************************************************************
'HTML template below
'*****************************************************************************

%>

<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" content="text/html; charset=iso-8859-1">
<TITLE><%= sTitle %></TITLE>

</HEAD>
<body marginheight=0 marginwidth=0 topmargin=0 leftmargin=0 text="Silver" link="Red" vlink="Red" alink="White">
<%= sContent %>
</BODY>
</HTML>














<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" content="text/html; charset=iso-8859-1">
<link href="styles/srk-body.css" rel="stylesheet" type="text/css">
<TITLE>ALERT!</TITLE>
</HEAD>
<BODY>

</BODY>
</HTML>