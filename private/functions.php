<?php

function urlFor($path) {
  // Add '/' if it doesn't exist.
  if($path[0] != '/') {
    $path = "/" . $path;
  }
  return WWW_ROOT . $path;
};

function get_article($path) {
  if (file_exists($path) == 1) {
    return file_get_contents($path);
  }
}

 ?>
