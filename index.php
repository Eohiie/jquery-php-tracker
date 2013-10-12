<?php
//include("includes/config.php");
//$db_host = $GLOBALS["db_host"];
//$db_user = $GLOBALS["db_user"];
//$db_pass = $GLOBALS["db_pass"];
//$db_name = $GLOBALS["db_name"];
?>
<html>
<head>
<title><?php if(isset($GLOBALS["tr_title"])) echo $GLOBALS["tr_title"]." Statistics"; else echo "Nexuz Tracker Statistics";?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="style/base.css" />
<link rel="stylesheet" href="style/fonts.css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
</head>

<body>
    
    <script>
$( "li" ).hover(function() {
  $( this ).fadeOut( 100 );
  $( this ).fadeIn( 500 );
});
</script>
    
<div id="yif-1"><!-- Header -->
<h1><?php if(isset($GLOBALS["tr_title"])) echo $GLOBALS["tr_title"]; else echo "Nexuz Tracker";?></h1>
	</div>
  
<div id="yif-2"><!-- Side Bar -->
    <ul id="Navigation">
        <li><a href="#">Statistics</a></li>
        <li><a href="#">Add Torrent</a></li>
    </ul>
	</div>
  
<div id="yif-3"><!-- Content -->

	</div>
  
<div id="yif-4"><!-- Footer -->
<center>Based on PHPBTTracker. This tracker is released under GPL code</center>
	</div>
</body>
</html>