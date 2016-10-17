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
if (!function_exists('affu')) {
function affu($p)
{
	$data = getdata($p);
	if (!$data)
		return (0);	
	for ($i = 0; $data[$i]; $i++)
	{
		echo "<form action='index.php?page=user' style='display:inline-block;' method='POST'><tr><td style='width:120px;display:inline;'>";
		echo "<input type='text' name='uname' value='";
		echo  $data[$i]["login"];
		echo "'>";
		echo "<input type='hidden' name='aname' value='";
		echo  $data[$i]["login"];
		echo "'>";
		echo "<div style='size:3px;'></td><td style='width:160px;'><font size='1'>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo date("Y-m-d H:i", $data[$i]["birth"]);
		echo "</font></div></td><td style='width:120px;'>";
		echo  "<select name='ulvl'>
    		<option value='0'".(($data[$i]["lvl"] == 0)?'selected="selected"':"").">0</option>
			<option value='1'".(($data[$i]["lvl"] == 1)?'selected="selected"':"").">1</option>
			<option value='2'".(($data[$i]["lvl"] == 2)?'selected="selected"':"").">2</option>
    		
   			</select>";
		echo "</td><td style='width:120px;'>";
		echo "<input type='submit' name='uedit' value='edit' />";
		echo "</form>";
		echo "<form action='index.php?page=user'  onsubmit='return cf2();' style='display:inline-block;'  method='POST'>";
		echo "<input type='hidden' name='aname' value='";
        echo  $data[$i]["login"];
		echo "'>";
		echo "<input type='submit' name='udel' value='del' />";
		echo "</form></td></tr>";
	}

}
}
$p = array("./data/", "user");
affu($p);

?>