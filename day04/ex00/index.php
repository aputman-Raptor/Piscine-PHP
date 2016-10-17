<?php
  if (!session_start())
  {
    echo "Fail starting session\n";
    exit(0);
  }
  if ($_GET["submit"] === "OK")
  {
    $_SESSION["login"] = $_GET["login"];
    $_SESSION["passwd"] = $_GET["passwd"];
  }
?>
<html>
  <head>
  </head>
  <body>
    <form method="get" action="index.php">
      <input name="login" value="<?php echo $_SESSION["login"]; ?>"/>
      <input name="passwd" value="<?php echo $_SESSION["passwd"]; ?>"/>
      <input type="submit" name="submit" value="OK"/>
    </form>
  </body>
</html>
