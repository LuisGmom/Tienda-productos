<?php

    if (!empty($_POST['usrmail']) && !empty($_POST['pass'])){

        //Alamcenamiento
        $conexion = new mysqli('localhost', 'root', '', 'tienda');


        if($conexion->connect_errno == 0){
            
            //conexion establecida

            $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

            $conexion->query("INSERT INTO usuarios(usuario, pass) VALUES ('{$_POST['usrmail']}', '$password' )");
            if ($conexion->error == ''){
                echo "Datos alamcenados";
            }
            else{
                echo "Error al almacenar";
            }

        }
        else{
            echo "Error de conexión $conexion->connect_error";
        }
        $conexion->close();
    }
    else{
        echo 'Falta informacion';
    }
?>