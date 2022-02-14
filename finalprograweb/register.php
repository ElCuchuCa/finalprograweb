<?php
    if(isset($_POST['register'])){ // verificamos si el boton de registro esta seteado
        include('connection.php');
        $conn = connectDB();

        // guardamos en variables lo tomado en el formulario
        $email = mysqli_real_escape_string($conn,$_POST["email"]);
        $name = mysqli_real_escape_string($conn,$_POST["name"]);
        $password = mysqli_real_escape_string($conn,$_POST["password"]);
        $passwordhashed = password_hash($password, PASSWORD_DEFAULT); // encripta la contraseña
    
        $sql = "SELECT * FROM usuarios WHERE email = '$email'"; // estructura del pedido sql para ver si hay algun mail
                                                                // en la base 
    
        if($conn->query($sql) === FALSE){ // comprobamos si hay algun error en el pedido
            header("Location: index.php?error=query_error");
            exit();
        }
        if(mysqli_num_rows($conn->query($sql)) == 1){ // si ya existe una fila con el email pasado por parametro
            header("Location: index.php?error=email_exists"); // el email ya esta registrado
            exit();
        }
        else{
            $query = "INSERT INTO usuarios (email,nombre,password,idPerfil) VALUES ('$email','$name','$passwordhashed',2)";
            // estructura para insertar en la tabla usuarios las variables del formulario
            if($conn->query($query) === TRUE){ // si no hay error en el pedido
                header("Location: index.php?register=success"); // registro exitoso
                exit();
            }
            else{
                header("Location: index.php?error=query_error");  // error en el pedido
                exit();
            }  
        }
        disconnectDB($conn);
    }

    else{
        header("Location: index.php"); //me mantengo en el index
        exit();
    }
    

?>