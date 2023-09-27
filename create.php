<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IntegraHR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
         $nombre = "";
         $apellido_paterno = "";
         $apellido_materno = "";
         $direccion = "";
         $lugar_nacimiento = "";
         $correo = "";
         $sucursal = "";


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $apellido_paterno = $_POST["apellido_paterno"];
            $apellido_materno = $_POST["apellido_materno"];
            $direccion = $_POST["direccion"];
            $lugar_nacimiento = $_POST["lugar_nacimiento"];
            $correo = $_POST["correo"];
            $sucursal = $_POST["sucursal"];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "integrahr";
    
            $connection = new mysqli($servername, $username, $password, $database);
    
        
            if ($connection->connect_error) {
                die("Error de conexión a la base de datos: " . $connection->connect_error);
            }
    
            $sql = "INSERT INTO clientes (Nombre, ApellidoPaterno, ApellidoMaterno, Direccion, LugarNacimiento, Correo, Sucursal)
                    VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$direccion', '$lugar_nacimiento', '$correo', '$sucursal')";
    
            if ($connection->query($sql) === TRUE) {
                echo "Registro creado con éxito.";
            } else {
                echo "Error al crear el registro: " . $connection->error;
            }
    
            $connection->close();
        }
    ?>

    <div class="container my-5">
        <h2>Nuevo Empleado</h2>
        <form method="post">
            <div class="row mb-3">
                <div class="col-sm-3 col-form-label">Nombre</div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 col-form-label">Apellido Paterno</div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="apellido_paterno" value="<?php echo $apellido_paterno; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 col-form-label">Apellido Materno</div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="apellido_materno" value="<?php echo $apellido_materno; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 col-form-label">Dirección</div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="direccion" value="<?php echo $direccion; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 col-form-label">Lugar de Nacimiento</div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lugar_nacimiento" value="<?php echo $lugar_nacimiento; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 col-form-label">Correo</div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="correo" value="<?php echo $correo; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 col-form-label">Sucursal</div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="sucursal" value="<?php echo $sucursal; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-secondary" href="/crud-integrahr/index.php">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>


