<?php
include_once "../../funciones/funciones.php";
$con = conexion();
$con->set_charset("utf8mb4");
echo $id = $_GET['q'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELIMINAR UNIDAD</title>
    <script>
        alert("Va a eliminar una unidad")
        //window.location = "insert_products.php";
    </script>
</head>

<body>
    <h1>ELIMINAR</h1>
</body>

</html>