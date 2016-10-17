#!/usr/bin/php
<?php

  function ft_split($str)
  {
    return array_slice(array_filter(explode(" ", $str)), 0);
  }

  if ($argc < 2)
    exit(0);
  $tab = ft_split(trim($argv[1]));
  $end = count($tab);
  if ($end > 1)
  {
    $i = 0;
    while (++$i < $end)
      echo "$tab[$i] ";
  }
  echo "$tab[0]\n";
?>
