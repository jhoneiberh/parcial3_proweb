<?php require('../db_conexion/conexion.php') ?>
<?php
error_reporting(0);
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$genero = $_POST['genero'];
$grado_id = $_POST['grado_id'];
$seccion_id = $_POST['seccion_id'];

if(isset($_POST['submit']))
{
    if ($_POST['nombres'] and $_POST['apellidos'] and $_POST['genero'] and $_POST['grado_id'] and $_POST['seccion_id']) {
        // echo $nombres;
        // echo $apellidos;
        // echo $genero;
        // echo $grado_id;
        // echo $seccion_id;
        $insertar_estudiante = "INSERT INTO estudiantes (nombres, apellidos, genero, grado_id, seccion_id) VALUES ('$nombres', '$apellidos', '$genero', '$grado_id', '$seccion_id')";
        $realizar_insert_estudiante = mysqli_query($conexion, $insertar_estudiante);
    }
}



function consulta_programa()
{
    global $conexion, $dbname;
    mysqli_select_db($conexion, $dbname);
    
    // hacer la consulta
    $consulta_programa = 'SELECT * FROM programa';

    // recibir la respuesta
    $respuesta_consulta_programa = mysqli_query($conexion, $consulta_programa);

    return $respuesta_consulta_programa;
}


function consulta_seccion()
{
    global $conexion, $dbname;
    mysqli_select_db($conexion, $dbname);
        
    // hacer la consulta
    $consulta_secciones = 'SELECT * FROM secciones';

    // recibir la respuesta
    $respuesta_consulta_secciones = mysqli_query($conexion, $consulta_secciones);

    return $respuesta_consulta_secciones;
}

$respuesta_consulta_programa = consulta_programa();
function list_programa($respuesta_consulta_programa)
{
    while ($datos = mysqli_fetch_assoc($respuesta_consulta_programa))
    {
        ?>
            <option value="<?php echo $datos['id'] ?>"><?php echo $datos['nombre']?></option>
        <?php
    }
}
$respuesta_consulta_secciones = consulta_seccion();
function list_seccion($respuesta_consulta_secciones)
{
    while ($datos = mysqli_fetch_assoc($respuesta_consulta_secciones))
    {
        ?>
            <option value="<?php echo $datos['id'] ?>"><?php echo $datos['nombre']?></option>
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
    <title>Registro Estudiante</title>
</head>

<body>
    <header class="mb-16">
        <div class="container h-24 bg-blue-500 flex flex-col justify-center items-center">
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
                        <li><a href="./consulta_carreras.php" class="text-gray-300 hover:bg-gray-700 px-4 py-2">Consulta de Carreras</a></li>
                        <li><a href="./admin_estudiantes.php" class="text-gray-300 hover:bg-gray-700 px-4 py-2">Administrar Estudiantes</a></li>
                    </ul>
                </div>
            </nav>
        </section>
    </header>
    <main>
        <section class="w-full mb-10">
            <div class="container mx-auto px-4 ">
                <!-- max-w-md -->
                <form action="registro_estudiante.php" method="POST" class="mx-auto w-[700px] <!--max-w-md--> bg-white rounded-lg shadow-lg shadow-gray-200 border p-6">
                    <h1 class="text-2xl text-center font-bold mb-4">Registro de Estudiantes</h1>
                    <div class="mb-4">
                        <label for="nombres" class="block font-bold mb-2">Nombres:</label>
                        <input type="text" id="nombres" name="nombres" required class="w-full px-3 py-2 border border-gray-300 rounded">
                    </div>

                    <div class="mb-4">
                        <label for="apellidos" class="block font-bold mb-2">Apellidos:</label>
                        <input type="text" id="apellidos" name="apellidos" required class="w-full px-3 py-2 border border-gray-300 rounded">
                    </div>


                    <div class="mb-4">
                        <label for="genero" class="block font-bold mb-2">Sexo:</label>
                        <select id="genero" name="genero" required class="w-full px-3 py-2 border border-gray-300 rounded">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="mb-4">
                         <label for="programa" class="block font-bold mb-2">Programa:</label>
                        <!--<input type="text" id="programa" name="grado_id" required class="w-full px-3 py-2 border border-gray-300 rounded"> -->
                        <select name="grado_id" class="w-full px-3 py-2 border border-gray-300 rounded">
                            <option value="selecciona el programa">Selecciona el Programa</option>
                            <?php list_programa($respuesta_consulta_programa)?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="seccion" class="block font-bold mb-2">Sección:</label>
                        <!-- <input type="text" id="seccion" name="seccion_id" required class="w-full px-3 py-2 border border-gray-300 rounded"> -->
                        <select name="seccion_id" class="w-full px-3 py-2 border border-gray-300 rounded">
                        <option value="selecciona la seccion">Selecciona la seccion</option>
                            <?php list_seccion($respuesta_consulta_secciones)?>
                        </select>
                    </div>
                    <div class="flex justify-between">
                        <input type="submit" value="Guardar" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <input type="reset" value="Limpiar" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        <a href="./listado_estudiantes.php" class="bg-green-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Ver listado</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>