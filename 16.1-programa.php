<?php 
 class Instrumento {
    public $nombre;
    public $categoria;
    private $modelos;
    private $tieneCuerdas;
     
       public function __construct($_nombre,$_categoria){
        $this->nombre = $_nombre;
        $this->categoria = $_categoria;

         }
         public function setearModelos($_modelos){
        $this->modelos = $_modelos;

         }

         public function mostrarModelos(){
           return $this->modelos;
         }

         public function validarCuerdas(){
            if($this->tieneCuerdas)
            return "Si";
          else 
            return "No";
         }
            
         }


 