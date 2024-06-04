<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda de Pacientes</title>
</head>
<body>
    <center><h1>Busqueda de Pacientes</h1></center>
    <!-- <form action="22.1-consulta-pdo.php" method="POST"> -->
    <input type="text" placeholder="Escribe aqui" name="nombre" id="nombre" /><br>
    <label type="tos" name="tos">Tos</label><input type="checkbox" for="tos">
    <button type="button" onclick="buscarPacientes();">Buscar</button>
    <table style="border: 1px solid black;">
        <tr>
            <td>Paciente</td>
            <td>Edad</td>
            <td>Talla</td>
            <td>Peso</td>
            <td>Tos</td>
            <td>Fiebre</td>
            <td>Disnea</td>
            <td>Acciones</td>         
        </tr>
    </table>
    <!-- </gorm> -->
    <script src="25.1-ajax.js"> </script>
</body>
</html>