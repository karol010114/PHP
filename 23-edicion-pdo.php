<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
</head>
<body>
    <h1>Editar Datos del Paciente</h1>
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
            $stmt = $conn->prepare("SELECT * FROM pacientes WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $paciente = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($paciente) {
                ?>
                <form id="formulario" action="23.1-actualizacion-pdo.php" method="post">    
                    <input type="hidden" name="id" value="<?php echo $paciente['id']; ?>">
                    <label for="nombre">Nombres:</label> 
                    <input type="text" id="nombre" name="nombre" value="<?php echo $paciente['nombres']; ?>" required><br>
                    <label for="apellido">Apellidos:</label>
                    <input type="text" id="apellido" name="apellido" value="<?php echo $paciente['apellidos']; ?>"><br>
                    <label for="edad">Edad:</label>
                    <input type="text" id="edad" name="edad" value="<?php echo $paciente['edad']; ?>" required><br>
                    <label for="talla">Talla (cm):</label>
                    <input type="text" id="talla" name="talla" value="<?php echo $paciente['talla_m']; ?>" required><br>
                    <label for="peso">Peso (kg):</label>
                    <input type="text" id="peso" name="peso" value="<?php echo $paciente['peso_kg']; ?>"><br>
                    <h2><u>Síntomas</u></h2>
                    <input type="checkbox" name="tos" id="tos" <?php echo $paciente['sintoma_tos'] ? 'checked' : ''; ?>>
                    <label for="tos">Tos</label><br>
                    <input type="checkbox" name="fiebre" id="fiebre" <?php echo $paciente['sintoma_fiebre'] ? 'checked' : ''; ?>>
                    <label for="fiebre">Fiebre</label><br>
                    <input type="checkbox" name="disnea" id="disnea" <?php echo $paciente['sintoma_disnea'] ? 'checked' : ''; ?>>
                    <label for="disnea">Disnea</label><br>
                    <input type="checkbox" name="dolor_muscular" id="dolor_muscular" <?php echo $paciente['sintoma_dolormuscular'] ? 'checked' : ''; ?>>
                    <label for="dolor_muscular">Dolor muscular</label><br>
                    <input type="checkbox" name="gripe" id="gripe" <?php echo $paciente['sintoma_gripe'] ? 'checked' : ''; ?>>
                    <label for="gripe">Gripe</label><br>
                    <input type="checkbox" name="presion_alta" id="presion_alta" <?php echo $paciente['sintoma_presionalta'] ? 'checked' : ''; ?>>
                    <label for="presion_alta">Presión Alta</label><br>    
                    <input type="checkbox" name="fatiga" id="fatiga" <?php echo $paciente['sintoma_fatiga'] ? 'checked' : ''; ?>>
                    <label for="fatiga">Fatiga</label><br>
                    <input type="checkbox" name="garraspera" id="garraspera" <?php echo $paciente['sintoma_garraspera'] ? 'checked' : ''; ?>>
                    <label for="garraspera">Garraspera</label><br>
                    <label for="fecha">Fecha de vacunación:</label>
                    <input type="date" id="fecha" name="fecha" value="<?php echo $paciente['ultima_fecha_vacunacion']; ?>">
                    <div class="Botones">
                        <br>
                        <button type="submit">Actualizar Datos</button>
                        <a href="javascript:history.go(-1)">Cancelar</a>
                    </div>
                </form>
                <?php
            } else {
                echo "No se encontró al paciente.";
            }
        } else {
            echo "No se especificó el ID del paciente a editar.";
        }
    } catch (PDOException $e) {    echo "Error: " . $e->getMessage();
    }
    ?>
    </body>
    </html>