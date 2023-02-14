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

    $tsql = "SELECT Usuario, Contraseña FROM Login WHERE usuario = ? AND contraseña = ?";
    $params = array($_POST['usuario'], $_POST['contraseña']);

    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
    echo "Error en la consulta.<br>";
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($stmt)) {
        header("Location: inicio.html");
        exit;
    } else {
        echo "Usuario o contraseña incorrectos.<br>";
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
?>

