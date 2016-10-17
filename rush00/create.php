<?php
if (!function_exists('putdata')) {
function putdata($p, $data)
{
	if (!file_exists($p[0]))
		mkdir($p[0]);
	file_put_contents($p[0] . $p[1], serialize($data));
}}
if (!function_exists('getdata')) {
function getdata($p)
{
	if (file_exists($p[0] . $p[1]))
		return unserialize(file_get_contents($p[0] . $p[1] . $p[2]));
	return NULL;
}}
if (!function_exists('datalen')) {
function datalen($p)
{
	
	$data = getdata($p);
	if (!$data)
		return 0;
	for ($i = 0; $data[$i]; $i++);
	return ($i);
}}
if (!function_exists('check')) {
function check($data, $name, $mdp, $confirm)
{
	if (!$name || !$mdp || $_POST["submit"] != "VALIDER" || !$confirm)
		return (1);
	if ($mdp != $confirm)
		return (1);
	if (!$data)
		return (0);
	for ($i = 0; $data[$i] ; $i++)
	{
		if ($data[$i]["login"] == $name)
			return (1);
	}
}}
if (!function_exists('adddata')) {
function adddata($p, $name, $mdp, $confirm)
{
	$i = datalen($p);
	$data = getdata($p);
	if (check($data, $name, $mdp, $confirm))
		return (0);	
	$data[$i]["login"] = $name;
	$data[$i]["passwd"] = hash("whirlpool", "$mdp");
	$data[$i]["solde"] = 0;
	$data[$i]["key"] = hash("md2", "$name");
	$data[$i]["lvl"] = 0;
	$data[$i]["birth"] = time();
	
	$_SESSION["login"] = $name;
	$_SESSION["key"] = hash("md2", "$name");
	$_SESSION["solde"] = 0;
	$_SESSION["auth"] = 1;
	$_SESSION["lvl"] = $data[$i]["lvl"];
	$_SESSION["time"] = date("Y-m-d", $data[$i]["birth"]);
	asort($data);
	putdata($p, $data);
	return 2;	
}
}
$p = array("./data/", "user");
$complete = adddata($p, $_POST["login"], $_POST["passwd"], $_POST["confirm"]);

?>