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
if (!function_exists('afftu')) {
function affta($p)
{
	$data = getdata($p);
	if (!$data)
		return (0);	
echo "<table width=\"100%\"><thead bgcolor=\"grey\"><tr><th width=\"50%\">USER</th><th width=\"35%\">DATE</th><th width=\"8%\">PRIX</th></thead>";
	for ($i = 0; $data[$i]; $i++)
	{
		
			echo "<tr>";
			echo "<td>";
				echo  $data[$i]["name"];
			echo "</td>";
			echo "<td>";
				echo  $data[$i]["time"];
				echo "</td>";
				echo "<td>";
				echo  $data[$i]["solde"];
				echo "</td>";
				echo "</tr>";
		
		
	}

	echo "</table>";

}
}
affta(array("./data/", "trade"));

?>