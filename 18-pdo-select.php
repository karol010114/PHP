<?php

try {
    $dsn = "mysql:host=localhost;dbname=covid";
    $user = "root";
    $pass = "root";
    $db = new PDO($dsn, $user, $pass);
    echo "Hola base de datos, tengo conexión\n";

    $pacientes = $db->query('SELECT * FROM pacientes WHERE edad BETWEEN 1 AND 99 ORDER BY edad ASC');

    foreach ($pacientes as $row) {
        echo $row["nombres"] . " " . $row["apellidos"] . ", EDAD: " . $row["edad"] . "\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>