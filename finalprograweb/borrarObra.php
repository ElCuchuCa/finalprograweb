<?php
if(isset($_POST['deleteproduct'])){ // si esta seteado el boton de borrar
    include('connection.php');
    $conn = connectDB();

    $idPrenda = $_GET['obra']; // obra a borrar
    $sql="DELETE FROM obras WHERE idObra=$idObra";

    if($conn->query($sql) === FALSE){
        header("Location: index.php?error=query_error"); // si hay error en el pedido, retornamos a index con error
        exit();
    }
    else{
        header('Location: ' . $_SERVER['HTTP_REFERER']); // redireccionamos a la pagina en la que se realiza el procedimiento
        exit();
    }
}
?>