<?php require('../db_conexion/conexion.php') ?>
<?php
$carrera_id = (int) $_GET['id'];

mysqli_select_db($conexion, $dbname);
echo "Id de la carrera $carrera_id";

// error_reporting(0);

if(isset($_POST['submit']))
{
    
    if($_POST['nombre'] and $_POST['ciclo'])
    {
        $nombre = $_POST['nombre'];
        $ciclo = $_POST['ciclo'];   
        $update_carrera = "UPDATE programa SET nombre = ('$nombre'), ciclo = ('$ciclo') WHERE id = ('$carrera_id')";
        $realizar_update = mysqli_query($conexion, $update_carrera);
        header('location:consulta_carreras.php');
    }
}

function consulta_programa()
{
    global $conexion, $dbname;
    global $carrera_id;
    mysqli_select_db($conexion, $dbname);

    $consulta_programa = "SELECT * FROM programa WHERE (id) = ('$carrera_id')";
    
    $resultado_programa = $conexion->query($consulta_programa);
    return $resultado_programa;
}

$resultado_programa = consulta_programa();

function show_programa($resultado_programa)
{
    while ($datos = mysqli_fetch_assoc($resultado_programa))
    {
        ?>        
        <div class="mb-4">
            <label for="nombre" class="mb-3 block text-gray-700">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $datos['nombre']; ?>" class="form-input mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full border border-gray-300 p-3 rounded-md">
        </div>
        <div class="mb-4">
            <label for="ciclo" class="mb-3 block text-gray-700">Ciclo</label>
            <input type="text" id="ciclo" name="ciclo" value="<?php echo $datos['ciclo']; ?>" class="form-input mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full border border-gray-300 p-3 rounded-md">
        </div>
        <?php
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="../css/output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST" class="max-w-md mx-auto">
        <!-- <div class="mb-4">
            <label for="nombre" class="mb-3 block text-gray-700">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="Nombre del estudiante" class="form-input mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full border border-gray-300 p-3 rounded-md">
        </div>
        <div class="mb-4">
            <label for="ciclo" class="mb-3 block text-gray-700">Ciclo</label>
            <input type="text" id="ciclo" name="ciclo" value="Ciclo de la carrera" class="form-input mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full border border-gray-300 p-3 rounded-md">
        </div> -->
        <?php show_programa($resultado_programa)?>
        <div class="text-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" name="submit">Guardar cambios</button>
        </div>
    </form>

</body>

</html>