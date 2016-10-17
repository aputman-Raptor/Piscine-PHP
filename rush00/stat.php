<?php
$auth = 0;

if ($_SESSION["login"] && $_SESSION["key"])
	if ($_SESSION["auth"] == 1)
		if (hash("md2", $_SESSION["login"]) == $_SESSION["key"])
			$auth = 1;
if ($auth == 1 && $_SESSION["lvl"] == 0)
	include("auth.html");
else if ($auth == 1 && $_SESSION["lvl"] == 2)
	include("auth2.html");
else
	include("visit.html");
?>