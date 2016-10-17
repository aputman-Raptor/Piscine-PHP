<?php
//  header("Location: index.php?page=add");

  if ($_POST["name"] && $_POST["price"] && $_POST["amount"] && $_POST["submit"])
  {

  $product = array("name" => "", "price" => "", "amount" => "");
  foreach ($_POST as $key => $value)
    $product[$key] = $_POST[$key];
  unset($product[$key]);
  if (!$_COOKIE["cart"])
  {
		  $tmp = array($product);
//	  $tmp = array($product, array("name" => "truc", "price" => "42", "amount" => "2"));
	  setcookie("cart", serialize($tmp));
  }
  else
  {
    $tmp = unserialize($_COOKIE["cart"]);
    foreach ($tmp as $key => $value)
    {
      if ($value["name"] === $product["name"])
      {
        $tmp[$key]["amount"] += $product["amount"];
        break;
      }
    }
	//echo $value["name"];
    if ($value["name"] !== $product["name"])
    {
      $i = 0;
      while($tmp[$i])
        $i++;
      $tmp[$i] = $product;
    }

	setcookie("cart", serialize($tmp));
	//setcookie("cart", serialize($tmp), time() - 1);
  }
    echo "<script type='text/javascript'>document.location.replace('index.php?page=add');</script>";
  }
//
?>
