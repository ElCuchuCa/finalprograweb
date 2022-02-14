<?php
if(isset($_POST['login'])){ // verificamos si el boton de logeo esta seteado
    include('conexion.php'); // incluimos la conexion a la base de datos
 
    $conn = connectDB(); // creamos la conexion

    $email = mysqli_real_escape_string($conn,$_POST['email']); // tomamos el email del formulario del login
                                                              // con mysqli_real_escape_string evitamos una sql inyection
                                                              // evitando los caracteres especiales de SQL
                                                           
    $password = mysqli_real_escape_string($conn,$_POST['password']); //tomamos la contraseña del formulario del login

    $sql = "SELECT * FROM usuarios WHERE email='$email'"; // estructura del pedido sql

    if($conn->query($sql) === FALSE){ // comprobamos si hay errores en el pedido a la base de datos
        header("Location: index.php?error=query_error"); // si hay algun error, redireccionamos a index con el error
        exit();
    }

    else{
        if($row = mysqli_fetch_assoc($conn->query($sql))){ // obtiene la fila y la almacena en $row (arreglo)
            $correctpwd = password_verify($password,$row['password']);  //verificamos si la contraseña es correcta
            if($correctpwd == false){
                header("Location: index.php?error=incorrect_pwd");  //si es falsa tira error y sale
                exit();
            }
            else if($correctpwd == true){  //si es correcta empieza una sesión con los datos de la base de datos
                session_start();
                // a cada variable de sesion le almaceno su correspondiente en la base de datos
                $_SESSION['idUsuario'] = $row['idUsuario'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['idPerfil'] = $row['idPerfil'];
                header("Location: index.php?login=success"); // redirecciono al index con logeo exitoso
                exit();
            }
            else{
                header("Location: index.php?error=incorrect_pwd"); // redireccionamos con el error de contraseña incorrecta
                exit();
            }
        }
        else{
            header("Location: index.php?error=email_not_exists"); // si no se encuentra ninguna fila en la db, redireccionamos
                                                            // con el error de email no existe.
            exit();
        }
    }
    disconnectDB($conn); //desconecto la conexión
}


else{
    header("Location: index.php"); //me mantengo en el index
    exit();
}
?> 

