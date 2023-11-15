<?php

//clase pizza
class Pizza extends Articulo {
    public $ingredientes;
 
    public function __construct($nombre, $coste, $precio, $contador, $ingredientes) {
        parent::__construct($nombre, $coste, $precio, $contador);
        $this->ingredientes = $ingredientes;
    }
 
    public function getIngredientes() {
        return $this->ingredientes;
    }
 
    public function setIngredientes($ingredientes) {
        $this->ingredientes = $ingredientes;
    }
}
?>