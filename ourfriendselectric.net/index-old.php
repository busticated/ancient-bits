<?php
if ($charleneCookie == "") {$st="ch";}
else {$st=$charleneCookie;}

Header ("Location: http://www.ourfriendselectric.net/ch.php?pg=news&st=$st");

?>
