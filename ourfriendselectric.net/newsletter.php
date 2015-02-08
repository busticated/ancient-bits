<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
<title>Charlene Newsletter</title>
<?php
if ($styleCookie == "") {$st="default";}
else {$st=$styleCookie;}

echo "<link rel=\"stylesheet\" type=\"text/css\" media=\"print\" href=\"styles/$st.css\">";

echo "<style type=\"text/css\" media=\"all\">@import \"styles/$st.css\";> </style>"; ?>


<?php 

/** 
 * this code is register_globals=off and warnings=on safe, 
 * which is (partly) why it's so verbose. 
 */ 

$noemail = $noname = $nocity = $nostate = $nokeyword = $bademail = false;  /* variables we'll use down below */ 

if (isset($_POST) && count($_POST)) { 
  /* they hit submit */ 

  if (!isset($_POST['list_name']) || empty($_POST['list_name'])) { 
    /* no name */ 
    $noname = true; 

  } elseif (!isset($_POST['list_email']) || empty($_POST['list_email'])) { 
    /* no email address given */ 
    $noemail = true; 

  } elseif (!isset($_POST['list_city']) || empty($_POST['list_city'])) { 
    /* no city */ 
    $nocity = true; 

  } elseif (!isset($_POST['list_state']) || empty($_POST['list_state'])) { 
    /* no state */ 
    $nostate = true; 

  } elseif (!isset($_POST['list_keywords']) || empty($_POST['list_keywords'])) { 
    /* no keyword */ 
    $nokeyword = true; 

  } else { 

    /* adding to the database happens right here */ 
    include 'hostbaby'; 

    if ($listbaby_status == 'bademail') { 
      $bademail = true; 

    } else { 
      /* they were added successfully, redirect them to the thank you page */ 
      header('Location: /DEV/charlene/newsletter-thanks.php'); 
      exit; 
    } 

  } 
} 

?>
</head>
<body>
<!--start links-->

<div class="emailsignup">

