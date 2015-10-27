<?
include('../connect.php');
$thisguy=addslashes($_GET['userID']);
$listquery = mysql_query("SELECT * FROM list where userID = '$thisguy' order by title asc ")
or die(mysql_error());	
$listarr = array();
while($listinfo = mysql_fetch_object( $listquery )) 
	{	
	$listarr[] = $listinfo;			
	}
echo '{"otherlist":'.json_encode($listarr).'}';
?>