#!/usr/bin/php
<?php
  function ft_is_sort($tab)
  {
    $temp = $tab;
    sort($temp);
    return ($temp == $tab ? TRUE : FALSE);
  }
?>
