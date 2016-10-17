<?php
  if ($_POST["submit"] !== "OK")
    exit("ERROR\n");
  if (!$_POST["name"] || !$_POST["price"] || !$_POST["img_src"])
    exit("ERROR\n");
  if (!file_exists("../data"))
  {
    mkdir("../data");
    file_put_contents("../data/products", "");
    $products = array();
  }
  else
    $products = unserialize(file_get_contents("../data/products"));
  $end = 0;
  foreach ($products as $key => $element)
  {
    if ($element["product_name"] === $_POST["name"])
      exit("ERROR\n");
    if ($key > $end)
      $end = $key;
  }
  $products[$end + 1]["product_name"] = $_POST["name"];
  $products[$end + 1]["product_price"] = $_POST["price"];
  $products[$end + 1]["img_src"] = $_POST["img_src"];
  file_put_contents("../data/products", serialize($products));
  echo "OK\n";
?>
