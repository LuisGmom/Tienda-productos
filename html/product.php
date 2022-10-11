<?php 

session_start();

if(isset($_SESSION['codigos'])){
    $code = $_SESSION['codigos'];
}else{
    $code = [false];
}

//Sintaxis de conexión de la base de datos de muestra para PHP y MySQL.

//Conectar a la base de datos

$conexion = new mysqli('localhost', 'root', '', 'tienda');

// Verificacion de conexion.

$resultado = $conexion->query("SELECT * FROM productos");

if($conexion->error != ''){
    echo "Ocurrio un error al ejecutar la consulta: {$conexion->error}";
}


//cierre de conexion.
$conexion->close();

$datos = $resultado->fetch_assoc();
$contador =0;

while ($datos != null){
    echo "<div class='card-product'>";
    echo "<img src='{$datos['Imagen']}'>";
    echo "<li><h4>Codigo: {$datos['codigo']}</h4></li>";
    echo "<li>{$datos['Nombre']}</li>";
    echo "<li>{$datos['Detalle']}</li>";
    echo "<li>{$datos['Precio']}</li>";
    //echo "<button onclick='(boton)'>Agregar</button>";
    //echo "<form method='post' action='cart.php'>";
    echo "<label for='codigos'>Agregar:</label>";
    echo "<input type='checkbox' value='{$datos['codigo']}' name='codigos[$contador]' >";
    //cho "</form>";
    echo "</div>";
    $datos = $resultado->fetch_assoc();
    $contador++;
}      





?>