<?
include('../connect.php');
include('../login/usercheck.php');
$title=addslashes($_POST['keyword']);
$new=addslashes($_POST['new']);
$update=addslashes($_POST['update']);
$deleteme=addslashes($_POST['deleteme']);
	
echo $new;
echo $title;
echo $userID;
echo $deleteme;

if (isset($new))
	{
	mysql_query("insert into list(ID, title, userID) values('', '$title', '$userID')")or die(mysql_error());
	echo'List Item has been added';
	}

if (isset($deleteme))
	{	
	mysql_query("delete from list where ID='$deleteme' and userID='$userID' limit 1")or die(mysql_error());
	}
	echo': loaded 100%';
?>