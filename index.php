<?php require('./db_conexion/conexion.php') ?>


<?php
// Seleccionar la base de datos
error_reporting(0);
mysqli_select_db($conexion, $dbname);


$username = '';
$password = '';

if ($_POST['username'] and $_POST['password'])
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $consulta_users = "SELECT * FROM users WHERE (username) = ('$username') and (password) = ('$password')";
    $respuesta_consulta_users = mysqli_query($conexion, $consulta_users);


    function no_username_password($respuesta_consulta_users)
    {
        if ($respuesta_consulta_users->num_rows == 0)
        {

            echo '<div class="py-3 bg-red-500 text-center rounded-lg text-white">';
            echo "<p>Usuario o contraseña incorrectos<p/>";
            echo "</div>";
        }
    }

    while ($datos = mysqli_fetch_assoc($respuesta_consulta_users))
    {
        if ($datos['username'] == $username and $datos['password'] == $password)
        {
            header('location:admin/inicio.php?id='.$datos['id']);
            // ?>
            

            // <?php
        }
    }

}

// recibir la respuesta


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Login Form</title>
</head>
<body>
  <main>
    <div class="title-container h-20 bg-blue-500 flex justify-center items-center mb-10">
        <h1 class="text-4xl text-white">Consulta de Estudiantes Santiago de Cali</h1>
    </div>
    <section class="w-full flex justify-center items-center">
        <section class="w-full max-w-xs">
            <form action="index.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border" method="POST">
                <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Usuario
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Ingrese su usuario" name="username">
                </div>
                <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Contraseña
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Ingrese su contraseña" name="password">
                </div>
                <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit">
                    Iniciar sesión
                </button>
                </div>
            </form>
            <?php
            no_username_password($respuesta_consulta_users);
            ?>
        </section>
    </section>
    <!-- <p>
        <a href="./admin/inicio.php" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-300">Inicio</a>
    </p> -->
  </main>
</body>
</html>
