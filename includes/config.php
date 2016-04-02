<?php
	$mysql_hostname="lifeofaris.se.mysql";
	$mysql_user="lifeofaris_se";
	$mysql_password="mRARIS1990";
	$mysql_database="lifeofaris_se";
	
	$bd=mysql_connect($mysql_hostname,$mysql_user,$mysql_password)or die("Bad Connection");
	mysql_select_db($mysql_database,$bd)or die("Bad Connection");
	?>
