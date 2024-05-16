
<?php
include '09.1-libreria.php';
echo "ingrese un numero: ";
$numero1=fgets(STDIN);
echo"ingrese el segundo numero:";
$numnero2=fgets(STDIN);

$resultado = multiplicar($numero,$numero2);
echo "El producto de  ".$numero1. "x" .$numero2."es".$resultado ;

$resultado = dividir($numero,$numero2);
echo "La division de ".$numero1. "x" .$numero2."es".$resultado;

?>