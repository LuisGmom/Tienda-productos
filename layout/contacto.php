<?php
    //session_start();

    /*if(isset($_SESSION['codigos'])){
        $code = $_SESSION['codigos'];
    }else{
        $code = [false];
    }*/
    
	//Sintaxis de conexión de la base de datos de muestra para PHP y MySQL.
	
	//Conectar a la base de datos

    
    if(!empty($_POST['nombre'])){
        
        $conexion = new mysqli('localhost', 'root', '', 'tienda');
    
        if($conexion->connect_error != null){
            echo "Ocurrio un error al ejecutar la consulta: {$conexion->connect_error}";
        }
        echo $conexion->connect_error;
        // Verificacion de conexion.


        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $asunto = $_POST['asunto'];
        $detalle = $_POST['detalle'];


        $conexion->query("INSERT INTO contacto (Nombre, Telefono, Correo, Asunto, Detalle) VALUES ('$nombre', '$telefono', '$correo', '$asunto', '$detalle')");
        if($conexion->error != ''){
            echo "Ocurrio un error al ejecutar la consulta: {$conexion->error}";
        }


        

        //cierre de conexion.
        $conexion->close();
    }
   /*echo "<script>
            var carrito = [];

            boton.addEventListener('Click', function(e){
                 e.target.parentNode;
                })

            console.log(boton);
            boton.push('carrito');
            localStorage.setItem('carrito');
         </script>";*/
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
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
        li{
            list-style: none;
            }
        footer {
            display: block;
            margin: 0;
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
        .formulario{
            display: contents;
            }
        .consulta-bd{
            width: 650px; 
            display: flex; 
            flex-direction: row; 
            justify-content: space-around; 
            flex-wrap: wrap;
            }
        .formulario_contacto {
            width: 650px;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-content: center;
            border: 2px solid #2b2baa;
            border-radius: 10px;
            padding-top: 10px;
            }
        .formulario_contacto > .formulario > div {
           margin-bottom: 10px;
        }
        .formulario_contacto > .formulario > div > input {
            border-radius: 3px;
            border: 1px solid #2b2baa;
        }
        .formulario_contacto > .formulario > div > textarea {
            border-radius: 3px;
            border: 1px solid #2b2baa;
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
        <div class="formulario_contacto">
            <form class="formulario" method="POST" action="contacto.php">
                <div>
                    <label for="nombre">Nombre Completo:</label>
                    <input id="nombre" type="text" name="nombre" placeholder="Ingrese su nombre">
                </div>
                <div> 
                    <label for="telefono">Numero de contacto:</label>
                    <input id="telefono" type="tel" name="telefono" placeholder="Ingrese su número de telefono">
                </div>
                <div>
                    <label for="correo">Correo Electronico:</label>
                    <input id="correo" type="email" name="correo" placeholder="Ingrese su correo electronico">
                </div>
                <div>
                    <label for="asunto">Asunto:</label>
                    <input id="asunto" type="text" name="asunto" placeholder="Ingrese el asunto">
                </div>
                <div>
                    <label for="detalle">Detalle:</label>
                    <br>
                    <textarea id="detalle" name="detalle" rows="5" cols="33" maxlength="250" value="detalle"></textarea>
                </div>
                <br>
                <div>                    
                    <input type="submit" name="enviar">
                </div>
            </form>
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