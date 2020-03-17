<?php

  define("PRIVATE_PATH", dirname(__FILE__));  //current path to this file
  define("PROJECT_PATH", dirname(PRIVATE_PATH));  //path one directory up
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');

  require_once('functions.php');

 ?>
