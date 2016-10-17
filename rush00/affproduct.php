<?php
if (!function_exists('putdata')) {
function putdata($p, $data)
{
	if (!file_exists($p[0]))
		mkdir($p[0]);
	file_put_contents($p[0] . $p[1], serialize($data));
}}
if (!function_exists('getdata2')) {
function getdata2($p)
{

	if (file_exists($p[0] . $p[1]))
	{

		return unserialize(file_get_contents($p[0] . $p[1] . $p[2]));
		
	}
	return NULL;
}}
if (!function_exists('affp')) {
function affp($p)
{

	$data = getdata2($p);

	if (!$data)
		return (0);	

	for ($i = 0; $data[$i]; $i++)
	{
	
							
		echo "<form action='index.php?page=product' style='display:inline-block;' method='POST'><tr><td style='width:120px;display:inline;'>";
		echo "<input type='text' name='uname' style='dislplay:inline-block;width:100px;' value='";
		echo  $data[$i]["name"];
		echo "'>";
		echo "<input type='hidden' name='aname'style='display:inline-block;' value='";
		echo  $data[$i]["name"];
		echo "'/>";
//		echo "<div style='size:3px;'></td><td style='width:160px;'><font size='1'>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<input type='text' name='price' style='width:40px;' value='";
		echo  $data[$i]["price"];
		echo "'>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "</td><td style='width:90px;'>";
		echo  "<select name='type'>
    		<option value='electronique'".(($data[$i]["type"] == "electronique")?'selected="selected"':"").">electronique</option>
			<option value='jeux'".(($data[$i]["type"] == "jeux")?'selected="selected"':"").">jeux</option>
			<option value='vetement'".(($data[$i]["type"] == "vetement")?'selected="selected"':"").">vetement</option>
    		
   			</select>";
		echo "</td><td style='width:120px;'>";
		echo "<input type='submit' name='pedit' value='edit' />";
		echo "</form>";
		echo "<form action='index.php?page=product'  onsubmit='return cf3();' style='display:inline-block;'  method='POST'>";
		echo "<input type='hidden' name='aname' value='";
        echo  $data[$i]["name"];
		echo "'>";
		echo "<input type='submit' name='pdel' value='del' />";
		echo "</form></td></tr>";
	}

}
}

affp(array("./data/", "products"));

?>