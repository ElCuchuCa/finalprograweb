<?php
	include_once 'inicio.php'; //Incluyo la parte de arriba (Titulo y login)
	session_start(); //Creamos la sesión o continua la ya creada basada en un identificador pasado por POST o GET o via coookie
?>

<div id="slideshow-container"> <!-- slider de imagenes -->
	<div class="mySlides fade">
		<img src="../finalprograweb/Fotos/Colon4.jpg" style="width:100%">
	</div>
	<div class="mySlides fade">
		<img src="../finalprograweb/Fotos/Colon5.jpg" style="width:100%">
	</div>
	<div class="mySlides fade">
		<img src="../finalprograweb/Fotos/Colon6.jpg" style="width:100%">
	</div>
</div>

if(isset($_GET["error"])){ // si en el arreglo asociativo hay algun error...

	if($_GET["error"]=="query_error"){ // error en el pedido a la base de datos
		print <<< END
			<script type="text/javascript">  
				setTimeout(function(){			
				alert("Error. Intente de nuevo"); 
				},250);
			</script>
		END;
		// a los 250 ms aparece el alert
}
else if($_GET["error"]=="email_exists"){ // si el email ya existe...
	print <<< END
		<script type="text/javascript">
			setTimeout(function(){				// Set 250ms timeout till execute next line
			alert("Error. El email ya está registrado.");
			},250);
		</script>
	END;
}
else if($_GET["error"]=="email_not_exists"){ // si el email no existe...
	print <<< END
		<script type="text/javascript">
			setTimeout(function(){				// Set 250ms timeout till execute next line
			alert("Error. El email no esta registrado en nuestra base de datos.");
			},250);
		</script>
	END;
}

else if($_GET["error"]=="incorrect_pwd"){ //si la contraseña es incorrecta
	print <<< END
		<script type="text/javascript">
			setTimeout(function(){				// Set 250ms timeout till execute next line
			alert("Contraseña incorrecta!");
			},250);
		</script>
	END;
}	

}

else if(isset($_GET["register"])){ // si el boton de registrarse esta seteado
if($_GET["register"] == "success"){ //si el registro es exitoso
	print <<< END
		<script type="text/javascript">
			setTimeout(function(){				// Set 250ms timeout till execute next line
				alert("¡Registro exitoso!");
			},250);
		</script>
		
	END;
	}
}

else if(isset($_GET["login"])){ // si el boton de logueo esta seteado
if($_GET["login"] == "success"){ //si el logueo es exitoso
	print <<< END
		<script type="text/javascript">
			setTimeout(function(){				// Set 250ms timeout till execute next line
				alert("¡Logueo exitoso!");
			},250);
		</script>
		
	END;
	}
}
?>

<?php
	include_once 'footer.php'; //Incluyo la parte de abajo y archivos js
?>