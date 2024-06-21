<?php
include ("15-polimorfismo.php");

echo "AREA DEL TRIANGULO \n" ;
echo "INGRESE LA BASE: ";
$b = fgets(STDIN);
echo "INGRESE LA ALTURA: ";
$h = fgets(STDIN);
$triangulo = new  Triangulo($b,$h);
$area=$triangulo->calcularArea();
echo "EL AREA DEL TRIANGULO ES ".$area;


echo "\nAREA DEL RECTANGULO \n" ;
echo "INGRESE LA BASE: ";
$b = fgets(STDIN);
echo "INGRESE LA ALTURA: ";
$h = fgets(STDIN);
$rectangulo = new  Rectangulo($b,$h);
$area=$rectangulo->calcularArea();
echo "EL AREA DEL RECTANGULO ES ".$area;

echo "\nAREA DEL CUADRADO\n" ;
echo "INGRESE EL LADO: ";
$l = fgets(STDIN);
$cuadrado = new  Cuadrado($l);
$area=$cuadrado->calcularArea();
echo "EL AREA DEL CUADRADO ES ".$area; 

echo "\nAREA DEL CIRCULO \n" ;
echo "INGRESE RADIO : ";
$r= fgets(STDIN);
$circulo = new  Circulo($r);
$area=$circulo->calcularArea();
echo "EL AREA DEL CIRCULO ES ".$area;




?>