<?php
  function auth($login, $passwd)
  {
    $accounts = unserialize(file_get_contents("../private/passwd"));
    foreach ($accounts as $key => $value)
    {
      if ($value["login"] === $login)
      {
        if ($value["passwd"] === hash("whirlpool", $passwd))
          return TRUE;
      }
    }
    return FALSE;
  }
?>
