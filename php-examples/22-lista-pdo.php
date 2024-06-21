<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buscar Pacientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 0 auto; 
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 5px; 
            text-align: left;
        }
    </style>
</head>
<body>
 
<h1 style="text-align: center;">Buscar Pacientes</h1> 
 
<form method="POST">
    <table>
        <tr>
            <td><label for="nombre">Nombre:</label></td>
            <td><input type="text" id="nombre" name="nombre"></td>
        </tr>
        <tr>
            <td colspan="2"><label for="tos">Tos:</label><input type="checkbox" id="tos" name="tos" value="1"></td>
        </tr>
        <tr>
            <td colspan="2"><label for="fiebre">Fiebre:</label><input type="checkbox" id="fiebre" name="fiebre" value="1"></td>
        </tr>
        <tr>
            <td colspan="2"><label for="disnea">Disnea:</label><input type="checkbox" id="disnea" name="disnea" value="1"></td>
        </tr>
        <tr>
            <td colspan="2"><label for="dolor_muscular">Dolor Muscular:</label><input type="checkbox" id="dolor_muscular" name="dolor_muscular" value="1"></td>
        </tr>
        <tr>
            <td colspan="2"><label for="gripe">Gripe:</label><input type="checkbox" id="gripe" name="gripe" value="1"></td>
        </tr>
        <tr>
            <td colspan="2"><label for="presion_alta">Presión Alta:</label><input type="checkbox" id="presion_alta" name="presion_alta" value="1"></td>
        </tr>
        <tr>
            <td colspan="2"><label for="fatiga">Fatiga:</label><input type="checkbox" id="fatiga" name="fatiga" value="1"></td>
        </tr>
        <tr>
            <td colspan="2"><label for="garraspera">Garraspera:</label><input type="checkbox" id="garraspera" name="garraspera" value="1"></td>
        </tr>
    </table>
    <button type="submit">Buscar</button>
</form>
 
 
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "covid";
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $tos = isset($_POST['tos']) ? 1 : 0;
        $fiebre = isset($_POST['fiebre']) ? 1 : 0;
        $disnea = isset($_POST['disnea']) ? 1 : 0;
        $dolor_muscular = isset($_POST['dolor_muscular']) ? 1 : 0;
        $gripe = isset($_POST['gripe']) ? 1 : 0;
        $presion_alta = isset($_POST['presion_alta']) ? 1 : 0;
        $fatiga = isset($_POST['fatiga']) ? 1 : 0;
        $garraspera = isset($_POST['garraspera']) ? 1 : 0;
 
        $query = "SELECT * FROM pacientes WHERE 1=1";
        $params = [];
        if (!empty($nombre)) {
            $query .= " AND nombres LIKE :nombre";
            $params[':nombre'] = '%' . $nombre . '%';
        }
        if ($tos) {
            $query .= " AND sintoma_tos = :tos";
            $params[':tos'] = $tos;
        }
        if ($fiebre) {
            $query .= " AND sintoma_fiebre = :fiebre";
            $params[':fiebre'] = $fiebre;
        }
        if ($disnea) {
            $query .= " AND sintoma_disnea = :disnea";
            $params[':disnea'] = $disnea;
        }
        if ($dolor_muscular) {
            $query .= " AND sintoma_dolormuscular = :dolor_muscular";
            $params[':dolor_muscular'] = $dolor_muscular;
        }
        if ($gripe) {
            $query .= " AND sintoma_gripe = :gripe";
            $params[':gripe'] = $gripe;
        }
        if ($presion_alta) {
            $query .= " AND sintoma_presionalta = :presion_alta";
            $params[':presion_alta'] = $presion_alta;
        }
        if ($fatiga) {
            $query .= " AND sintoma_fatiga = :fatiga";
            $params[':fatiga'] = $fatiga;
        }
        if ($garraspera) {
            $query .= " AND sintoma_garraspera = :garraspera";
            $params[':garraspera'] = $garraspera;
        }
 
        $stmt = $conn->prepare($query);
 
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
 
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
        if ($result) {
            echo "<table>";
            echo "<tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Talla</th>
                    <th>Peso</th>
                    <th>Tos</th>
                    <th>Fiebre</th>
                    <th>Disnea</th>
                    <th>Dolor Muscular</th>
                    <th>Gripe</th>
                    <th>Presión Alta</th>
                    <th>Fatiga</th>
                    <th>Garraspera</th>
                    <th>Última Fecha de Vacunación</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>";
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nombres']}</td>";
                echo "<td>{$row['apellidos']}</td>";
                echo "<td>{$row['edad']}</td>";
                echo "<td>{$row['talla_m']}</td>";
                echo "<td>{$row['peso_kg']}</td>";
                echo "<td>" . ($row['sintoma_tos'] ? '<span style="color:green;">&#10003;</span>' : '<span style="color:red;">&#10007;</span>') . "</td>";
                echo "<td>" . ($row['sintoma_fiebre'] ? '<span style="color:green;">&#10003;</span>' : '<span style="color:red;">&#10007;</span>') . "</td>";
                echo "<td>" . ($row['sintoma_disnea'] ? '<span style="color:green;">&#10003;</span>' : '<span style="color:red;">&#10007;</span>') . "</td>";
                echo "<td>" . ($row['sintoma_dolormuscular'] ? '<span style="color:green;">&#10003;</span>' : '<span style="color:red;">&#10007;</span>') . "</td>";
                echo "<td>" . ($row['sintoma_gripe'] ? '<span style="color:green;">&#10003;</span>' : '<span style="color:red;">&#10007;</span>') . "</td>";
                echo "<td>" . ($row['sintoma_presionalta'] ? '<span style="color:green;">&#10003;</span>' : '<span style="color:red;">&#10007;</span>') . "</td>";
                echo "<td>" . ($row['sintoma_fatiga'] ? '<span style="color:green;">&#10003;</span>' : '<span style="color:red;">&#10007;</span>') . "</td>";
                echo "<td>" . ($row['sintoma_garraspera'] ? '<span style="color:green;">&#10003;</span>' : '<span style="color:red;">&#10007;</span>') . "</td>";
                echo "<td>{$row['ultima_fecha_vacunacion']}</td>";
                echo "<td><a href='23-edicion-pdo.php?id={$row['id']}'>Editar</a></td>"; 
                echo "<td><a href='24-eliminacion-pdo.php?id={$row['id']}'>Eliminar</a></td>"; 
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
 
</body>
</html> 