<?php
 echo "Ingrese su edad: ";
 $edadEstudiante1= fgets(STDIN);
 $edadEstudiante2= 21;

 if($edadEstudiante1 > $edadEstudiante2) {
     echo "El estudiante N° 01 es mayor que el estudiante N° 02";
    }
elseif($edadEstudiante1 == $edadEstudiante2) {
    echo "El estudiante N° 01 tiene la misma edad que el estudiante N° 02";
}
else{
   echo "El estudiante N° 02 es mayor que el estudiante N° 01";
}

 echo "\n";
 echo "Ingrese su Nota Final: ";
 $notafinal = fgets(STDIN);

 if($notafinal < 10.5) {
  echo "Usted está desaprobado\n";
}
elseif($notafinal == 10.5) {
  echo "Usted está aprobado a las justas\n";
}
elseif($notafinal > 10.5 && $notafinal <= 15) {
  echo "Usted está aprobado de forma regular\n";
}
else {
  echo "Usted está aprobado\n";
}

?>