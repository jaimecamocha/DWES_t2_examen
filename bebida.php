<?php 
//Clase bebida
class Bebida extends Articulo {
    public $alcoholica;
 
    public function __construct($nombre, $coste, $precio, $contador, $alcoholica) {
        parent::__construct($nombre, $coste, $precio, $contador);
        $this->alcoholica = true;
    }
}
 ?>