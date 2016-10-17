<?php
include("addtocart.php"); 


  $products = unserialize(file_get_contents("data/products"));
//print_r($products);
	echo "<form method=\"post\" action=\"index.php?page=add\">";
	echo "<select name=\"type\">
            <option value=\"electronique\">electronique</option>
            <option value=\"jeux\">jeux</option>
            <option value=\"vetement\">vetement</option>

           </select>";
	echo "<input type=\"submit\" name=\"submit2\" value=\"Choisir une categorie\">";
echo "</form>";
//	echo $_POST["type"];
  echo "<table width=\"100%\"><thead bgcolor=\"grey\"><tr><th width=\"50%\">Nom</th><th width=\"35%\">Description</th><th>Amount</th><th></th></thead>";
	 
  foreach ($products as $key => $value)
  {
	  if ($_POST["type"] == $products[$key]["type"] || !$_POST["type"]) 
	  {
    echo "<form method=\"post\" action=\"index.php?page=add\"><tr>";
    echo "<td><input readonly=\"readonly\" type=\"text\" name=\"name\" value=\"" . $products[$key]["name"] . "\" style=\"width:100%;border:none;font-size:15px;font-weight:500;\"></input></td>";
    echo "<td><input readonly=\"readonly\" type=\"text\" name=\"price\" value=\"" . $products[$key]["price"] . "\" style=\"width:100%;border:none;font-size:15px;font-weight:500;\"></input></td>";
    echo "<td><input width=\"10%\" type=\"number\" name=\"amount\"value=\"1\" min=\"1\"></td>";
    echo "<td><input type=\"submit\" name=\"submit\" value=\"Ajouter au panier\"></td>";
    echo "</tr></form>";
	  }
  }
  echo "</table>";
//print_r(unserialize($_COOKIE["cart"]));
?>
