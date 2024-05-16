<?php
 $luzEncendida=true;
     
 if($luzEncendida)
 echo "la luz esta encendida";
else 
echo "La luz esta pagada";

// caso 2 
$sintomas_covid=[
    "tos"=>true,
    "fiebre"=>false,
    "dolor"=>false,
    "perdida_olfato"=>false];

    if($sintomas_covid["tos"]&&
    $sintomas_covid["fiebre"]) {
        echo "\nEstas enfermo tienes covid.Ve a centro de salud.";
    }
    else{
        echo "\nAun no estas con covid.";
    }


    //caso 3
     $saldo = 1000;
     if(!($saldo > 0)){
        echo "Tiene saldo suficiente";
         
     }

     else{
        echo "\nTienes saldo";
    
     }
?>


