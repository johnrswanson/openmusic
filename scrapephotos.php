<?
	//ONE BING PHOTO
$safekeyword=str_replace(' ', '+', $keyword);
$agetpage='http://www.bing.com/images/search?q='.$safekeyword.'+band&view=detailv2';
$apage = file_get_contents($agetpage);
$aphoto = new DOMDocument();
$aphoto->loadHTML($apage);
$aitems = $aphoto->getElementsByTagName('img'); 
$alimit='2';
$acount='0';
$once='true';
foreach($aitems as $aitem) 
	{
		if($acount!='0'){
		if($acount<$alimit){
    echo '<img style=" width: 100%; max-width: 320px; margin:auto; height: auto;" src="';
    //echo $ppage.'/';
    $alink=$aitem->getAttribute('src');
    echo $alink.'" >';
    echo' <br><a class="pplus" href="#"> More photos</a>';
		
		if($once=='true'){
						
						
					echo'<div class="background-image"></div>
					<style>
					.background-image {
						background: #111111;
					  background-image: url("'.$alink.'");
					  background-size: cover;
					  display: block;
					  filter: blur(10px);
					  -webkit-filter: blur(10px);
					  height: 800px;
					  left: 0;
					  position: fixed;
					  right: 0;
					  top:150px;
					  z-index: -1;
					  opacity: 0.8;</style>
					}
					';
					$once='false';
					}							   
		
	}
	}
$acount++;
	
}


echo'<div class="pexpand">';
//MORE BING PHOTOS
$safekeyword=str_replace(' ', '+', $keyword);
$pgetpage='http://www.bing.com/images/search?q='.$safekeyword.'+band&view=detailv2';
$ppage = file_get_contents($pgetpage);
$photo = new DOMDocument();
$photo->loadHTML($ppage);
$items = $photo->getElementsByTagName('img'); 
$plimit='20';
$pcount='0';
$once='true';
foreach($items as $item) 
	{
		if($pcount!='1'){
		if($pcount<$plimit){
    echo '<img style=" float: left; height: auto;" src="';
    //echo $ppage.'/';
    $link=$item->getAttribute('src');
    echo $link.'" >';
					   
					   
		///BG PHOTO///////
					
					

	}
	}
$pcount++;
	
}
echo'</div>';

?>