<?php
if ($_GET["page"] == "inscription")
	include("complete.php");
else if ($_GET["page"] == "login")
	include("complete2.php");
else if ($_GET["page"] == "cart")
	include("cart.php");
else if ($_GET["page"] == "account" && $auth == 1)
	include("account.php");
else if ($_GET["page"] == "user" && $auth == 1 && $_SESSION["lvl"] >= 1)
	include("user.php");
else if ($_GET["page"] == "create_product" && $auth == 1 && $_SESSION["lvl"] >= 1)
    include("create_product.html");
else if ($_GET["page"] == "trade2" && $auth == 1 && $_SESSION["lvl"] >= 1)
	include("trade2.php");
else if ($_GET["page"] == "product" && $auth == 1 && $_SESSION["lvl"] >= 1)
	include("product.php");
else if ($_GET["page"] == "newpw" && $auth == 1)
	include("complete3.php");
else if ($_GET["page"] == "add")
	include("produit.php");
else if ($_GET["page"] == "solde" && $auth == 1)
	include("complete4.php");
else if ($_GET["page"] == "trade" && $auth == 1)
	include("trade.php");
else if ($_GET["page"] == "delete" && $auth == 1)
    include("delete.html");
else 
	include("accueil.html");
?>
