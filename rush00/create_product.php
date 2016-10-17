<?php
  if ($_POST["submit"] !== "OK")
    return("");
  if (!$_POST["name"] || !$_POST["price"] || !$_POST["type"])
    return("");
  if (!file_exists("./data"))
  {
    mkdir("./data/");
    file_put_contents("./data/products", "");
    $products = array();
  }
  else
  {
    $products = unserialize(file_get_contents("./data/products"));
  }
$i = datalen(array("./data/". "products"));
  $products[$i]["name"] = $_POST["name"];
  $products[$i]["price"] = $_POST["price"];
  $products[$i]["type"] = $_POST["type"];
  file_put_contents("./data/products", serialize($products));
  echo "";
?>
