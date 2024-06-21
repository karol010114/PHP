<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "covid";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $conn->prepare("DELETE FROM pacientes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "<script>alert('Se eliminó el paciente correctamente'); window.location.href = '22-lista-pdo.php';</script>";
    } else {
        echo "<script>alert('No se encontró el ID del paciente a eliminar');</script>";
    }
} catch (PDOException $e) {
    echo "<script>alert('Error al eliminar el paciente');</script>";
    echo "Error: " . $e->getMessage();
}
?>