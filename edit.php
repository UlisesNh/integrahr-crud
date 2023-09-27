<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "integrahr";

$connection = new mysqli($servername, $username, $password, $database);


if ($connection->connect_error) {
    die("Error de conexión a la base de datos: " . $connection->connect_error);
}


$id_empleado = "";
$nombre = "";
$apellido_paterno = "";
$apellido_materno = "";
$direccion = "";
$lugar_nacimiento = "";
$correo = "";
$sucursal = "";


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_empleado = $_GET['id'];

  
    $sql = "SELECT * FROM clientes WHERE id = $id_empleado";
    $result = $connection->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombre = $row['Nombre'];
        $apellido_paterno = $row['ApellidoPaterno'];
        $apellido_materno = $row['ApellidoMaterno'];
        $direccion = $row['Direccion'];
        $lugar_nacimiento = $row['LugarNacimiento'];
        $correo = $row['Correo'];
        $sucursal = $row['Sucursal'];
    } else {
        echo "Empleado no encontrado.";
        exit;
    }
} else {
    echo "ID de empleado no válido o no especificado.";
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST["nombre"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $direccion = $_POST["direccion"];
    $lugar_nacimiento = $_POST["lugar_nacimiento"];
    $correo = $_POST["correo"];
    $sucursal = $_POST["sucursal"];

   
    $sql = "UPDATE clientes SET Nombre='$nombre', ApellidoPaterno='$apellido_paterno', ApellidoMaterno='$apellido_materno',
            Direccion='$direccion', LugarNacimiento='$lugar_nacimiento', Correo='$correo', Sucursal='$sucursal'
            WHERE id = $id_empleado";

    if ($connection->query($sql) === TRUE) {
        echo "Empleado actualizado con éxito.";
    } else {
        echo "Error al actualizar el empleado: " . $connection->error;
    }
}


$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>Editar Empleado</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id_empleado; ?>">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" name="apellido_paterno" value="<?php echo $apellido_paterno; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" name="apellido_materno" value="<?php echo $apellido_materno; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?php echo $direccion; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Lugar de Nacimiento</label>
                <input type="text" class="form-control" name="lugar_nacimiento" value="<?php echo $lugar_nacimiento; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Correo</label>
                <input type="text" class="form-control" name="correo" value="<?php echo $correo; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Sucursal</label>
                <input type="text" class="form-control" name="sucursal" value="<?php echo $sucursal; ?>">
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
                <div class="col-sm-3">
                    <a class="btn btn-secondary" href="/crud-integrahr/index.php">Volver</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
