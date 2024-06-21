<?php
include("14-herencia.php");

echo "\nEJEMPLO DE HERENCIA CON ANIMALES\n";

$perro = new Perro("Colita", "Verde", false, "sound-dog.mp3");
$gato = new Gato("Pelusa", "Rojo", false, "sound-cat.mp3");

echo "\nPERRO :\n";
echo $perro->obtenerInformacion() . "\n";
echo "\nGATO :\n";
echo $gato->obtenerInformacion() . "\n";

echo "\nElige un animal para reproducir su sonido (1 para Perro, 2 para Gato): ";
$opcion = trim(fgets(STDIN));

if ($opcion == 1) {
    echo $perro->hacerSonido("Guauu") . "\n";
} elseif ($opcion == 2) {
    echo $gato->hacerSonido("Miau") . "\n";
} else {
    echo "Opción no válida\n";
}
?>
