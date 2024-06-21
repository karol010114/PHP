<?php
    include ("12-clase.php");

    echo "***********BIENVENIDO A MI CALCULADORA***********\n";
    echo "***********MENU DE OPCIONES***********\n";
    echo "***********SUMAR (OPCIÓN 1)***********\n";
    echo "***********RESTAR (OPCIÓN 2)***********\n";
    echo "***********MULTIPLICAR (OPCIÓN 3)***********\n";
    echo "***********DIVIDIR (OPCIÓN 4)***********\n";
    echo "***********POTENCIA (OPCIÓN 5)***********\n";
    echo "***********RAIZ (OPCIÓN 6)***********\n";
    echo "***********SALIR (OPCIÓN 0)***********\n";
    ECHO "INGRESE LA OPCION: \n";
    
    do {
        $opcion = fgets(STDIN);
        switch ($opcion) {
            case 1:
                echo "ESCRIBE EL PRIMER NUMERO:";
                $numero1 = fgets(STDIN);
                echo "\nESCRIBE EL SEGUNDO NUMERO:";
                $numero2 = fgets(STDIN);
                $calculadora = new Calculadora($numero1,$numero2);
                $resultado = $calculadora->sumar();
                echo "\nLA SUMA ES: ".$resultado;
                break;
        
            case 2:
                echo "ESCRIBE EL PRIMER NUMERO:";
                $numero1 = fgets(STDIN);
                echo "\nESCRIBE EL SEGUNDO NUMERO:";
                $numero2 = fgets(STDIN);
                $calculadora = new Calculadora($numero1,$numero2);
                $resultado = $calculadora->restar();
                echo "\nLA RESTA ES: ".$resultado;
                break;

            case 3:
                echo "ESCRIBE EL PRIMER NUMERO:";
                $numero1 = fgets(STDIN);
                echo "\nESCRIBE EL SEGUNDO NUMERO:";
                $numero2 = fgets(STDIN);
                $calculadora = new Calculadora($numero1,$numero2);
                $resultado = $calculadora->multiplicar();
                echo "\n LA MULTIPLICACION ES: ".$resultado;
                break;

            case 4:
                echo "ESCRIBE EL PRIMER NUMERO:";
                $numero1 = fgets(STDIN);
                echo "\nESCRIBE EL SEGUNDO NUMERO:";
                $numero2 = fgets(STDIN);
                $calculadora = new Calculadora($numero1,$numero2);
                $resultado = $calculadora->dividir();
                echo "\n LA DIVISION ES: ".$resultado;
                break;

            case 5:
                echo "ESCRIBE EL PRIMER NUMERO:";
                $numero1 = fgets(STDIN);
                echo "\nESCRIBE EL SEGUNDO NUMERO:";
                $numero2 = fgets(STDIN);
                $calculadora = new Calculadora($numero1,$numero2);
                $resultado = $calculadora->potencia();
                echo "\n LA POTENCIA ES: ".$resultado;
                break;

            case 6:
                echo "ESCRIBE EL PRIMER NUMERO:";
                $numero1 = fgets(STDIN);
                echo "\nESCRIBE EL SEGUNDO NUMERO:";
                $numero2 = fgets(STDIN);
                $calculadora = new Calculadora($numero1,$numero2);
                $resultado = $calculadora->raiz();
                echo "\n LA RAIZ ES: ".$resultado;
                break;
            
            case 0:
                echo "MUCHAS GRACIAS POR ESTAR AQUI";
                break;

            default:
                #code...
                break;
        }

        if ($opcion == 0) break;
        echo "\n ¿DESEA CONTINUAR? (1=SI/0=N0): \n ";
        $rpta = fgets(STDIN);
    }
    while($rpta==1);
?>