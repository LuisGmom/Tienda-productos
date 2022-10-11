
<?php
    
    session_start();

        $code = [];
        $productos =['$contador'];

        if(isset($_POST['codigos'])){
            $codigos = $_POST['codigos'];
    
            foreach($codigos as $dato){
                $code[$dato] = true;
            }
        }
        $_SESSION['code'] = $code;
 
    try{
        error_reporting(E_ALL ^ E_WARNING);
        //Conectar a la base de datos
        $conexion = new mysqli('localhost', 'root', '', 'tienda');
        // Verificacion de conexion.
        //$resultado = $conexion->query("SELECT * FROM productos");

        if($conexion->connect_error != ''){
            //echo "Ocurrio un error al ejecutar la consulta: {$conexion->connect_error}";
            echo "Error numero 2525, favor contactar al administrador telefono: 85858585.";
            error_log("Ocurrio un error al ejecutar la consulta en la base de datos: {$conexion->connect_error}");
            throw new Exception("No se a seleccionado ningun articulo");
        }
    }catch(Exception $er){
       error_log($er->getMessage()); 
    }

	//cierre de conexion.
	$conexion->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="main.js"></script>
    <style>
        /*Estilos etiquetas*/
        body {
            background-color: #d6d6d6;
            font-family: Verdana;
            min-height: 100vh;
            }
        header {
            display: flex;
            flex-direction: row;
            justify-content: center;
            }
        footer {
            display: block;
            margin: 0;
            }
        li{
            list-style: none;
            }
        /*estilos nav*/
        nav a {
            text-decoration: none;
            text-align: center;
            color: black;
            display: block;
            padding-left: 5px;
            font-family: Arial;
            height: 50px;
            background: #E0E0E0;
            }
        nav ul li{
            line-height: 50px;
            width: 150px;
            height: 50px;
            display: block;
            float: left;
            text-decoration: none;
            }

        nav a:hover {
            color: red;
            transition: .3s;
            border-bottom: 3px solid red;
            text-shadow: -1px 1px 20px white;
            background: #e67e7e;
            }

        nav li:hover li {
            max-height: 300px;
            transition: .2s;
            }

        /*Dentro de las sub opciones*/
        nav li:hover li:first-child {
            border-top: 3px solid black;
            }

        nav li:hover ul li a:last-child {
            border-bottom: none;
            }

        /*Estilos Body y footer*/ 
        .informacion-principal{
            margin: auto;
            width: 650px;
            }
            .informacion-principal h2{
            text-align: center;
            }
        .informacion-principal p {
            text-align: justify;
            }
        .container-wrap {
            display: flex;
            flex-wrap: wrap;
            column-gap: 3px;
            width: 100%;
            margin: 0 auto;
            justify-content: center;
            }
        .container_flex {
            display: flex;
            flex-direction: column;
            margin: 0 auto;
            }
        .consulta-bd{
            width: 650px; 
            display: flex; 
            flex-direction: row; 
            justify-content: space-around; 
            flex-wrap: wrap;
            }
        .consulta-cart{
            width: 650px;
            justify-content: center;
            }
        .card-product {
            margin-top: 10px;
            margin-bottom: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            width: 300px;
            height: 300px;
            background-color: #837979;
            text-align: center;
            }
        .card-product img{
            width: 125px;
            height: 125px;
            }
        .card-product button{
            background-color: green;
            color: #E0E0E0;
            font-size: 20px;
            margin-top: 5px;
            margin-bottom: 5px;
            border: none;
            border-radius: 10px;
            }
            .card-product button:hover{
            background-color: #399c39;
            }
        .encabezado{
            width: 100%;
            height: 100px;
            }
        .logo{
            margin-top: 15px;
            margin-bottom: 15px;
            width: 140px;
            height: auto;
            }
        .contenedor-footer{
            display: flex;
            flex-direction: row;
            margin-top: 20px;
            padding-top: 10px;
            width: 100%;
            height: auto;
            background-color: rgb(43, 43, 170);
            }
        .column_logo{
            width: 50%;
            }
        .informacion-footer{
            margin: auto;
            font-size: 20px;
            color: #d6d6d6;
            }
    </style>
    <script>

        function visualizar () {
            var peticion = localStorage.getItem('carrito');
            document.querySelector('.informacion').innerHTML = peticion;

        }
    </script>
    <title>Tienda</title>
</head>
<body>
    <header class="encabezado">
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="producto.php">Productos</a></li>
                <li><a href="cart.php">Compras</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main class="container_flex">
    
    <section class="informacion-principal">
            <h2>Lorem ipsum dolor sit amet.</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Perferendis illo at atque, dolore deleniti sed adipisci 
                maiores voluptatem iure aliquam.</p>
    </section>

    <section class="container-wrap">

            <div class="informacion">

            </div>
        <div class="consulta-cart">
            <?php 
                /*
                var_dump muestra todos los datos alamacenados en el array atraves de la superglobal $_POST

                var_dump($_POST); 
                
                */
                foreach($codigos as $valor){
                    echo "<h2 style='text-align: center; font-size: 25px bold;'>Productos:</h2>";
                    echo "<p>Lorem ipsum dolor sit amet consectetur</p>";
                    echo "</hr>";
                    echo "El usuario a seleccionado: $valor <br>";

                }
            ?>
        </div>
        <div>
        <button onclick="visualizar()">Ver articulos</button>
        </div>
    </section>
    </main>
    <footer>
        <section class="contenedor-footer">
            <div class="logo column_logo">
                <img src="" alt="">
            </div>
            <div class="informacion-footer">
                <ul>
                    <li>
                        <p><b>Teléfono:</b> 2222-2222</p>
                    </li>
                    <li>
                        <p><b>Correo:</b> aaa@aaa.com</p>
                    </li>
                    <li>
                        <p><b>Dirección:</b><br> 0mts Lorem ipsum dolor sit amet.</p>
                    </li>
                </ul>
            </div>
        </section>
    </footer>
</body>
</html>