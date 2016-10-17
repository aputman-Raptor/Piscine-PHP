<?php

  class Targaryen
  {
    function __construct()
    {
      return;
    }

    function __destruct()
    {
      return;
    }

    function getBurned()
    {
      if (!$this->resistsFire())
        return "burns alive";
      else
        return "emerges naked but unharmed";
    }

    function resistsFire()
    {
      return FALSE;
    }
  }

?>
