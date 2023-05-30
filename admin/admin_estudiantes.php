<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="../css/output.css" rel="stylesheet">
    <title>Administrar Estudiantes</title>
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
</body>
</html>