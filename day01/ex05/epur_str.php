#!/usr/bin/php
<?php
  if ($argc != 2)
    exit (0);
  $tab = explode(" ", trim($argv[1]));
  foreach ($tab as $key)
  {
    if (end($tab) == $key)
      echo "$key\n";
    else if ($key != "")
      echo "$key ";
  }
?>
