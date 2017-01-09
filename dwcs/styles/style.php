<?php
	session_start();
	header("Content-type: text/css");
	$color;
	if(isset($_COOKIE[$_SESSION['user']]['color']))
		$color = $_COOKIE[$_SESSION['user']]['color'];
	else
		$color = "white";	
?>

body {
	background-color:<?=$color?>;
}
