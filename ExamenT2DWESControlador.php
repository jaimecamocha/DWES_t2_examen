<?php
//JAIME FERNÁNDEZ CALVO https://github.com/jaimecamocha/DWES_t2_examen.git

 
//llamadas a cada una de las clases php para cada artículo
 include_once 'articulo.php';
 include_once 'pizza.php';
 include_once 'bebida.php';

 
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
 

//Función para mostrar el menú
function mostrarMenu($articulos) {
    echo "<h1>NUESTRO MENÚ</h1>";
 
    echo "<h2>Pizzas:</h2>";
    foreach ($articulos as $articulo) {
        if ($articulo instanceof Pizza) {
            echo "{$articulo->nombre} → Precio: {$articulo->precio} €<br>";
        }
    }
 
    echo "<h2>Bebidas:</h2>";
    foreach ($articulos as $articulo) {
        if ($articulo instanceof Bebida) {
            echo "{$articulo->nombre} → Precio: {$articulo->precio} €<br>";
        }
    }
 
    echo "<h2>Otros:</h2>";
    foreach ($articulos as $articulo) {
        if (!($articulo instanceof Pizza) && !($articulo instanceof Bebida)) {
            echo "{$articulo->nombre} → Precio: {$articulo->precio} €<br>";
        }
    }
}
 
//Función para mostrar los articulos más vendidos (ordenados de mayor a menor número de ventas)
function mostrarMasVendidos($articulos) {
    echo "<h1>Los más vendidos</h1>";
 
    //Ordenacion
    usort($articulos, function ($a, $b) {
        return $b->contador - $a->contador;
    });
    
    //Recorrer y mostrar por pantalla
    for ($i = 0; $i < 3; $i++) {
        echo "{$articulos[$i]->nombre} → {$articulos[$i]->contador} unidades<br>";
    }
}
 
//Función para mostrar los articulos más lucrativos (ordenados de mayor a menor cantidad de ganancia)
function mostrarMasLucrativos($articulos) {
    echo "<h1>¡Los más lucrativos!</h1>";
 
    //Ordenación
    usort($articulos, function ($a, $b) {
        $beneficioA = ($a->precio - $a->coste) * $a->contador;
        $beneficioB = ($b->precio - $b->coste) * $b->contador;
 
        return $beneficioB - $beneficioA;
    });
 
    //Recorrer y mostrar por pantalla
    foreach ($articulos as $articulo) {
        $beneficio = ($articulo->precio - $articulo->coste) * $articulo->contador;
        echo "{$articulo->nombre} → Beneficio: {$beneficio} €<br>";
    }
}

//Llamadas a las diferentes funciones
mostrarMenu($articulos);
mostrarMasVendidos($articulos);
mostrarMasLucrativos($articulos);

include_once 'ExamenT2DWESVista.php';
?>