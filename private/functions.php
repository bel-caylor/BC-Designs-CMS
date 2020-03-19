<?php

function urlFor($path) {
  // Add '/' if it doesn't exist.
  if($path[0] != '/') {
    $path = "/" . $path;
  }
  return WWW_ROOT . $path;
};

 ?>
