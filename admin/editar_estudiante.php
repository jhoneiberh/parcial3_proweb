<?php require('../db_conexion/conexion.php') ?>
<?php
$estudiante_id = (int) $_GET['id'];

mysqli_select_db($conexion, $dbname);
echo "Id del estudiante $estudiante_id";

// error_reporting(0);

if(isset($_POST['submit']))
{
    
    if($_POST['nombres'] and $_POST['apellidos'])
    {
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];   
        $update_estudiante = "UPDATE estudiantes SET nombres = ('$nombres'), apellidos = ('$apellidos') WHERE id = ('$estudiante_id')";
        $realizar_update = mysqli_query($conexion, $update_estudiante);
        header('location:listado_estudiantes.php');
    }
}

function consulta_estudiante()
{
    global $conexion, $dbname;
    global $estudiante_id;
    mysqli_select_db($conexion, $dbname);

    $consulta_estudiante = "SELECT * FROM estudiantes WHERE (id) = ('$estudiante_id')";
    
    $resultado_estudiante = $conexion->query($consulta_estudiante);
    return $resultado_estudiante;
}

$resultado_estudiante = consulta_estudiante();

function show_estudiante($resultado_estudiante)
{
    while ($datos = mysqli_fetch_assoc($resultado_estudiante))
    {
        ?>        
        <div class="mb-4">
            <label for="nombres" class="mb-3 block text-gray-700">Nombres</label>
            <input type="text" id="nombres" name="nombres" value="<?php echo $datos['nombres']; ?>" class="form-input mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full border border-gray-300 p-3 rounded-md">
        </div>
        <div class="mb-4">
            <label for="apellidos" class="mb-3 block text-gray-700">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $datos['apellidos']; ?>" class="form-input mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full border border-gray-300 p-3 rounded-md">
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
    <script src="https://cdn.tailwindcss.com"></script>
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
        <?php show_estudiante($resultado_estudiante)?>
        <div class="text-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" name="submit">Guardar cambios</button>
        </div>
    </form>

</body>

</html>