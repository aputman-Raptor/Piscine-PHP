#!/usr/bin/php
<?php
  function ft_split($str)
  {
    $i = 0;
    $tab = explode(" ", $str);
    foreach ($tab as $key)
    {
      if ($key == NULL)
        unset($tab[$i]);
      $i++;
      unset($key);
    }
    sort($tab);
    return $tab;
  }
?>
