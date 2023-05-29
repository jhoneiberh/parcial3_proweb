<?php require('../db_conexion/conexion.php') ?>
<?php
$carrera_id = $_GET['id'];
$carrera_id = (int) $carrera_id;

mysqli_select_db($conexion, $dbname);

echo "Id de la carrera $carrera_id";

/* if(isset($_POST['submit']))
{
    $consulta_delete = "DELETE FROM programa WHERE (id) = ('$carrera_id')";
    echo "<script> let respuesta = confirm('¿Deseas continuar?')
    if (respuesta === true)
    {
        alert('Has seleccionado Sí.');
    }
    else
    {
        alert('Has seleccionado No.');
    }</script>";
} */
if(isset($_POST['submit']))
{
    $delete_programa = "DELETE FROM programa WHERE (id) = ('$carrera_id')";
    $realizar_delete = mysqli_query($conexion, $delete_programa);
    // $realizar_delete = $conexion->query($delete_programa);
    header('location:consulta_carreras.php');
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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Eliminar Carrera</title>
</head>
<body>
    <main>
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
                <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Elimina Carrera</button>
            </div>
        </form>
    </main>
</body>
</html>