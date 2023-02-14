<?php
    require_once 'conexion.php';

    if(isset($_POST['btnIngresar'])){
        $tsql = "SELECT * FROM dbo.Login WHERE usuario = ? AND contraseña = ?";
        $params = array($_POST['usuario'], $_POST['contraseña']);

        $stmt = sqlsrv_query($conn, $tsql, $params);

        if ($stmt === false) {
            echo "Error en la consulta.<br>";
            die(print_r(sqlsrv_errors(), true));
        }

     if (sqlsrv_has_rows($stmt)) {
            header("Location: pagina_destino.html");
            exit;
        }
    } else {
        echo "Usuario o contraseña incorrectos.<br>";
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
?>