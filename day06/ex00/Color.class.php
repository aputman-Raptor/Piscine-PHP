<?php

  class Color
  {
    public $red = 0;
    public $green = 0;
    public $blue = 0;
    public static $verbose = false;

    public function __construct(array $args)
    {
      if (!$args || !is_array($args))
      {
        return;
      }
      if (isset($args['rgb']))
      {
        $this->red = intval($args['rgb']) >> 16 & 255;
        $this->green = intval($args['rgb'] >> 8 & 255);
        $this->blue = intval($args['rgb'] & 255);
      }
      else
      {
        if (isset($args['red']))
          $this->red = intval($args['red'], 10);
        if (isset($args['green']))
          $this->green = intval($args['green'], 10);
        if (isset($args['blue']))
          $this->blue = intval($args['blue'], 10);
      }
      if (self::$verbose === true)
        print( $this . " constructed." . PHP_EOL);
      return;
    }

    public function __destruct()
    {
      if (self::$verbose === true)
        print( $this . " destructed." . PHP_EOL);
      return;
    }

    public function __toString()
    {
      return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
    }

    public static function doc()
    {
      print(file_get_contents("Color.doc.txt"));
    }

    public function add($param)
    {
      return (new Color(array('red' => intval($this->red + $param->red), 'green' => intval($this->green + $param->green), 'blue' => intval($this->blue + $param->blue))));
    }

    public function sub($param)
    {
      return (new Color(array('red' => intval($this->red - $param->red), 'green' => intval($this->green - $param->green), 'blue' => intval($this->blue - $param->blue))));
    }

    public function mult($factor)
    {
      return (new Color(array('red' => intval($this->red  * $factor), 'green' => intval($this->green * $factor), 'blue' => intval($this->blue * $factor))));
    }
  }
?>
