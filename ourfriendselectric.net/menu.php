<!-- STYLE MENU START -->
<ul id="stylepicker">
<li><? echo "<a href=\"ch.php?pg=$pg&amp;st=ch\">"; ?><img src="images/button-skin-ch.gif" width="15" height="15" border="0" alt="charlene"></a></li>
<!--<li><? echo "<a href=\"ch.php?pg=$pg&amp;st=oh\">"; ?><img src="images/button-skin-oh.gif" width="15" height="15" border="0" alt="oh hey"></a></li>-->
<li><? echo "<a href=\"ch.php?pg=$pg&amp;st=st\">"; ?><img src="images/button-skin-st.gif" width="15" height="15" border="0" alt="summertimer"></a></li>
<li><? echo "<a href=\"ch.php?pg=$pg&amp;st=nf\">"; ?><img src="images/button-skin-nf.gif" width="15" height="15" border="0" alt="no fly"></a></li>
<li><? echo "<a href=\"ch.php?pg=$pg&amp;st=td\">"; ?><img src="images/button-skin-td.gif" width="15" height="15" border="0" alt="taking a dive"></a></li>
</ul>
<!-- STYLE MENU END -->

<!-- NAV MENU START -->
<div id="tabcontainer">
<ul id="tabnav">
<li><? echo "<a href=\"ch.php?pg=news&amp;st=$st\""; ?> <? if ($pg == 'news') { echo ('class="active"'); } ?>>News</a></li>
<li><? echo "<a href=\"ch.php?pg=music&amp;st=$st\""; ?> <? if ($pg == 'music') { echo ('class="active"'); } ?>>Music &amp; Merch</a></li>
<li><? echo "<a href=\"ch.php?pg=gallery&amp;st=$st\""; ?> <? if ($pg == 'gallery') { echo ('class="active"'); } ?>>Gallery</a></li>
<li><? echo "<a href=\"ch.php?pg=tours&amp;st=$st\""; ?> <? if ($pg == 'tours') { echo ('class="active"'); } ?>>Tours</a></li>
<li><? echo "<a href=\"ch.php?pg=contact&amp;st=$st\""; ?> <? if ($pg == 'contact') { echo ('class="active"'); } ?>>Contact</a></li>
</ul>
</div>
<!-- NAV MENU END -->