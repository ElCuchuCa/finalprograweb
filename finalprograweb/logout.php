<?php
session_start(); // mantengo la sesion creada
session_unset(); // libera todas las variables de sesion almacenadas
session_destroy(); // destruimos por completo la sesion
header("Location: index.php"); // redireccionamos a index
?>