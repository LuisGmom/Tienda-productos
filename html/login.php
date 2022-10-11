<?php

    session_start();



    if (!empty($_POST['usrmail']) && !empty($_POST['pass'])){

        //Alamcenamiento
        $conexion = new mysqli('localhost', 'root', '', 'tienda');


        if($conexion->connect_errno == 0){
            
            //conexion establecida

            $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

            $result = $conexion->query("SELECT usuario, pass FROM usuarios WHERE usuario = '{$_POST['usrmail']}'");
            
            //var_dump($resultado);

            if ($conexion->error == ''){
                
                    $datos = $result->fetch_assoc();

                    if($datos){
                        
                        $resultado = password_verify($_POST['pass'], $datos['pass']);
                        
                        if($resultado){
                            $_SESSION['usrmail'] = $datos['usuario'];
                            header('Location: index.html');
                        }           
                    }
                    else
                    {
                        echo 'El usuario no existe.';
                    }
            }
            else{
                echo "Error al almacenar";
            }

            $conexion->close();
        }
        else{
            echo "Error de conexión: $conexion->connect_error";
        }
    }
    else{
        echo 'Falta informacion para hacer el login';
    }
?>