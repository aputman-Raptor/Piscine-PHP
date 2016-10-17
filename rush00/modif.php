<?php
if (!function_exists('check_mdp')) {
function check_mdp($data, $name, $mdp, $new)
{
	if (!$name || !$mdp || !$new || $_POST["submit"] != "VALIDER")
		return (1);
	if (!$data)
		return (1);
	for ($i = 0; $data[$i] ; $i++)
	{
		if ($data[$i]["login"] == $name && $data[$i]["passwd"] == $mdp && $data[$i]["passwd"] != $new)
			return (0);
	}
	return (1);
}}
if (!function_exists('adddata_mdp')) {
function adddata_mdp($p, $name, $mdp, $new)
{
	$data = getdata($p);
	if (check_mdp($data, $name, $mdp, $new))
		return (0);	
	for ($i = 0; $data[$i] ; $i++)
	{
		if ($data[$i]["login"] == $name && $data[$i]["passwd"] == $mdp && $data[$i]["passwd"] != $new)
			$j = $i;
	}
	$data[$j]["passwd"] = $new;
	putdata($p, $data);
	return (1);
	
}}
$complete3 = adddata_mdp($p, $_SESSION["login"], hash("whirlpool", $_POST["oldpw"]), hash("whirlpool", $_POST["newpw"]));
$data = getdata($p);
?>