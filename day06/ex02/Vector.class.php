<?php

  require_once("Vertex.class.php");

  class Vector
  {
    private $_x;
    private $_y;
    private $_z;
    private $_w = 0.0;
    public static $verbose = false;

    public function getVar($var)
    {
      if ($var === "_x" || $var === "_y" || $var === "_z" || $var === "_w")
        return ($this->$var);
      else
        print("This attribute does not exist" . PHP_EOL);
      return;
    }

    public function __construct(array $args)
    {
      if (isset($args['dest']))
      {
        if (!isset($args['orig']))
          $args['orig'] = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
        $this->_x = ($args['dest']->getVar("_x") / $args['dest']->getVar("_w")) - ($args['orig']->getVar("_x") / $args['orig']->getVar("_w"));
        $this->_y = ($args['dest']->getVar("_y") / $args['dest']->getVar("_w")) - ($args['orig']->getVar("_y") / $args['orig']->getVar("_w"));
        $this->_z = ($args['dest']->getVar("_z") / $args['dest']->getVar("_w")) - ($args['orig']->getVar("_z") / $args['orig']->getVar("_w"));
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
      return "Vector( x:" . number_format($this->_x, 2) . ", y:" . number_format($this->_y, 2) . ", z:" . number_format($this->_z, 2) . ", w:" . number_format($this->_w, 2) . " )";
    }

    public static function doc()
    {
      print(file_get_contents("Vector.doc.txt"));
    }

    public function magnitude()
    {
      return (sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
    }

    public function normalize()
    {
      if (($this->_x <= 1 && $this->_x >= -1) && ($this->_y <= 1 && $this->_y >= -1) && ($this->_z <= 1 && $this->_z >= -1))
        return (new Vector(array('dest' => new Vertex(array('x' => $this->_x, 'y' => $this->_y, 'z' => $this->_z)))));
      else
        return (new Vector(array('dest' => new Vertex(array('x' => ($this->_x / $this->magnitude()), 'y' => ($this->_y / $this->magnitude()), 'z' => ($this->_z / $this->magnitude()))))));
    }

    public function add($vector)
    {
      return (new Vector(array('dest' => new Vertex(array('x' => ($this->_x + $vector->getVar("_x")), 'y' => ($this->_y + $vector->getVar("_y")), 'z' => ($this->_z + $vector->getVar("_z")))))));
    }

    public function sub($vector)
    {
      return (new Vector(array('dest' => new Vertex(array('x' => ($this->_x - $vector->getVar("_x")), 'y' => ($this->_y - $vector->getVar("_y")), 'z' => ($this->_z - $vector->getVar("_z")))))));
    }

    public function opposite()
    {
      return (new Vector(array('dest' => new Vertex(array('x' => (-$this->_x), 'y' => (-$this->_y), 'z' => (-$this->_z))))));
    }

    public function scalarProduct($scalar)
    {
      return (new Vector(array('dest' => new Vertex(array('x' => ($scalar * $this->_x), 'y' => ($scalar * $this->_y), 'z' => ($scalar * $this->_z))))));
    }

    public function dotProduct($vector)
    {
      return (($this->_x * $vector->getVar("_x") + ($this->_y * $vector->getVar("_y") + ($this->_z * $vector->getVar("_z")))));
    }

    public function cos($vector)
    {
      return ($this->dotProduct($vector) / ($this->magnitude() * $vector->magnitude()));
    }

    public function crossProduct($vector)
    {
      return (new Vector(array('dest' => new Vertex(array( 'x' => (($this->_y * $vector->getVar("_z")) - ($vector->getVar("_y") * $this->_z)), 'y' => (($this->_x * $vector->getVar("_z")) - ($vector->getVar("_x") * $this->_z)), 'z' => (($this->_x * $vector->getVar("_y")) - ($vector->getVar("_x") * $this->_y)))))));
    }

  }
?>
