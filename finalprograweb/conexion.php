<?php

 function connectDB(){

    $serverName = "localhost";
    $dBUsername = "root";
    $sBPassword = "";
    $dBName = "finalweb";

    $conn = mysqli_connect($serverName,$dBUsername,$sBPassword,$dBName); //creamos conexion nueva
    
    if ($conn->connect_error) { // Si hay un error corto la conexion y muestro el error
        die("Conexion fallida: " . $conn->connect_error); 
    }

    return $conn; // retornamos la conexion creada
}

function disconnectDB($conn){
    $conn->close(); // desconecta la conexion 
}