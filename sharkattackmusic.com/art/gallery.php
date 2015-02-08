<HTML>
<HEAD>
<TITLE>SRK FILES</TITLE>
<link href="../../styles/srk-body.css" rel="stylesheet" type="text/css">
</HEAD>

<BODY>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td colspan="2" align="left"><h1>Poster Gallery</h1></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<?php

if ($handle = opendir('/www/sharkattackmusic.com/web/art/Gallery/')) {

  while (false !== ($file = readdir($handle))) {

      if ($file != "." && $file != "..") {

          echo "<td align='left' valign='bottom'>&nbsp;&nbsp;&nbsp;&nbsp;<img src='/art/Gallery/$file'><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font>$file</td>";

      }

  }

  closedir($handle);

}

?>
</tr>
</table>
</BODY>
</HTML>
