<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Formulario de Pacientes</title>
<body>
    <h1>Registro de Pacientes</h1>
    <form id="formulario" action="21-pdo-post.php" method="post">
        <label for ="nombre">Nombres:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for ="apellido">Apellidos:</label>
        <input type="text" id="apellido" name="apellido" required><br>

        <label for ="edad">Edad:</label>
        <input type="text" id="edad" name="edad" required><br>

        <label for ="talla">Talla:</label>
        <input type="text" id="talla" name="talla" required><br>

        <label for ="peso">Peso (kg):</label>
        <input type="text" id="peso" name="peso" required><br>

        <h2>Sintomas</h2>
        <input type="checkbox" id="fiebre" name="fiebre">
        <label for ="fiebre">Fiebre</label><br>

        <input type="checkbox" id="disnea" name="disnea">
        <label for ="disnea">Disnea</label><br>

        <input type="checkbox" id="dolor_muscular" name="dolor_muscular">
        <label for ="dolor_muscular">Dolor muscular</label><br>

        <input type="checkbox" id="gripe" name="gripe">
        <label for ="gripe">Gripe</label><br>

        <input type="checkbox" id="presion_alta" name="presion_alta">
        <label for ="presion_alta">Preión ALta</label><br>

        <input type="checkbox" id="fatiga" name="fatiga">
        <label for ="fatiga">Fatiga</label><br>

        <input type="checkbox" id="garraspera" name="garraspera">
        <label for ="garraspera">Garraspera</label><br>

        <label for="fecha">**Fecha de Vacunación**</label>
        <input type="date" id="fecha" name="fecha">
        <div class="botones">
            <br>
            <button type="submit">Guardar</button>
            <button>Cancelar</button>
        </div>
    </form>
</body>
</html>