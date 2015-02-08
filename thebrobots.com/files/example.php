<?php	

require_once( 'my_twitter.php' );

$twitter =  new MyTwitter('dearbobbyfever@gmail.com', 'sonictwitter');

$status = $twitter->userTimeLine();

$total = count($status);

	
for ( $i=0; $i < $total ; $i++ )
		{ 
		
		echo "txt = '". $status[$i]['text'] ."'; document.write(txt);";
		
		}
		
?>













