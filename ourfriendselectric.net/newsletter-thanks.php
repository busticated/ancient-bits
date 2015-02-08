<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" content="text/html; charset=iso-8859-1">
<TITLE>Thanks!</TITLE>
<script language="JavaScript">
<!--
function closeWin(thetime) {
setTimeout("window.close()", thetime);
}
//-->
</script>
<?php
if ($styleCookie == "") {$st="default";}
else {$st=$styleCookie;}

echo "<link rel=\"stylesheet\" type=\"text/css\" media=\"print\" href=\"styles/$st.css\">";

echo "<style type=\"text/css\" media=\"all\">@import \"styles/$st.css\";> </style>"; ?>
</head>

<body onLoad="closeWin('5000')">
<div class="emailsignup">
<p class="headline">You have been added - Thanks!</p>
</div>

</body>
</html>
