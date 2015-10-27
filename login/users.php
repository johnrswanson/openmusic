<?
include('../connect.php');

//include('requireuser.php');

$query = mysql_query("SELECT * FROM users")
or die(mysql_error());
	$arr = array();
		
while($userinfo = mysql_fetch_object( $query )) 
	{	

	$arr[] = $userinfo;			
	}
	

echo '{"info":'.json_encode($arr).'}';

	

?>
