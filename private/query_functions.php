<?php

  function query_db($table, $orderBy, $ord = 'ASC', $filter = 'NONE', $filterValue = '') {
    global $db;
    $sql = "SELECT * FROM " . $table . " ";
    if ($filter != 'NONE') {
      $sql .= "WHERE " . $filter . " = " . $filterValue . " ";
    };
    $sql .= "ORDER BY " . $orderBy . " " . $ord . " ";
    $data = mysqli_query($db, $sql);
    dbConfirmDataReturned($data);
    return $data;
  }

  function updateValue($table, $id, $col, $value) {
    global $db;
    $sql = "UPDATE ";
  }

 ?>
