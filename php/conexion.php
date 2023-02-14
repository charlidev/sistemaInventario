<?php
$serverName = "DESKTOP-GBQUMCE";
$connectionInfo = array("Database"=>"Sistema_Inventario", "UID"=>"sa", "PWD"=>"12345");

$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn) {
  echo "Conexión establecida.<br>";
} else {
  echo "Conexión no se pudo establecer.<br>";
  die(print_r(sqlsrv_errors(), true));
}
?>
