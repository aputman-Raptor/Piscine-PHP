#!/usr/bin/php
<?php

  function ft_split($str)
  {
    return array_slice(array_filter(explode(" ", $str)), 0);
  }

  if ($argc < 2)
    exit(0);

  $tab = array();
  $i = 0;
  while (++$i < $argc)
  {
    $splitted = ft_split(trim($argv[$i]));
    $tab = array_merge($tab, $splitted);
  }
  sort($tab);
  foreach ($tab as $value)
    echo "$value\n";
?>
