<?php
if (!function_exists('check_mdp2')) {
function check_mdp2($data, $name, $mdp)
{
	if (!$name || !$mdp || $_POST["submitd"] != "VALIDER")
		return (1);
	if (!$data)
		return (1);
	for ($i = 0; $data[$i] ; $i++)
	{
		if ($data[$i]["login"] == $name)
			return (0);
	}
	return (1);
}}
if (!function_exists('adddata2')) {
function adddata2($p, $name, $mdp)
{
	$data = getdata($p);
	if (check_mdp2($data, $name, $mdp))
		return (0);	
	for ($i = 0; $data[$i] ; $i++)
	{
		if ($data[$i]["login"] == $name)
			$j = $i;
	}
	if ($data[$j]["passwd"] != $mdp)
		return (0);
	unset($data[$j]);
    $data = array_values($data);
	putdata($p, $data);
	$_SESSION["login"] = NULL;
	$_SESSION["key"] = NULL;
	$_SESSION["solde"] = NULL;
	$_SESSION["auth"] = NULL;
	$_SESSION["time"] = NULL;
	echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
	
}}
$complete5 = adddata2($p, $_SESSION["login"], hash("whirlpool", $_POST["udelete"]));
?>