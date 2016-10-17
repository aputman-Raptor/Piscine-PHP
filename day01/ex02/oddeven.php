#!/usr/bin/php
<?php
  $stdin = fopen('php://stdin', 'r');
  $scan;
  echo "Entrez un nombre: ";
  while (($scan = trim(fgets($stdin))) + 1)
  {
    if ($scan == NULL)
    {
      echo "$scan\n";
      exit(0);
    }
    if (is_numeric($scan))
    {
      if ($scan % 2)
        echo "Le chiffre $scan est Impair\n";
      else
        echo "Le chiffre $scan est Pair\n";
    }
    else
      echo "'$scan' n'est pas un chiffre\n";
    echo "Entrez un nombre: ";
  }
?>
