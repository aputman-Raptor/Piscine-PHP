<?php
if ($complete == 0)
	include("create.html");
else if ($complete == 2)
{
	echo "Felicitation ". $_SESSION["login"] . " votre inscription est valide.";
}
?>