<? if ($noname) { ?> 

<div class='error'>We need more info: Name</div>

<? } elseif ($noemail) { ?> 

<div class='error'>We need more info: Email Address</div>  

<? } elseif ($nocity) { ?> 

<div class='error'>You forgot: City (we'll let you about shows in your area)</div>

<? } elseif ($nostate) { ?> 

<div class='error'>You forgot: State (we'll let you about shows in your area)</div> 

<? } elseif ($nokeyword) { ?> 

<div class='error'>What would you like to receive emails about?</div> 

<? } elseif ($bademail) { ?> 

<div class='error'>Your email address looks wrong, it needs to be in the format: you@yourisp.com</div> 

<? } ?>
<p class="headline">Email Newsletter Sign-up</p>
<p>An asterisk (*) represents a required field.</p>
<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>"> 
<span <?= $noname ? 'class="error"' : '' ?>>* Name:</span> <input type="text" name="list_name" value="<? echo($list_name); ?>" size="24" maxlength="64"><br>
<span <?= $noemail ? 'class="error"' : '' ?>>* Email:</span> <input type="text" name="list_email" value="<? echo($list_email); ?>" size="24" maxlength="64"><br> 
<span <?= $nocity ? 'class="error"' : '' ?>>* City:</span> <input type="text" name="list_city" value="<? echo($list_city); ?>" size="24" maxlength="64"><br>
<span <?= $nostate ? 'class="error"' : '' ?>>* State:</span> <select name="list_state">
<OPTION value="">Select State - - - - - - - - - ></OPTION>
<option value="N/A">Outside USA</option>
<OPTION value="AL" <? if ($list_state == 'AL') { echo ('selected="true"'); } ?>>Alabama</OPTION>
<OPTION value="AK" <? if ($list_state == 'AK') { echo ('selected="true"'); } ?>>Alaska</OPTION>
<OPTION value="AZ" <? if ($list_state == 'AZ') { echo ('selected="true"'); } ?>>Arizona</OPTION>
<OPTION value="AR" <? if ($list_state == 'AR') { echo ('selected="true"'); } ?>>Arkansas</OPTION>
<OPTION value="CA" <? if ($list_state == 'CA') { echo ('selected="true"'); } ?>>California</OPTION>
<OPTION value="CO" <? if ($list_state == 'CO') { echo ('selected="true"'); } ?>>Colorado</OPTION>
<OPTION value="CT" <? if ($list_state == 'CT') { echo ('selected="true"'); } ?>>Connecticut</OPTION>
<OPTION value="DC" <? if ($list_state == 'DC') { echo ('selected="true"'); } ?>>D.C.</OPTION>
<OPTION value="DE" <? if ($list_state == 'DE') { echo ('selected="true"'); } ?>>Delaware</OPTION>
<OPTION value="FL" <? if ($list_state == 'FL') { echo ('selected="true"'); } ?>>Florida</OPTION>
<OPTION value="GA" <? if ($list_state == 'GA') { echo ('selected="true"'); } ?>>Georgia</OPTION>
<OPTION value="HI" <? if ($list_state == 'HI') { echo ('selected="true"'); } ?>>Hawaii</OPTION>
<OPTION value="ID" <? if ($list_state == 'ID') { echo ('selected="true"'); } ?>>Idaho</OPTION>
<OPTION value="IL" <? if ($list_state == 'IL') { echo ('selected="true"'); } ?>>Illinois</OPTION>
<OPTION value="IN" <? if ($list_state == 'IN') { echo ('selected="true"'); } ?>>Indiana</OPTION>
<OPTION value="IA" <? if ($list_state == 'IA') { echo ('selected="true"'); } ?>>Iowa</OPTION>
<OPTION value="KS" <? if ($list_state == 'KS') { echo ('selected="true"'); } ?>>Kansas</OPTION>
<OPTION value="KY" <? if ($list_state == 'KY') { echo ('selected="true"'); } ?>>Kentucky</OPTION>
<OPTION value="LA" <? if ($list_state == 'LA') { echo ('selected="true"'); } ?>>Louisiana</OPTION>
<OPTION value="ME" <? if ($list_state == 'ME') { echo ('selected="true"'); } ?>>Maine</OPTION>
<OPTION value="MD" <? if ($list_state == 'MD') { echo ('selected="true"'); } ?>>Maryland</OPTION>
<OPTION value="MA" <? if ($list_state == 'MA') { echo ('selected="true"'); } ?>>Massachusetts</OPTION>
<OPTION value="MI" <? if ($list_state == 'MI') { echo ('selected="true"'); } ?>>Michigan</OPTION>
<OPTION value="MN" <? if ($list_state == 'MN') { echo ('selected="true"'); } ?>>Minnesota</OPTION>
<OPTION value="MS" <? if ($list_state == 'MS') { echo ('selected="true"'); } ?>>Mississippi</OPTION>
<OPTION value="MO" <? if ($list_state == 'MO') { echo ('selected="true"'); } ?>>Missouri</OPTION>
<OPTION value="MT" <? if ($list_state == 'MT') { echo ('selected="true"'); } ?>>Montana</OPTION>
<OPTION value="NE" <? if ($list_state == 'NE') { echo ('selected="true"'); } ?>>Nebraska</OPTION>
<OPTION value="NV" <? if ($list_state == 'NV') { echo ('selected="true"'); } ?>>Nevada</OPTION>
<OPTION value="NH" <? if ($list_state == 'NH') { echo ('selected="true"'); } ?>>New Hampshire</OPTION>
<OPTION value="NJ" <? if ($list_state == 'NJ') { echo ('selected="true"'); } ?>>New Jersey</OPTION>
<OPTION value="NM" <? if ($list_state == 'NM') { echo ('selected="true"'); } ?>>New Mexico</OPTION>
<OPTION value="NY" <? if ($list_state == 'NY') { echo ('selected="true"'); } ?>>New York</OPTION>
<OPTION value="NC" <? if ($list_state == 'NC') { echo ('selected="true"'); } ?>>North Carolina</OPTION>
<OPTION value="ND" <? if ($list_state == 'ND') { echo ('selected="true"'); } ?>>North Dakota</OPTION>
<OPTION value="OH" <? if ($list_state == 'OH') { echo ('selected="true"'); } ?>>Ohio</OPTION>
<OPTION value="OK" <? if ($list_state == 'OK') { echo ('selected="true"'); } ?>>Oklahoma</OPTION>
<OPTION value="OR" <? if ($list_state == 'OR') { echo ('selected="true"'); } ?>>Oregon</OPTION>
<OPTION value="PA" <? if ($list_state == 'PA') { echo ('selected="true"'); } ?>>Pennsylvania</OPTION>
<OPTION value="PR" <? if ($list_state == 'PR') { echo ('selected="true"'); } ?>>Puerto Rico</OPTION>
<OPTION value="RI" <? if ($list_state == 'RI') { echo ('selected="true"'); } ?>>Rhode Island</OPTION>
<OPTION value="SC" <? if ($list_state == 'SC') { echo ('selected="true"'); } ?>>South Carolina</OPTION>
<OPTION value="SD" <? if ($list_state == 'SD') { echo ('selected="true"'); } ?>>South Dakota</OPTION>
<OPTION value="TN" <? if ($list_state == 'TN') { echo ('selected="true"'); } ?>>Tennessee</OPTION>
<OPTION value="TX" <? if ($list_state == 'TX') { echo ('selected="true"'); } ?>>Texas</OPTION>
<OPTION value="UT" <? if ($list_state == 'UT') { echo ('selected="true"'); } ?>>Utah</OPTION>
<OPTION value="VT" <? if ($list_state == 'VT') { echo ('selected="true"'); } ?>>Vermont</OPTION>
<OPTION value="VA" <? if ($list_state == 'VA') { echo ('selected="true"'); } ?>>Virginia</OPTION>
<OPTION value="WA" <? if ($list_state == 'WA') { echo ('selected="true"'); } ?>>Washington</OPTION>
<OPTION value="WV" <? if ($list_state == 'WV') { echo ('selected="true"'); } ?>>West Virginia</OPTION>
<OPTION value="WI" <? if ($list_state == 'WI') { echo ('selected="true"'); } ?>>Wisconsin</OPTION>
<OPTION value="WY" <? if ($list_state == 'WY') { echo ('selected="true"'); } ?>>Wyoming</OPTION>
</select><br>
Zip / Postal Code: <input type="text" name="list_zip" value="<? echo($list_zip); ?>" size="24" maxlength="15"><br>
Country:  <select name="list_country" size="1">
<OPTION value="">Select Country - - - - - - - ></OPTION>
<OPTION value="AU" <? if ($list_country == 'AU') { echo ('selected="true"'); } ?>>Australia</OPTION>
<OPTION value="AT" <? if ($list_country == 'AT') { echo ('selected="true"'); } ?>>Austria</OPTION>
<OPTION value="BE" <? if ($list_country == 'BE') { echo ('selected="true"'); } ?>>Belgium</OPTION>
<OPTION value="BR" <? if ($list_country == 'BR') { echo ('selected="true"'); } ?>>Brazil</OPTION>
<OPTION value="BG" <? if ($list_country == 'BG') { echo ('selected="true"'); } ?>>Bulgaria</OPTION>
<OPTION value="CA" <? if ($list_country == 'CA') { echo ('selected="true"'); } ?>>Canada</OPTION>
<OPTION value="CN" <? if ($list_country == 'CN') { echo ('selected="true"'); } ?>>China</OPTION>
<OPTION value="CZ" <? if ($list_country == 'CZ') { echo ('selected="true"'); } ?>>Czech Republic</OPTION>
<OPTION value="DE" <? if ($list_country == 'DE') { echo ('selected="true"'); } ?>>Deutschland</OPTION>
<OPTION value="DK" <? if ($list_country == 'DK') { echo ('selected="true"'); } ?>>Denmark</OPTION>
<OPTION value="FI" <? if ($list_country == 'FI') { echo ('selected="true"'); } ?>>Finland</OPTION>
<OPTION value="FR" <? if ($list_country == 'FR') { echo ('selected="true"'); } ?>>France</OPTION>
<OPTION value="GR" <? if ($list_country == 'GR') { echo ('selected="true"'); } ?>>Greece</OPTION>
<OPTION value="HK" <? if ($list_country == 'HK') { echo ('selected="true"'); } ?>>Hong Kong</OPTION>
<OPTION value="HU" <? if ($list_country == 'HU') { echo ('selected="true"'); } ?>>Hungary</OPTION>
<OPTION value="IS" <? if ($list_country == 'IS') { echo ('selected="true"'); } ?>>Iceland</OPTION>
<OPTION value="IN" <? if ($list_country == 'IN') { echo ('selected="true"'); } ?>>India</OPTION>
<OPTION value="IE" <? if ($list_country == 'IE') { echo ('selected="true"'); } ?>>Ireland</OPTION>
<OPTION value="IL" <? if ($list_country == 'IL') { echo ('selected="true"'); } ?>>Israel</OPTION>
<OPTION value="IT" <? if ($list_country == 'IT') { echo ('selected="true"'); } ?>>Italy</OPTION>
<OPTION value="JM" <? if ($list_country == 'JM') { echo ('selected="true"'); } ?>>Jamaica</OPTION>
<OPTION value="JP" <? if ($list_country == 'JP') { echo ('selected="true"'); } ?>>Japan</OPTION>
<OPTION value="LV" <? if ($list_country == 'LV') { echo ('selected="true"'); } ?>>Latvia</OPTION>
<OPTION value="LT" <? if ($list_country == 'LT') { echo ('selected="true"'); } ?>>Lithuania</OPTION>
<OPTION value="LU" <? if ($list_country == 'LU') { echo ('selected="true"'); } ?>>Luxembourg</OPTION>
<OPTION value="MX" <? if ($list_country == 'MX') { echo ('selected="true"'); } ?>>Mexico</OPTION>
<OPTION value="NL" <? if ($list_country == 'NL') { echo ('selected="true"'); } ?>>Netherlands</OPTION>
<OPTION value="NZ" <? if ($list_country == 'NZ') { echo ('selected="true"'); } ?>>New Zealand</OPTION>
<OPTION value="NO" <? if ($list_country == 'NO') { echo ('selected="true"'); } ?>>Norway</OPTION>
<OPTION value="PL" <? if ($list_country == 'PL') { echo ('selected="true"'); } ?>>Poland</OPTION>
<OPTION value="PT" <? if ($list_country == 'PT') { echo ('selected="true"'); } ?>>Portugal</OPTION>
<OPTION value="RO" <? if ($list_country == 'RO') { echo ('selected="true"'); } ?>>Romania</OPTION>
<OPTION value="RU" <? if ($list_country == 'RU') { echo ('selected="true"'); } ?>>Russian Federation</OPTION>
<OPTION value="ES" <? if ($list_country == 'ES') { echo ('selected="true"'); } ?>>Spain</OPTION>
<OPTION value="SE" <? if ($list_country == 'SE') { echo ('selected="true"'); } ?>>Sweden</OPTION>
<OPTION value="CH" <? if ($list_country == 'CH') { echo ('selected="true"'); } ?>>Switzerland</OPTION>
<OPTION value="UK" <? if ($list_country == 'UK') { echo ('selected="true"'); } ?>>United Kingdom</OPTION>
<OPTION value="USA" <? if ($list_country == 'USA') { echo ('selected="true"'); } ?>>United States</OPTION>
</select><br>
<input type="hidden" name="list_keywords[]" value="charlene">
<? if ($list_url == 'myspace') { echo ('<input type="hidden" name="list_url" value="myspace">'); } ?>
<br>
<input type="submit" name="submit" value="Subscribe!"> 
</form> 
</div>
<!--end links-->
</BODY>
</HTML>