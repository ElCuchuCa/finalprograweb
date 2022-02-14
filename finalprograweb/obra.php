<?php
	session_start(); //Creamos la sesión o continua la ya creada basada en un identificador pasado por POST o GET o via coookie
	include_once('header.php'); //Incluímos la startpage (login y register)
?>


<?php

function checkAdmin(){  //verificamos si la idPerfil es 1 (admin) o 2 (usuario)
    if(isset($_SESSION['idPerfil'])){
        if($_SESSION['idPerfil'] == 1){
            return true;
        }
    }
}

include('mostrarObras.php');   // incluimos el php necesario para mostrar las obras


$subcategoria = $_GET["subcategoria"];  //obtenemos la subcategoria que fue clickeada

if(checkAdmin()){ //si es admin puede agregar y borrar elementos 
    print <<< END
        <div id="obra-container">
            <button id="add-obra-btn" onclick="document.getElementById('add-obra-div').style.display='block'">Agregar obra
            </button>
        <div id="add-obra-div">
            <span onclick="document.getElementById('add-obra-div').style.display='none'" class="close"
                title="Cerrar">&times;</span>
            <form method="POST" action="cargarObra.php?subcategoria=$subcategoria">
                <div class="form-upload">
                    <label>Nombre de la obra</label>
                    <input type="text" name="nombreObra" class="input-style" id="obra-name" title="Ingrese nombre." required>
                </div>

                <div class="form-upload">
                    <label>Ingrese precio ($)</label>
                    <input name="precioObra" type="text" class="input-style" pattern="^[0-9]+$" id="obra-price"
                        onkeyup="validatePrice(document.getElementById('obra-price'))" title="Ingrese precio."
                        required>
                    <span class="is-valid"></span>
                </div>

                <div class="form-upload" style="width: 90%;">
                    <label>Ingrese nombre archivo de imagen</label>
                    <input name="imagenObra" type="text" class="input-style" id="obra-img" title="Ingrese imagen." required>
                    <span id="example">Ej: remeragris1.jpg</span>
                </div>
                <input name="cargarObra" type="submit"  id="obra-done" value="Agregar obra"></input>
            </form>
        </div>
        END;
}

if($_GET["subcategoria"] == "cat_comedia"){  //obtenemos la subcategoria y agregamos los elementos a la pagina correspondiente
    print <<< END
        <div id="sub-category">
            <div id="t-shirt-text">
                <p id="catText">Comedia</p>
            </div>
        </div>
    END;

    mostrarObra(); // mostramos la obra correspondiente a su categoria
}
else if($_GET["subcategoria"] == "cat_musical"){ //obtenemos la subcategoria y agregamos los elementos a la pagina correspondiente
    print <<< END
        <div id="sub-category">
            <div id="t-shirt-text">
                <p id="catText">Musical</p>
            </div>
        </div>
    END;

    mostrarObra();
}
else if($_GET["subcategoria"] == "cat_opera"){  //obtenemos la subcategoria y agregamos los elementos a la pagina correspondiente
    
    print <<< END
        <div id="sub-category">
            <div id="t-shirt-text">
                <p id="catText">Opera</p>
            </div>
        </div>
    END;

    mostrarObra();
}
else if($_GET["subcategoria"] == "cat_monologo"){  //obtenemos la subcategoria y agregamos los elementos a la pagina correspondiente
    
    print <<< END
        <div id="sub-category">
            <div id="t-shirt-text">
                <p id="catText">Monologo</p>
            </div>
        </div>
    END;

    mostrarObra();
}
?>

<?php
    include_once('footer.php'); //Incluye el footer y los scripts de javascript
?>