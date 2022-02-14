<?php
function getCat(){ // nos devuelve el ID de categoria coincidente con la categoria en la que estamos
    $arrCat = array( // arreglo asociativo
        // clave => valor (el valor es la idCategoria de la DB)
        1 => "cat_comedia",
        2 => "cat_musical",
        3 => "cat_opera",
        4 => "cat_monologo",
    );

    for($i = 1 ; $i <= 4 ; $i++){ // recorremos el arreglo asociativo en busca de la categoria indicada
        if($arrCat[$i] == $_GET["subcategoria"]){
            return [$i,$arrCat[$i]]; // retornamos un arreglo asociativo con su ID de categoria y su nombre
        }
    }
}

    if(isset($_POST["cargarObra"])){ // si esta seteado el boton de cargar obra
        
        include("connection.php");
        $conn = connectDB();
        // tomamos las variables del formulario
        $nombreObra = mysqli_real_escape_string($conn,$_POST["nombreObra"]);
        $precioObra = $_POST["precioObra"];
        $imagenObra = mysqli_real_escape_string($conn,$_POST["imagenObra"]);
        
        $arrIdCategoria = getCat(); 
        $idCategoria = $arrIdCategoria[0]; // tomamos id categoria

        $sql = "INSERT INTO obras (idObra,descripcion,precio,img)
        VALUES ($idCategoria, '$nombreObra', $precioObra, '$imagenObra')";
        
        if($conn->query($sql) === FALSE){
            header("Location: index.php?error=query_error"); // si hay error en la carga, redirecciono con el error
            exit();
        }
        else{ // se carga la obra en la base de datos
            header("Location: obra.php?subcategoria=$arrIdCategoria[1]"); // redireccionamos a la subcategoria 
            exit();
        }    

    }
?>