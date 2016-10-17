<?php
if (!function_exists('checkpedit')) {
function checkpedit($data, $aname, $uname, $price ,$type)
{
	if (!$aname || !$uname || !$type || ($price < 0)  || $_POST["pedit"] != "edit")
		return (1);
	if (!$data)
		return (1);
	for ($i = 0; $data[$i] ; $i++)
	{
		if ($data[$i]["name"] == $aname)
			return (0);
	}
	return (1);
}}
if (!function_exists('pedit')) {
	function pedit($p, $aname, $uname, $price ,$type)
{
	$data = getdata($p);
	if (checkpedit($data, $aname, $uname, $price ,$type))
		return (0);	
	for ($i = 0; $data[$i] ; $i++)
	{
		if ($data[$i]["name"] == $aname)
			$j = $i;
	}

	if ($_SESSION["lvl"] < 1)
		return (0);
	$data[$j]["name"] = $uname;
	$data[$j]["price"] = $price;
	$data[$j]["type"] = $type;
	putdata($p, $data);
	return (1);
	
}}
//echo $_POST["aname"];
//echo $_POST["uname"];
//echo $_POST["ulvl"];
$p2 = array("./data/", "products");
pedit($p2, $_POST["aname"], $_POST["uname"], $_POST["price"], $_POST["type"]);
?>