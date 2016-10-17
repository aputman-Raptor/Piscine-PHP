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
if (!function_exists('tcheck')) {
function tcheck($data, $total)
{
	if (($total <= 0) && ($_POST["buy"] != "Acheter"))
		return (1);
	if (!$data)
		return (1);
	return(0);
}}
if (!function_exists('tdata')) {
function tdata($p, $total)
{
	$i = datalen($p);
	$trade = getdata($p);
	$user = getdata(array("./data/", "user"));
	if (tcheck($user, $total))
		return (0);	

	for ($j = 0; $user[$j]; $j++ )
	{
		if ($user[$j]["login"] == $_SESSION["login"])
		{
			
//			echo $total;
//			echo $_SESSION["login"];
			//			echo $user[$j]["name"];
			if ($user[$j]["solde"] < $total)
				return 0;
			//				echo($_POST["total"]);
			$user[$j]["solde"] = $user[$j]["solde"] - $total;
			$_SESSION["solde"] = $user[$j]["solde"];
			
			$trade[$i]["name"] = $user[$j]["login"];
			$trade[$i]["time"] = date("H-m-s", time());
			$trade[$i]["solde"] = $total;
		setcookie("cart", NULL, time() -1);
		}
	}

	putdata(array("./data/", "user") , $user);
	putdata(array("./data/", "trade") , $trade);
	return 2;	
}
}
$p4 = array("./data/", "trade");

tdata($p4, $_POST["total"]);

?>