<?php
if ($complete2 == false)
	include("login.html");
else if ($complete2 == true)
{
	echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
}
?>