<?php require('../db_conexion/conexion.php') ?>


<?php
// Seleccionar la base de datos
mysqli_select_db($conexion, $dbname);


$consulta_join = 'SELECT estudiantes.*, programa.nombre AS nombre_programa FROM estudiantes
INNER JOIN programa ON estudiantes.grado_id = programa.id ORDER BY id';

$resultado_join = $conexion->query($consulta_join);

// hacer la consulta
$consulta_estudiantes = 'SELECT * FROM estudiantes';

// recibir la respuesta
$respuesta_consulta_estudiante = mysqli_query($conexion, $consulta_estudiantes);

function listar_estudiantes($respuesta_consulta_estudiante) {
    while ($datos = mysqli_fetch_assoc($respuesta_consulta_estudiante)) 
        {
            ?>
            <tr>
                <td class="py-2 px-4 border-b"><?php echo $datos['id']; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $datos['apellidos']; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $datos['nombres']; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $datos['genero']; ?></td>
                <td  class="py-2 px-4 border-b"><?php echo $datos['grado_id']; ?></td>
                <td class="py-2 px-4 border-b">A-101</td>
                <td class="py-2 px-4 border-b">
                    <a href="<?php echo $datos['id'] ?>" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                </td>
                <td class="py-2 px-4 border-b">
                    <a href="<?php echo $datos['id'] ?>" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">Eliminar</a>
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
    <title>Listado Estudiantes</title>
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
                        <li><a href="./admin_estudiantes.php" class="text-gray-300 hover:bg-gray-700 px-4 py-2">Administrar Estudiantes</a></li>
                    </ul>
                </div>
            </nav>
        </section>
    </header>
    <main>
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Tabla de Usuarios</h1>

            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold border-b">Código</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold border-b">Apellido</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold border-b">Nombre</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold border-b">Género</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold border-b">Programa</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold border-b">Aula</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold border-b">Editar</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold border-b">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php    
                // listar_estudiantes($respuesta_consulta_estudiante);
                
                if ($resultado_join->num_rows > 0) 
                {
                    while ($datos = $resultado_join->fetch_assoc())
                    {?>
                        <tr class="text-center">
                            <td class="py-2 px-4 border-b"><?php echo $datos["id"];?></td>
                            <td class="py-2 px-4 border-b"><?php echo $datos["apellidos"];?></td>
                            <td class="py-2 px-4 border-b"><?php echo $datos["nombres"];?></td>
                            <td class="py-2 px-4 border-b"><?php echo $datos["genero"];?></td>
                            <td class="py-2 px-4 border-b"><?php echo $datos["nombre_programa"];?></td>
                            <td class="py-2 px-4 border-b">Hola</td>
                            <td class="py-2 px-4 border-b"><a href="./editar_estudiante.php?id=<?php echo $datos['id']?>" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a></td>
                            <td class="py-2 px-4 border-b"><a href="./eliminar_estudiante.php?id=<?php echo $datos['id']?>" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">Eliminar</a></td>
                        </tr>
                        <?php
                    }
                    
                }
                ?>
                    <!-- <tr>
                        <td class="py-2 px-4 border-b">123</td>
                        <td class="py-2 px-4 border-b">Pérez</td>
                        <td class="py-2 px-4 border-b">Juan</td>
                        <td class="py-2 px-4 border-b">Masculino</td>
                        <td class="py-2 px-4 border-b mx-auto">Ingeniería</td>
                        <td class="py-2 px-4 border-b">A-101</td>
                        <td class="py-2 px-4 border-b">
                            <a href="" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">Eliminar</a>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>