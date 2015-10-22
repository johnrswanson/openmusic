<html>
<head>
	<title>
	Open Music
	</title>
	
	
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320" content="width=device-width, user-scalable=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimal-ui" />
<link rel="shortcut icon" href="./favicon.ico">
	
	<link rel="shortcut icon" href="./css/html5reset.css">
	<link rel="stylesheet" href="./css/html5reset.css" media="all">
	<link rel="stylesheet" href="./css/responsivegridsystem.css" media="all">
	<link rel="stylesheet" href="./css/col.css" media="all">
	<link rel="stylesheet" href="./css/2cols.css" media="all">
	<link rel="stylesheet" href="./css/3cols.css" media="all">
	<link rel="stylesheet" href="./css/4cols.css" media="all">
	<link rel="stylesheet" href="./css/5cols.css" media="all">
	<link rel="stylesheet" href="./css/6cols.css" media="all">
	<link rel="stylesheet" href="./css/7cols.css" media="all">
	<link rel="stylesheet" href="./css/8cols.css" media="all">
	<link rel="stylesheet" href="./css/9cols.css" media="all">
	<link rel="stylesheet" href="./css/10cols.css" media="all">
	<link rel="stylesheet" href="./css/11cols.css" media="all">
	<link rel="stylesheet" href="./css/12cols.css" media="all">
	<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="./css/1024.css">
	<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="./css/768.css">
	<link rel="stylesheet" media="only screen and (max-width: 480px)" href="./css/480.css">



<link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicons/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="/favicons/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/favicons/manifest.json">
<link rel="shortcut icon" href="/favicons/favicon.ico">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/favicons/mstile-144x144.png">
<meta name="msapplication-config" content="/favicons/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
</head>
<body>
<?php include('./connect.php');?>



<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="login/style.css">
<link rel="stylesheet" href="list/style.css">



<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" type="text/javascript" src="login/script.js"></script>
<script type="text/javascript" type="text/javascript" src="list/script.js"></script>

<script>
$(document).ready(function() {

$( "#searcher" ).submit(function(e) {
		$("#result").html('<i class="fa fa-spinner fa-pulse"></i><br>Loading...');
	e.preventDefault();
    var value = $('#search').val();
   $.post( "loadremote.php", {keyword: ''+value+'' } )
   .done(function( data ) {
    $("#result").html( data );
     $('#result').show(300);
     $('#list').hide(300);
     
  });
});
  
  
 
$('.trigger').click(function(abc) {
	abc.preventDefault();
	var link_href = $(this).attr("href");
	$('#box').html('<i style="font-size: 300px;  color: #ccc; " class="fa fa-spinner fa-spin"></i>');	
	$('#box').load(link_href);
	$('.minus').fadeOut(0);
	$('.plus').slideDown(0);
	$('.expand').css('height', '0px');	
	
	});
 }); 
</script>
	 
	
<div style="position: fixed; top: 0px; left: 0px; right: 0px; height: 90px; background: #fff; text-align: left; z-index: 10; ">
	<a href="./"> 
	<i class="fa fa-music" style="font-size:90px; color: #f05;"></i>
	
	<div style="width: 100px; text-align: left; margin-left: 20px;  font-size: 12px; font-family:courier new; ">0P3NMu5!C.XyZ</a>
	</div>
	<form ID="searcher">
	<input type="hidden" name="new" value="add">
	<input ID="search" type="text" placeholder="Search..."  name="keyword">
	</form>
	
	<? include('./login/usercheck.php');?>
	<div id="logincontent"></div>
	<br>
	<?if($loggedin=='true'){?>	
	<a href="#" class="lister" onclick="showList()"><i class="fa fa-list"></i></a>
	<?}?>	
 </div>
<div style="margin-top: 150px; clear: both;"></div> 



<?if($loggedin=='true'){?>		
<div id="list"></div>	
<div ID="result"></div>
<?}?>	
		
<!--<div style="font-size: 12px; text-align:right; min-width: 100%; margin-top: 50px; clear:both;">this site was built by <a href="http://johnswanson.nyc">john</a>@<a href="http://red.yellow.blue">red.yellow.blue</a></div>-->
	
	</center>
	
	</body>
</html>