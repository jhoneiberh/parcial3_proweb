<?php require('../db_conexion/conexion.php') ?>


<?php
// Seleccionar la base de datos
function consulta_programa()
{
    global $conexion, $dbname;
    mysqli_select_db($conexion, $dbname);


    $consulta_programa = 'SELECT * FROM programa ORDER BY id';
    
    $resultado_programa = $conexion->query($consulta_programa);
    return $resultado_programa;
}

$resultado_programa = consulta_programa();





function listar_carreras($resultado_programa) {
    while ($datos = mysqli_fetch_assoc($resultado_programa)) 
        {
            ?>
            <tr>
                <td class="py-2 px-4 border-b"><?php echo $datos['id']; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $datos['nombre']; ?></td>
                <td class="py-2 px-4 border-b"><?php echo $datos['ciclo']; ?></td>
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
    <title>Consulta Carreras</title>
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
                        <li><a href="../admin/inicio.php" class="text-gray-800 bg-yellow-400 px-4 py-2 font-medium">Inicio</a></li>
                        <li><a href="../admin/registro_estudiante.php" class="text-gray-300 hover:bg-gray-700 px-4 py-2">Registro de Estudiantes</a></li>
                        <li><a href="../admin/listado_estudiantes.php" class="text-gray-300 hover:bg-gray-700 px-4 py-2">Listado de Estudiantes</a></li>
                        <li><a href="./consulta_carreras.php" class="text-gray-300 hover:bg-gray-700 px-4 py-2">Consulta de Carreras</a></li>
                        <li><a href="../admin/admin_estudiantes.php" class="text-gray-300 hover:bg-gray-700 px-4 py-2">Administrar Estudiantes</a></li>
                    </ul>
                </div>
            </nav>
        </section>
    </header>
    <main>
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Tabla de Carreras</h1>

            <table class="w-full border-collapse">
                <thead>
                    <tr class="grid grid-cols-5">
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold border-b">Código</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold border-b">Nombre</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold border-b">Ciclo</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold border-b">Editar</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold border-b">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php    
                // listar_estudiantes($respuesta_consulta_estudiante);
                
                if ($resultado_programa->num_rows > 0) 
                {
                    while ($datos = $resultado_programa->fetch_assoc())
                    {?>
                        <tr class="grid grid-cols-5 text-center">
                            <td class="py-2 px-4 border-b"><?php echo $datos["id"];?></td>
                            <td class="py-2 px-4 border-b"><?php echo $datos["nombre"];?></td>
                            <td class="py-2 px-4 border-b"><?php echo $datos["ciclo"];?></td>
                            <td class="py-2 px-4 border-b"><a href="./editar_carrera.php?id=<?php echo $datos['id']?>" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a></td>
                            <td class="py-2 px-4 border-b"><a href="./eliminar_carrera.php?id=<?php echo $datos['id']?>" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">Eliminar</a></td>
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