<?php
include_once "funciones/funciones.php";
$con = conexion();
$con->set_charset("utf8mb4");


$sql_autos = "SELECT * FROM autos WHERE 1";
$result = $con->query($sql_autos);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTOS PAMPA</title>
    <?php head() ?>
</head>

<body>
    <table class="table table-bordered table-sm table-hover">
        <thead class="thead-dark">
            <a href="php/unidades/nueva_unidad.php">NUEVA UNIDAD</a>
            <tr>
                <th>id</th>
                <th>Movil</th>
                <th>Modelo</th>
                <th>Patente</th>
                <th>Vto patente</th>
                <th>Titulo</th>
                <th>VTV Vto</th>
                <th>VTE Fecha Renueva</th>
                <th>Seguro Vto</th>
                <th>licencia taxi vto</th>
                <th>Gas Vto</th>
                <th>Hab Vto</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <tbody>
                <td><?php echo $id = $row['id'] ?></td>
                <td><?php echo $row['numero'] ?></td>
                <td><?php echo $row['modelo'] ?></td>
                <td><?php echo $row['dominio'] ?></td>
                <td><?php echo $row['dominio_fecha'] ?></td>
                <td><?php echo $row['titulo_f'] ?></td>
                <td><?php echo $row['vtv_vto'] ?></td>
                <td><?php echo $row['vtv_renueva'] ?></td>
                <td><?php echo $row['seguro_vto'] ?></td>
                <td><?php echo $row['licencia_vto'] ?></td>
                <td><?php echo $row['gas_vto'] ?></td>
                <td><?php echo $row['hab_vto'] ?></td>

                <td><a href="php\unidades\edit_unidad.php?q=<?php echo urlencode($id) ?>">EDITAR</a></td>
                <td><a href="php\unidades\borrar_unidad.php?q=<?php echo urlencode($id) ?>">BORRAR</a></td>
            </tbody>
        <?php
        }
        ?>
        <?php foot() ?>
</body>

</html>