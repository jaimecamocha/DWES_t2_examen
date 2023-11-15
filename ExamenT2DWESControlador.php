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
 
    // Getters
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
 
//Clase bebida
class Bebida extends Articulo {
    public $alcoholica;
 
    public function __construct($nombre, $coste, $precio, $contador, $alcoholica) {
        parent::__construct($nombre, $coste, $precio, $contador);
        $this->alcoholica = true;
    }
}
 
//inicialización de los articulos
$articulos = [
    new Articulo("Lasagna", 3.50, 7.00, 20),
    new Articulo("Pan de ajo y mozzarella", 2.00, 4.50, 15),
    new Pizza("Pizza Margarita", 4.00, 8.00, 30, ["Tomate", "Mozzarella", "Albahaca"]),
    new Pizza("Pizza Pepperoni", 5.00, 10.00, 25, ["Tomate", "Mozzarella", "Pepperoni"]),
    new Pizza("Pizza Vegetal", 4.50, 9.00, 18, ["Tomate", "Mozzarella", "Verduras Variadas"]),
    new Pizza("Pizza 4 quesos", 5.50, 11.00, 20, ["Mozzarella", "Gorgonzola", "Parmesano", "Fontina"]),
    new Bebida("Refresco", 1.00, 2.00, 50, false),
    new Bebida("Cerveza", 1.50, 3.00, 40, true)
];
 
// Ejemplo de uso
mostrarMenu($articulos);
mostrarMasVendidos($articulos);
mostrarMasLucrativos($articulos);
 
//mostrar el menu
function mostrarMenu($articulos) {
    echo "<h1>Nuestro menú</h1>";
 
    echo "<h2>Pizzas</h2>";
    foreach ($articulos as $articulo) {
        if ($articulo instanceof Pizza) {
            echo "{$articulo->nombre} - Precio: {$articulo->precio}€<br>";
        }
    }
 
    echo "<h2>Bebidas</h2>";
    foreach ($articulos as $articulo) {
        if ($articulo instanceof Bebida) {
            echo "{$articulo->nombre} - Precio: {$articulo->precio}€<br>";
        }
    }
 
    echo "<h2>Otros</h2>";
    foreach ($articulos as $articulo) {
        if (!($articulo instanceof Pizza) && !($articulo instanceof Bebida)) {
            echo "{$articulo->nombre} - Precio: {$articulo->precio}€<br>";
        }
    }
}
 
//mostrar los articulos más vendidos (ordenados de mayor a menor)
function mostrarMasVendidos($articulos) {
    echo "<h1>Los más vendidos</h1>";
 
    //ordenacion
    usort($articulos, function ($a, $b) {
        return $b->contador - $a->contador;
    });
 
    for ($i = 0; $i < 3; $i++) {
        echo "{$articulos[$i]->nombre} - {$articulos[$i]->contador} unidades<br>";
    }
}
 
//mostrar los articulos más lucrativos (ordenados de mayor a menor)
function mostrarMasLucrativos($articulos) {
    echo "<h1>¡Los más lucrativos!</h1>";
 
    //ordenación
    usort($articulos, function ($a, $b) {
        $beneficioA = ($a->precio - $a->coste) * $a->contador;
        $beneficioB = ($b->precio - $b->coste) * $b->contador;
 
        return $beneficioB - $beneficioA;
    });
 
    foreach ($articulos as $articulo) {
        $beneficio = ($articulo->precio - $articulo->coste) * $articulo->contador;
        echo "{$articulo->nombre} - Beneficio: {$beneficio}€<br>";
    }
}


include_once 'ExamenT2DWESVista.php';
?>