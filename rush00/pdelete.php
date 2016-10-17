<?php
if (!function_exists('checkpdel')) {
function checkpdel($data, $aname)
{
	if (!$aname || $_POST["pdel"] != "del")
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
if (!function_exists('pdel')) {
	function pdel($p, $aname)
{
	$data = getdata($p);
	if (checkpdel($data, $aname))
		return (0);	
	for ($i = 0; $data[$i] ; $i++)
	{
		if ($data[$i]["name"] == $aname)
			$j = $i;
	}

	if ($data[$j]["lvl"] >= 1)
		return (0);
/*	if (!$data[$j + 1])
		array_pop($data);
	else if ($j == 0)
		array_shift($data);
	else
		array_splice($data,$j, 1);
*/
	unset($data[$j]);
	$data = array_values($data);
	
    putdata($p, $data);
//	echo "<script type='text/javascript'>document.location.replace('index.php?page=pruduct');</script>";
	return (1);
	
}}
//echo $_POST["uname"];
//echo $_POST["ulvl"];
$p3 = array("./data/", "products");
pdel($p3, $_POST["aname"]);
?>