<?
include('../connect.php');
include('../login/usercheck.php');
$title=addslashes($_POST['keyword']);
$deleteme=addslashes($_POST['deleteme']);
	

echo $title;
echo $userID;
echo $deleteme;


if (isset($deleteme))
	{	
	mysql_query("delete from list where ID='$deleteme' and userID='$userID' limit 1")or die(mysql_error());
	}
	echo': loaded 100%';
?>