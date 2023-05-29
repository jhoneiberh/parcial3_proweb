<?php require('../db_conexion/conexion.php') ?>


<?php

// Seleccionar la base de datos
mysqli_select_db($conexion, $dbname);



if (isset($_GET['id'])) 
{
    $estudiante_id = $_GET['id'];
}
// echo $estudiante_id;
$consulta_usuario = "SELECT * FROM users WHERE id = $estudiante_id";
$resultado_usuario = mysqli_query($conexion, $consulta_usuario);

while ($datos = mysqli_fetch_assoc($resultado_usuario)) 
{
    $nombres = $datos['nombre'];
}


function consulta_programa_estudiante()
{
    global $conexion, $dbname, $estudiante_id;
    mysqli_select_db($conexion, $dbname);
    
    // hacer la consulta
    $consulta_programa = "SELECT estudiantes.*, programa.nombre AS nombre_programa FROM estudiantes
    INNER JOIN programa ON estudiantes.grado_id = programa.id WHERE estudiantes.id = ('$estudiante_id')  ORDER BY id";

    // recibir la respuesta
    $respuesta_consulta_programa = mysqli_query($conexion, $consulta_programa);

    return $respuesta_consulta_programa;
}

$programa_por_estudiante = consulta_programa_estudiante();


// hacer la consulta
$consulta_por_estudiante = "SELECT * FROM estudiantes WHERE (nombres) = ('$nombres')";

// recibir la respuesta
$respuesta_consulta_por_estudiante = mysqli_query($conexion, $consulta_por_estudiante);

// $consulta_programa_estudiante = 'SELECT nombre FROM estudiantes
//                                         JOIN programa
//             ON programa.id = estudiantes.grado_id';
// $respuesta_consulta_por_programa = mysqli_query($conexion, $consulta_programa_estudiante);

// crear un arreglo con los datos

function listar_estudiantes($programa_por_estudiante) {
    global $programa_por_estudiante;
    while ($datos = mysqli_fetch_assoc($programa_por_estudiante)) 
        {
            ?>
            <tr>
                <td>
                    <?php echo $datos['nombres']; ?>
                </td>
                <td>
                    <?php echo $datos['apellidos']; ?>
                </td>
                <td>
                    <?php echo $datos['grado_id']; ?>  
                </td>
            </tr>

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
    <title>Inicio</title>
</head>

<body>
    <header class="mb-16">
        <div class="title-container h-24 bg-blue-500 flex flex-col justify-center items-center">
            <h1 class="text-4xl text-white">Consulta de Estudiantes Santiago de Cali</h1>
            <p class="self-start px-10 text-white">Usuario: <span>admin</span></p>
        </div>
        <section>
            <nav class="bg-black">
                <div class="container mx-auto px-4 py-2">
                    <ul class="flex justify-between items-center">
                        <li><a href="./inicio.php" class="text-gray-800 bg-yellow-400 px-4 py-2 font-medium">Inicio</a></li>
                        <li><a href="./registro_estudiante.php" class="text-gray-300 hover:bg-gray-700 px-4 py-2">Registro de Estudiantes</a></li>
                        <li><a href="./listado_estudiantes.php" class="text-gray-300 hover:bg-gray-700 px-4 py-2">Listado de Estudiantes</a></li>
                        <li><a href="../carrera/consulta_carreras.php" class="text-gray-300 hover:bg-gray-700 px-4 py-2">Consulta de Carreras</a></li>
                        <li><a href="#" class="text-gray-300 hover:bg-gray-700 px-4 py-2">Administrar Estudiantes</a></li>
                    </ul>
                </div>
            </nav>
        </section>
    </header>
    <main>
        <h2 class="text-3xl font-medium border-b-2 pb-10 text-center">Base Datos 'Santiago de Cali'</h2>
        <table border="1">
            <?php
                while ($datos = mysqli_fetch_assoc($programa_por_estudiante)) 
                {
                    ?>
                        
                        <p class="text-center font-medium mb-5 pt-5">Estudiante</p>
                        <p class="text-center"> 
                            <?php echo $datos['nombres']; ?>
                        
                        
                            <?php echo $datos['apellidos']; ?>
                            <span class="text-center">
                            <?php echo $datos['nombre_programa']; ?>
                        </span>
                        </p>
                    
        
                    <?php 
                } 
            ?>
        </table>
    </main>
</body>

</html>