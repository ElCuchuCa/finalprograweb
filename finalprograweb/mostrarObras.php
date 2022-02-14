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


function imprimirRopa($idObra,$imagen,$desc,$precio){ // imprimimos la ropa de la base de datos
    print <<< END
        <div class="product" id="$idObra">
            <div class="product-image">
                <a class="product-href" href="#"><img src="../img/Ropa/$imagen">
                </a>
            </div>
            <div class="product-description">
                <a href="#"><span class="description">$desc</span></a>
                <br>
                <span class="price">$$precio</span>
                <br>
                <button class="buy" type="button">Comprar</button>
            </div>
        END;
    if(checkAdmin()){ // si es admin muestra el boton para borrar productos
        print <<< END
            <form method="POST" action="borrarRopa.php?prenda=$idObra">
                <input type="submit" name="deleteproduct" style="margin:10px 0;"value="Borrar producto de base de datos">
            </form>
        
        END;
        }
    print <<< END
        </div>
    END;
}



function mostrarObra(){
    include('connection.php');

    $conn = connectDB();

    $arrIdCat = getCat();
    $idCategoria = $arrIdCat[0]; // tomamos el id de categoria actual

    $sql = "SELECT * FROM obras WHERE idCategoria = '$idCategoria'"; // estructura pedido sql
    $result = $conn->query($sql); // resultado del pedido

    $i=0;
    $arrRow=[]; // arreglo de filas de la base de datos

    if($result === FALSE){ // si hay error en el pedido
        header("Location: index.php?error=query_error"); // redirecciono con el error
        exit();
    }
    if($result == TRUE){
        $row = mysqli_fetch_assoc($result); // arrelgo asosiativo con las filas
        
        while(isset($row)){ // mientras que haya filas, las meto en un arreglo
            $arrRow[$i]=$row ;
            $row = mysqli_fetch_assoc($result);
            $i++;
        }
        mysqli_free_result($result); // liberamos el resultado

        $lenArrRow = count($arrRow) - 1; // cantidad de filas

        while($lenArrRow>=0){ // mientras que haya filas...
            // tomamos de la base de datos su variable correspondiente
            $idObra = $arrRow[$lenArrRow]['idObra'];
            $desc = $arrRow[$lenArrRow]['descripcion'];
            $precio = $arrRow[$lenArrRow]['precio'];
            $imagen = $arrRow[$lenArrRow]['img'];
            imprimirRopa($idObra,$imagen,$desc,$precio); // imprimimos la ropa respectiva

            $lenArrRow--; // restamos una fila para pasar a la proxima
        }       

    }

    disconnectDB($conn);
}

?>