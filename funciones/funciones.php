<?php
/* Lista de funciones:
1_ conexion
2_ Lee archivo de texto. udasa para actualizar la semana en la caja
3_ foot pie de pagina
4_ head encabezado de pagina
5_ subrutina para subir al servidor archivos pdf titulo del auto
6_ subrutina para subir imagenes en jpg o jpeg al servidor
7_ subrutina para subir pdf al servidor licencia




*/
## 1    conexion a la base de datos
function conexion()
{
    $con = new mysqli("127.0.0.1", "root", "belgrado", "autos_pampa", 3306);
    if ($con->connect_errno) {
        echo "<br><br><br><br><br>";
        echo "Fallo al conectar a la DDBB: (" . $con->connect_errno . ") " . $con->connect_error;
    }
    return $con;
}

## 2    actualiza semana

function leerArchivoTXT($rutaArchivo)
{

    // Verificar si el archivo existe
    if (file_exists($rutaArchivo)) {
        // Leer el contenido del archivo
        $contenido = file_get_contents($rutaArchivo);
        return $contenido;
    } else {
        return "El archivo no existe.";
    }
}


## 3   pie de pagina
function foot()
{
?>
    <style>
        .footer {
            width: 100%;
            bottom: 0;
            height: 30px;
            position: fixed;
            background: #fff;
            box-shadow: 1px 1px 5px #000;
            text-align: center;
        }
    </style>

    <div class="footer">Ver 1.0</div>
<?php
}

##   4     encabezado de pagina
function head()
{
?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/ultima.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootbox.min.js"></script>

<?php
}



// 7     SUBRUTINA PARA SUBIT EL SEGURO EN PDF FRENTE.
function seguro()
{
    $uploadDir = '../../images/';

    // Verificar si la carpeta existe, si no, crearla
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Verificar si los archivos han sido subidos correctamente
    if (isset($_FILES['vtv_f'])) {
        $file1 = $_FILES['vtv_f'];


        // Validar que los archivos sean PDFs
        $allowedTypes = ['application/pdf'];

        if (in_array($file1['type'], $allowedTypes)) {
            // Mover los archivos a la carpeta de destino
            $file1Name = basename($file1['name']);

            echo "<br>";
            echo "Ruta de la VTV: " . $file1Path_seguro = $uploadDir . $file1Name;
            echo "<br>";

            if (move_uploaded_file($file1['tmp_name'], $file1Path_seguro)) {
                echo "Archivos subido con éxito.<br>";
                //echo "Archivo 1: <a href='$file1Path'>$file1Name</a><br>";
                // echo "Archivo 2: <a href='$file2Path'>$file2Name</a>";
            } else {
                echo "Hubo un error al subir los archivos.";
                echo "<br>";
            }
        } else {
            echo "Para la VTV solo se permiten archivos PDF.";
            echo "<br>";
        }
    } else {
        echo "Por favor, sube dos archivos PDF.";
        echo "<br>";
    }
}
//------------------------------------------------------------------------------------------------------------------------------------





// 7     SUBRUTINA PARA SUBIR LA VTV EN PDF FRENTE 
function vtv()
{
    $uploadDir = '../../images/';

    // Verificar si la carpeta existe, si no, crearla
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Verificar si los archivos han sido subidos correctamente
    if (isset($_FILES['seguro_f'])) {
        $file1 = $_FILES['seguro_f'];


        // Validar que los archivos sean PDFs
        $allowedTypes = ['application/pdf'];

        if (in_array($file1['type'], $allowedTypes)) {
            // Mover los archivos a la carpeta de destino
            $file1Name = basename($file1['name']);

            echo "<br>";
            echo "Ruta del seguro: " . $file1Path_vtv = $uploadDir . $file1Name;
            echo "<br>";

            if (move_uploaded_file($file1['tmp_name'], $file1Path_vtv)) {
                echo "Archivos subido con éxito.<br>";
                //echo "Archivo 1: <a href='$file1Path'>$file1Name</a><br>";
                // echo "Archivo 2: <a href='$file2Path'>$file2Name</a>";
            } else {
                echo "Hubo un error al subir los archivos.";
                echo "<br>";
            }
        } else {
            echo "Para el seguro solo se permiten archivos PDF.";
            echo "<br>";
        }
    } else {
        echo "Por favor, sube dos archivos PDF.";
        echo "<br>";
    }
}
//------------------------------------------------------------------------------------------------------------------------------------

