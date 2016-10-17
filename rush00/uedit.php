<?php
if (!function_exists('checkuedit')) {
function checkuedit($data, $aname, $uname, $lvl)
{
	if (!$aname || !$uname || (($lvl < 0) || ($lvl > 2) ) || $_POST["uedit"] != "edit")
		return (1);

	if (!$data)
		return (1);
	for ($i = 0; $data[$i] ; $i++)
	{
		if ($data[$i]["login"] == $aname)
			return (0);
	}
	return (1);
}}
if (!function_exists('uedit')) {
	function uedit($p, $aname, $uname, $lvl)
{
	$data = getdata($p);
	if (checkuedit($data, $aname, $uname, $lvl))
		return (0);	
	for ($i = 0; $data[$i] ; $i++)
	{
		if ($data[$i]["login"] == $aname)
			$j = $i;
	}

	if ($_SESSION["lvl"] < $lvl)
	{

		return (0);
	}
	$data[$j]["login"] = $uname;
	$data[$j]["lvl"] = $lvl;
	putdata($p, $data);
	return (1);
	
}}
//echo $_POST["aname"];
//echo $_POST["uname"];
//echo $_POST["ulvl"];
$p = array("./data/", "user");
uedit($p, $_POST["aname"], $_POST["uname"], $_POST["ulvl"]);
?>