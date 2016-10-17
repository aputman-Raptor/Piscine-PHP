<?php
  $cart = unserialize($_COOKIE["cart"]);
  echo "<table width=\"100%\"><thead bgcolor=\"grey\"><tr><th width=\"50%\">Nom</th><th width=\"35%\">Prix</th><th width=\"8%\">Amount</th><th>Total</th></thead>";
  $total = 0;
	if ($cart)
	{
  foreach ($cart as $key => $value)
  {
    echo "<form><tr>";
    echo "<td><input readonly=\"readonly\" type=\"text\" value=\"" . $cart[$key]["name"] . "\" style=\"width:100%;border:none;font-size:15px;font-weight:500;\"></input></td>";
    echo "<td><input readonly=\"readonly\" type=\"text\" name=\"price\" value=\"" . $cart[$key]["price"] . "\" style=\"width:100%;border:none;font-size:15px;font-weight:500;\"></input></td>";
    echo "<td><input readonly=\"readonly\" width=\"10%\" type=\"number\" name=\"amount\"value=" . $cart[$key]["amount"] . " min=\"1\" style=\"width:100%;border:none;font-size:15px;\"></td>";
    $total += ($cart[$key]["price"] * $cart[$key]["amount"]);
    echo "<td><span>" . ($cart[$key]["price"] * $cart[$key]["amount"]) . "</span></td>";
    echo "</tr></form>";
  }
  echo "<tr><td colspan=\"2\"></td><td>Panier:</td><td>" . $total . "</td></tr>";
  echo "</table>";
  echo "<div align=\"right\"><form method=\"post\" action=\"index.php?page=account\">";
  echo "<input type=\"hidden\" name=\"total\" value=" . $total . ">";
  if ($_SESSION["solde"] >= $total)
    echo "<input type=\"submit\" name=\"buy\" value=\"Acheter\"></input>";
  else
    echo "<input type=\"submit\" disabled=\"disabled\" name=\"buy\" value=\"Acheter\"></input>";
  echo "</form></div>";}
?>
