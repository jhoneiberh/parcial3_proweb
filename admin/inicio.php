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






// function consulta_programa_estudiante()
// {
//     global $conexion, $dbname, $estudiante_id;
//     mysqli_select_db($conexion, $dbname);
    
//     // hacer la consulta
//     $consulta_programa = "SELECT estudiantes.*, programa.nombre AS nombre_programa FROM estudiantes
//     INNER JOIN programa ON estudiantes.grado_id = programa.id WHERE estudiantes.id = ('$estudiante_id')  ORDER BY id";

//     // recibir la respuesta
//     $respuesta_consulta_programa = mysqli_query($conexion, $consulta_programa);

//     return $respuesta_consulta_programa;
// }

// $programa_por_estudiante = consulta_programa_estudiante();


// hacer la consulta
// $consulta_por_estudiante = "SELECT * FROM estudiantes WHERE (nombres) = ('$nombres')";

// // recibir la respuesta
// $respuesta_consulta_por_estudiante = mysqli_query($conexion, $consulta_por_estudiante);

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
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/admin/inicio.css">
    <title>Inicio</title>
</head>
<body>
    <header>
        <div class="container-title">
            <h1>Consulta de Estudiantes Santiago de Cali</h1>
            <p>Usuario: <span>admin</span></p>
        </div>
        <section>
            <nav>
                <div>
                    <ul>
                        <li><a href="./inicio.php">Inicio</a></li>
                        <li><a href="./registro_estudiante.php">Registro de Estudiantes</a></li>
                        <li><a href="./listado_estudiantes.php">Listado de Estudiantes</a></li>
                        <li><a href="../carrera/consulta_carreras.php">Consulta de Carreras</a></li>
                        <li><a href="./admin_estudiantes.php">Administrar Estudiantes</a></li>
                    </ul>
                </div>
            </nav>
        </section>
    </header>
    <main>
        <h2>Base Datos 'Santiago de Cali'</h2>
        <table border="1">
            <?php

                while ($datos = mysqli_fetch_assoc($resultado_usuario)) 
                {
                    $nombres = $datos['nombre'];
                 

                // while ($datos = mysqli_fetch_assoc($programa_por_estudiante)) 
                // {
                    ?>
                        
                        <p class="estudiante">Usuario</p>
                        <p class="nombre_estudiante"> 
                            <?php echo $datos['nombre']; ?> -
                        
                        
                            <?php echo $datos['username']; ?> -
                            <!-- <span class="nombre_programa"> -->
                            <?php echo $datos['rol']; ?>
                        </span>
                        </p>
                    
            
                    <?php 
                    }  
                // } 
            ?>
        </table>
    </main>
</body>

</html>