<?php

//Clase articulos
class Articulo {
    public $nombre;
    public $coste;
    public $precio;
    public $contador;
 
    public function __construct($nombre, $coste, $precio, $contador) {
        $this->nombre = $nombre;
        $this->coste = $coste;
        $this->precio = $precio;
        $this->contador = $contador;
    }
 
    public function getNombre() {
        return $this->nombre;
    }
 
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getCoste() {
        return $this->coste;
    }
 
    public function setCoste($coste) {
        $this->coste = $coste;
    }

    public function getPrecio() {
        return $this->precio;
    }
 
    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getContador() {
        return $this->contador;
    }
 
    public function setContador($contador) {
        $this->contador = $contador;
    }
}

?>