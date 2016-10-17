<?php

  class NightsWatch
  {
    private $fighters;

    function __construct()
    {
      $this->fighters = array();
    }

    function recruit($who)
    {
      if (array_key_exists('IFighter', class_implements($who)))
        $this->fighters[] = $who;
    }

    function fight()
    {
      foreach ($this->fighters as $value)
        $value->fight();
    }
  }


?>
