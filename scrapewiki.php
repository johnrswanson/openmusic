<?

///TEXT
$psafekeyword=str_replace(' ', '_', $keyword);
$getpage='https://en.wikipedia.org/wiki/'.$psafekeyword.'_(band)';
$page = file_get_contents($getpage);
if($page=='')
{$getpage='https://en.wikipedia.org/wiki/'.$psafekeyword;
$page = file_get_contents($getpage);
echo'<br><i class="fa fa-wikipedia-w"></i><br>';
if($page==''){echo'No info found on wikipedia about '.$keyword.'.';}
}
$doc = new DOMDocument(); 
$doc->loadHTML($page);


	echo'<div style="padding: 20px; ">';
	$items = $doc->getElementsByTagName('p'); 
	$limit='40';
	$count='1';
	foreach($items as $item) 
		{
		$show=$item->nodeValue;
			
		// then processed via
		if($count<$limit)
			{
			echo '<p style="text-align:left; background: #ffffff; opacity: 0.9; font-size: 14px;  ';
			if($count=='1'){echo' font-size: 30px;';}
			echo'"';
			if($count!='1'){echo' class="texpand"';}
			echo'>'.$show.'</p>';
			}
	    $count++;
		}
		$safekeyword=str_replace(' ', '+', $keyword);
	echo'</div>';	
	  echo' <a class="tplus" href="#"> Read More</a>';
?>