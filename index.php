<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IntegraHR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2>Lista de Empleados</h2>
        <a class="btn btn-primary" href="/crud-integrahr/create.php" role="button">Nuevo Empleado</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido Materno</th>
                    <th>Dirección</th>
                    <th>Lugar de Nacimiento</th>
                    <th>Correo</th>
                    <th>Sucursal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "integrahr";

                $connection = new mysqli($servername, $username, $password, $database);
                if ($connection->connect_error) {
                    die("Error de conexión: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM clientes";
                $result = $connection->query($sql);
                if (!$result) {
                    die("Consulta inválida: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>{$row['Nombre']}</td>
                    <td>{$row['ApellidoPaterno']}</td>
                    <td>{$row['ApellidoMaterno']}</td>
                    <td>{$row['Direccion']}</td>
                    <td>{$row['LugarNacimiento']}</td>
                    <td>{$row['Correo']}</td>
                    <td>{$row['Sucursal']}</td>
                    <td>
                    <a href='/crud-integrahr/edit.php?id={$row['id']}' class='btn btn-primary btn-sm'>Editar</a>
                    <a href='/crud-integrahr/delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a>
                    </td>
                   </tr>";
                }
                $connection->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
