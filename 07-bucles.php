<?php 
echo "Ingrese su Notas : ";
$nota = fgets(STDIN);
$contador=1;
$sumanotas=0;
while($contador<=3) {
$sumanotas = $sumanotas + $nota;
echo "Ingrese su Notas : ";
$nota = fgets(STDIN);
$contador++;//contador=$contador+1
}
$notapromedio = $sumanotas/3;
echo "\n El promedio de notas es: ".$notapromedio;

//logica que me permite dar el mayor de 5 numeros
$mayor=0;
for($i=i;$i<=5;$i++){
 echo "Ingrese su numero : ";
 $numero = fgets(STDIN);
 if($mayor<$numero) {
    $mayor=$numero;
 }
}
 echo "El numero mayor es :".$mayor;

//logica que me permite dar el menor de 5 numeros
?>