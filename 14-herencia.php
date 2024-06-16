<?php

class Animal {
    public $nombre;
    public $color;    
    public $estaExtincion;
    public $archivoSonido;
    
    public function __construct($nombre, $color, $estaExtincion, $archivoSonido) {
        if (!is_string($nombre) || !is_string($color) || !is_bool($estaExtincion) || !is_string($archivoSonido)) {
            throw new InvalidArgumentException("Invalid argument types provided.");
        }
        $this->nombre = $nombre;
        $this->color = $color;
        $this->estaExtincion = $estaExtincion;
        $this->archivoSonido = $archivoSonido;
    }
 
    public function obtenerInformacion() {   
        $colortext = "";
        if ($this->color == "Verde") {
            $colortext = "\033[32m";
        } elseif ($this->color == "Rojo") {
            $colortext = "\033[31m";
        }
        $mensaje = "Nombre : " . $this->nombre
                 . "\n" . "Color : " . $colortext . $this->color . "\033[0m"
                 . "\n" . "En Extinción ? : " . ($this->estaExtincion ? "Si" : "No");
        return $mensaje;
    }
 
    public function hacerSonido() {
        $audiofile = "C:\\xampp\\htdocs\\php-examples\\" . $this->archivoSonido;
        if (file_exists($audiofile)) {
            shell_exec("start wmplayer " . escapeshellarg($audiofile));
        } else {
            echo "Archivo de sonido no encontrado: " . $audiofile;
        }
    }
}

class Perro extends Animal {
    public function hacerSonido($sonido = "") {
        parent::hacerSonido();
        if (!empty($sonido)) {
            echo "El perro hace: " . $sonido;
        }
    }
}

class Gato extends Animal {
    public function hacerSonido($sonido = "") {
        parent::hacerSonido();
        if (!empty($sonido)) {
            echo "El gato hace: " . $sonido;
        }
    }
}

?>
