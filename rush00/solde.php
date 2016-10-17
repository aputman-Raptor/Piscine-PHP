<?php
if (!function_exists('check_solde')) {
function check_solde($data, $name, $solde)
{
	if (!$name || (($solde <= 0)  || ($solde > 10000)) || $_POST["submit"] != "VALIDER")
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
if (!function_exists('add_solde')) {
function add_solde($p, $name, $solde)
{
	$data = getdata($p);
	if (check_solde($data, $name, $solde))
		return (0);	
	for ($i = 0; $data[$i] ; $i++)
	{
		if ($data[$i]["login"] == $name)
			$j = $i;
	}
	if (($data[$j]["solde"] + $solde) > 100000)
		return (0);
	$data[$j]["solde"] = $data[$j]["solde"] + $solde;
	$_SESSION["solde"] = $data[$j]["solde"];
	$_POST["solde"] = 0;
	putdata($p, $data);
	return (1);
	
}}
$complete4 = add_solde($p, $_SESSION["login"], $_POST["solde"]);
$data = getdata($p);
?>