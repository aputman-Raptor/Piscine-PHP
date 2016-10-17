<?php

  class Tyrion extends Lannister
  {
    function sleepWith($who)
    {
      if (get_class($who) === "Sansa")
        print("Let's do this." . PHP_EOL);
      else
        print("Not even if I'm drunk" . PHP_EOL);
    }
  }

?>
