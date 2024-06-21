<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Obtener y limpiar el nombre del paciente
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);

        // Configuración de la conexión PDO
        $dsn = "mysql:host=localhost;dbname=covid";
        $user = "root";
        $pass = "root";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Manejo de errores
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // Codificación UTF-8
        ];

        // Crear la instancia de PDO
        $db = new PDO($dsn, $user, $pass, $options);

        // Consulta de actualización
        $query = $db->prepare("UPDATE pacientes SET nombre = :nombre WHERE id = :id");
        $id = 1; // Aquí debes tener el ID del paciente que deseas actualizar
        $query->execute(['nombre' => $nombre, 'id' => $id]);

        // Mensaje de éxito
        echo "Actualización exitosa para el paciente con ID $id";
    } catch (PDOException $e) {
        // Manejo de errores de PDO
        echo "Error: " . $e->getMessage();
    }
}
?>