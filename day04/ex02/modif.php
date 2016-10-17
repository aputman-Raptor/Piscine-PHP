<?php
  if ($_POST["submit"] !== "OK")
    exit("ERROR\n");
  if (!$_POST["login"] || !$_POST["oldpw"] || !$_POST["newpw"])
    exit("ERROR\n");
  $accounts = unserialize(file_get_contents("../private/passwd"));
  foreach ($accounts as $key => $element)
  {
    if ($element["login"] === $_POST["login"])
      break;
  }
  if (!($element["login"] === $_POST["login"]) || !($element["passwd"] === hash("whirlpool", $_POST["oldpw"])))
    exit("ERROR\n");
  $accounts[$key]["passwd"] = hash("whirlpool", $_POST["newpw"]);
  file_put_contents("../private/passwd", serialize($accounts));
  echo "OK\n";
?>
