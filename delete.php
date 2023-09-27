<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "integrahr";

    $connection = new mysqli($servername, $username, $password, $database);

   
    if ($connection->connect_error) {
        die("Error de conexión a la base de datos: " . $connection->connect_error);
    }

  
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id_empleado = $_GET['id'];


        $sql = "DELETE FROM clientes WHERE id = $id_empleado";

        if ($connection->query($sql) === TRUE) {
            echo "Empleado eliminado con éxito.";
        } else {
            echo "Error al eliminar el empleado: " . $connection->error;
        }
    } else {
        echo "ID de empleado no válido o no especificado.";
    }

    $connection->close();
?>
