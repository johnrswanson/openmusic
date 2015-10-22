<div id="content"><?

$page=$_GET['thisID'];


//FREE STOCK PHOTOS SOURCE
	function search($keyword)	{
		
		//////YOUTUBE is MUSIC PIRACY CENTRAL THX GOOGZ!
		
		
echo'<div class="linksbarmobile">
<a class="plus" href="#"><i class="fa fa-play" style=" padding: 10px; font-size: 30px; "></i></a>
<a class="minus" style="display:none;" href="#"><img src="./mobilemenu_off.png"></a>
</div>';


		
		echo'<div class="section group">';
		
$safekeyword=str_replace(' ', '+', $keyword);
$ukeyword=str_replace(' ', '_', $keyword);

	
echo'<div style="position: relative; z-index: 1;" class="col span_2_of_10 '.$safekeyword.' expand">';
include('scrapelinks.php');
echo'</div>';

///END MENU
	
	
echo'<div class="col span_6_of_10 '.$psafekeyword.'"  text-align: left; ">';
	
	echo'<p style="position: relative; font-size: 30px; z-index: 10000; " >
	
	<a href="#" onclick="addListItem(\''.$keyword.'\');"><i class="fa fa-plus-circle"></i> Add to My List</a>
	</p>';
	
	
	include('scrapephotos.php');
	echo'<br>';
	include('scrapewiki.php');
	echo'</div>';		
echo'</div>';

		

}
?>






<?
$keyword=$_POST['keyword'];

//echo'Loading '.$keyword.'... <br>';
echo'<span style="font-size: 10px; ">';
echo'<div style="width: auto;">';
if(strlen($keyword)>'0')
{
	search($keyword);
}
else {echo'Enter a band name and press return.';}
echo'</div>';

?>
</div>
<div style="clear:both: width: 100%;"></div>

<script>

	$('document').ready(function(){
	$('.plus').click(function(){
		$('.expand').css('height', 'auto');
		$('.plus').fadeOut(0);
		$('.minus').slideDown(30);
	});

$('.pplus').click(function(){
		$('.pexpand').slideDown();
		$('.pplus').slideUp();
		
	});

$('.tplus').click(function(){
		$('.texpand').slideDown();
		$('.tplus').slideUp();
	});


	$('.minus').click(function(){
			$('.minus').fadeOut(0);
			$('.plus').slideDown(0);
			$('.expand').css('height', '0px');	
	});
});

</script>
<style>
</style>
