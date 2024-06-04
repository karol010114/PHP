<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "covid";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $talla = $_POST['talla'];
        $peso = $_POST['peso'];
        $tos = isset($_POST['tos']) ? 1 : 0;
        $fiebre = isset($_POST['fiebre']) ? 1 : 0;
        $disnea = isset($_POST['disnea']) ? 1 : 0;
        $dolor_muscular = isset($_POST['dolor_muscular']) ? 1 : 0;
        $gripe = isset($_POST['gripe']) ? 1 : 0;
        $presion_alta = isset($_POST['presion_alta']) ? 1 : 0;
        $fatiga = isset($_POST['fatiga']) ? 1 : 0;
        $garraspera = isset($_POST['garraspera']) ? 1 : 0;
        $fecha = $_POST['fecha'];

        $query_anterior = "SELECT * FROM pacientes WHERE id=:id";
        $stmt_anterior = $conn->prepare($query_anterior);
        $stmt_anterior->bindParam(':id', $id);
        $stmt_anterior->execute();
        $paciente_anterior = $stmt_anterior->fetch(PDO::FETCH_ASSOC);

        $query = "UPDATE pacientes SET nombres=:nombre, apellidos=:apellido, edad=:edad, talla_m=:talla, peso_kg=:peso, sintoma_tos=:tos, sintoma_fiebre=:fiebre, sintoma_disnea=:disnea, sintoma_dolormuscular=:dolor_muscular, sintoma_gripe=:gripe, sintoma_presionalta=:presion_alta, sintoma_fatiga=:fatiga, sintoma_garraspera=:garraspera, ultima_fecha_vacunacion=:fecha WHERE id=:id";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':talla', $talla);
        $stmt->bindParam(':peso', $peso);
        $stmt->bindParam(':tos', $tos);
        $stmt->bindParam(':fiebre', $fiebre);
        $stmt->bindParam(':disnea', $disnea);
        $stmt->bindParam(':dolor_muscular', $dolor_muscular);
        $stmt->bindParam(':gripe', $gripe);
        $stmt->bindParam(':presion_alta', $presion_alta);
        $stmt->bindParam(':fatiga', $fatiga);
        $stmt->bindParam(':garraspera', $garraspera);
        $stmt->bindParam(':fecha', $fecha);

        $stmt->execute();

        $query_actualizado = "SELECT * FROM pacientes WHERE id=:id";
        $stmt_actualizado = $conn->prepare($query_actualizado);
        $stmt_actualizado->bindParam(':id', $id);
        $stmt_actualizado->execute();
        $paciente_actualizado = $stmt_actualizado->fetch(PDO::FETCH_ASSOC);

        echo "<h2>Datos Anteriores:</h2>";
        echo "<pre>";
        print_r($paciente_anterior);
        echo "</pre>";

        echo "<h2>Datos Actualizados:</h2>";
        echo "<pre>";
        foreach ($paciente_actualizado as $key => $value) {
            if ($paciente_anterior[$key] !== $value) {
                echo "<span style='color: green;'>$key: $value</span><br>";
            } else {
                echo "$key: $value<br>";
            }
        }
        echo "</pre>";

        echo "<script>alert('Datos actualizados con éxito');</script>";
    }
} catch (PDOException $e) {
    echo "<script>alert('Error al actualizar los datos');</script>";
    echo "Error: " . $e->getMessage();
}
?>