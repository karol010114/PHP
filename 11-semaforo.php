<?php



echo "Por favor, ingresa un número o una letra para indicar el color del semáforo: ";
$color =fgets(STDIN);


switch ($color) {
    case 'rojo':
    case 01:
        echo "¡Pare!\n";
        break;
    case 'amarillo':
    case 02:
        echo "¡Espera!\n";
        break;
    case 'verde':
    case 03:
        echo "¡Avanza!\n";
        break;
    default:
        echo "Color no reconocido.\n";
}
?>