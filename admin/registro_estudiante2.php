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
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/admin/registro_estudiantes.css">
    <title>Registro Estudiante</title>
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
        <section>
            <div class="container-form">
                <!-- max-w-md -->
                <form action="registro_estudiante.php" method="POST">
                    <h1>Registro de Estudiantes</h1>
                    <div class="mb-4">
                        <label for="nombres">Nombres:</label>
                        <input type="text" id="nombres" name="nombres" required>
                    </div>

                    <div class="mb-4">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" id="apellidos" name="apellidos" required>
                    </div>


                    <div>
                        <label for="genero">Sexo:</label>
                        <select id="genero" name="genero" required>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="mb-4">
                         <label for="programa">Programa:</label>
                        <!--<input type="text" id="programa" name="grado_id" required class="w-full px-3 py-2 border border-gray-300 rounded"> -->
                        <select name="grado_id" >
                            <option value="selecciona el programa">Selecciona el Programa</option>
                            <?php list_programa($respuesta_consulta_programa)?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="seccion" >Sección:</label>
                        <!-- <input type="text" id="seccion" name="seccion_id" required class="w-full px-3 py-2 border border-gray-300 rounded"> -->
                        <select name="seccion_id">
                        <option value="selecciona la seccion">Selecciona la seccion</option>
                            <?php list_seccion($respuesta_consulta_secciones)?>
                        </select>
                    </div>
                    <div class="buttons">
                        <input type="submit" value="Guardar" name="submit" class="submit">
                        <input type="reset" value="Limpiar" class="reset" >
                        <a href="./listado_estudiantes.php" class="ver_listado" >Ver listado</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>