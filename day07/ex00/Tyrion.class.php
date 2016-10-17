<?php

  class Tyrion extends Lannister
  {

    function __construct()
    {
      parent::__construct();
      print("My name is Tyrion" . PHP_EOL);
      return;
    }

    function __destruct()
    {
      return;
    }

    function getSize()
    {
      return ("Short");
    }
  }

?>
