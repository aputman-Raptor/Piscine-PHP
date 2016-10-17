<?php
  if ($_POST["submit"] !== "OK")
    exit("ERROR\n");
  if (!$_POST["login"] || !$_POST["passwd"])
    exit("ERROR\n");
  if (!file_exists("../private"))
  {
    mkdir("../private");
    file_put_contents("../private/passwd", "");
    $accounts = array();
  }
  else
    $accounts = unserialize(file_get_contents("../private/passwd"));
  $end = 0;
  foreach ($accounts as $key => $element)
  {
    if ($element["login"] === $_POST["login"])
      exit("ERROR\n");
    if ($key > $end)
      $end = $key;
  }
  $accounts[$end + 1]["login"] = $_POST["login"];
  $accounts[$end + 1]["passwd"] = hash("whirlpool", $_POST["passwd"]);
  file_put_contents("../private/passwd", serialize($accounts));
  echo "OK\n";
?>
