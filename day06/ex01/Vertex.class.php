<?php

  require_once("Color.class.php");

  class Vertex
  {
    private $_x;
    private $_y;
    private $_z;
    private $_w = 1.0;
    private $_color;
    public static $verbose = false;

    public function getVar($var)
    {
      if ($var === "_x" || $var === "_y" || $var === "_z" || $var === "_w" || $var === "_color")
        return $this->$var;
      else
        print("This variable does not exist\n");
      return;
    }

    public function setVar($var, $value)
    {
      if ($var === "_x" || $var === "_y" || $var === "_z" || $var === "_w" || $var === "_color")
        $this->$var = $value;
      else
        print("This variable does not exist\n");
      return;
    }

    public function __construct(array $args)
    {
      if (isset($args['x']) && isset($args['y']) && isset($args['z']))
      {
        $this->_x = $args['x'];
        $this->_y = $args['y'];
        $this->_z = $args['z'];
        if (isset($args['w']))
          $this->_w = $args['w'];
        if (isset($args['color']))
          $this->_color = $args['color'];
        else
          $this->_color = new Color(array('rgb' => 0xFFFFFF));
        if (self::$verbose === true)
          print($this . " constructed." . PHP_EOL);
      }
    }

    public function __destruct()
    {
      if (self::$verbose === true)
        print($this . " destructed." . PHP_EOL);
      return;
    }

    public function __toString()
    {
      if (self::$verbose === true)
        return "Vertex( x: " . number_format($this->_x, 2) . ", y: " . number_format($this->_y, 2) . ", z:" . number_format($this->_z, 2) . ", w:" . number_format($this->_w, 2) . ", " . $this->_color . " )";
      else
        return "Vertex( x: " . number_format($this->_x, 2) . ", y: " . number_format($this->_y, 2) . ", z:" . number_format($this->_z, 2) . ", w:" . number_format($this->_w, 2) . " )";
    }

    public static function doc()
    {
      print(file_get_contents("Vertex.doc.txt"));
    }

  }
?>