##  FUNCION PARA SUBIR LA OBLEA DEL GAS EN PDF

function gas()
{
    $uploadDir = '../../images/';

    // Verificar si la carpeta existe, si no, crearla
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Verificar si los archivos han sido subidos correctamente
    if (isset($_FILES['gas_f']) && isset($_FILES['gas_d'])) {
        $file1 = $_FILES['gas_f'];
        $file2 = $_FILES['gas_d'];

        // Validar que los archivos sean PDFs
        $allowedTypes = ['application/pdf'];

        if (in_array($file1['type'], $allowedTypes) && in_array($file2['type'], $allowedTypes)) {
            // Mover los archivos a la carpeta de destino
            $file1Name = basename($file1['name']);
            $file2Name = basename($file2['name']);
            echo "<br>";
            echo "Ruta de la oblea del gas: " . $file1Path_gas = $uploadDir . $file1Name;
            echo "<br>";
            echo "Ruta de la oblea del gas dorso: " . $file2Path_gas = $uploadDir . $file2Name;
            echo "<br>";

            if (move_uploaded_file($file1['tmp_name'], $file1Path_gas) && move_uploaded_file($file2['tmp_name'], $file2Path_gas)) {
                echo "Ambos archivos fueron subidos con éxito.<br>";
                //echo "Archivo 1: <a href='$file1Path'>$file1Name</a><br>";
                // echo "Archivo 2: <a href='$file2Path'>$file2Name</a>";
            } else {
                echo "Hubo un error al subir los archivos.";
                echo "<br>";
            }
        } else {
            echo "<br>";
        }
    } else {
        echo "Por favor, sube dos archivos PDF.";
        echo "<br>";
    }
}
//------------------------------------------------------------------------------------------------------------------------------------


##  FUNCION PARA SUBIR LA HABILITACION DE REMIS EN PDF.

function hab_remis()
{
    $uploadDir = '../../images/';

    // Verificar si la carpeta existe, si no, crearla
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Verificar si los archivos han sido subidos correctamente
    if (isset($_FILES['hab_f']) && isset($_FILES['hab_d'])) {
        $file1 = $_FILES['hab_f'];
        $file2 = $_FILES['hab_d'];

        // Validar que los archivos sean PDFs
        $allowedTypes = ['application/pdf'];

        if (in_array($file1['type'], $allowedTypes) && in_array($file2['type'], $allowedTypes)) {
            // Mover los archivos a la carpeta de destino
            $file1Name = basename($file1['name']);
            $file2Name = basename($file2['name']);
            echo "<br>";
            echo "Ruta de la habilitacion de remis frente: " . $file1Path_hab = $uploadDir . $file1Name;
            echo "<br>";
            echo "Ruta de la habilitacion de remis dorso: " . $file2Path_hab = $uploadDir . $file2Name;
            echo "<br>";

            if (move_uploaded_file($file1['tmp_name'], $file1Path_hab) && move_uploaded_file($file2['tmp_name'], $file2Path_hab)) {
                echo "Ambos archivos fueron subidos con éxito.<br>";
                //echo "Archivo 1: <a href='$file1Path'>$file1Name</a><br>";
                // echo "Archivo 2: <a href='$file2Path'>$file2Name</a>";
            } else {
                echo "Hubo un error al subir los archivos.";
                echo "<br>";
            }
        } else {
            echo "<br>";
        }
    } else {
        echo "Por favor, sube dos archivos PDF.";
        echo "<br>";
    }
}
//------------------------------------------------------------------------------------------------------------------------------------
