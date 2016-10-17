<?php
if (!function_exists('auth')) {
function auth($login, $passwd)
{
	$p = array("./data/", "user");
	if (!$login || !$passwd)
		return (false);
	if (!file_exists($p[0] . $p[1]))
		return (false);
	$data = unserialize(file_get_contents($p[0] . $p[1]));
	if (!$data)
		return (false);
	for ($i = 0; $data[$i] ; $i++)
	{
		if ($data[$i]["login"] == $login && $data[$i]["passwd"] == hash("whirlpool" ,$passwd))
		{
			$_SESSION["login"] = $login;
			$_SESSION["key"] = hash("md2", "$login");
			$_SESSION["solde"] = $data[$i]["solde"];
			$_SESSION["auth"] = 1;
			$_SESSION["lvl"] =  $data[$i]["lvl"];
			$_SESSION["time"] = date("Y-m-d H:i:s", $data[$i]["birth"]);
			return (true);
		}
	}
	return (false);
}}
$complete2 = auth($_POST["login"], $_POST["passwd"]);
?>