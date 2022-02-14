<div id="header">
	<div id="logo">
		<h1><a href="index.php">SAUCOS THEATER</a></h1>
	</div>
	<div id="separate-header-items">
		<?php
			if(empty($_SESSION['idUsuario'])){ //Si no está logueado (no hay sesion), puede entrar a la cuenta
				print <<< END
				<div id='s-lg-buy'>
					<button onclick="document.getElementById('login-box').style.display='block', document.getElementById('register-box').style.display='none', document.getElementById('add-clothes-div').style.display='none'";'>Entrar</button>
				</div>
				END;
			}
			else{   //Si está logueado, puede Cerrar Sesión
				print <<< END
				<div id='s-lg-buy'>
						<form action="logout.php" method="POST"> <button type="submit" name="logout">Cerrar sesion</button></form>
					</div>
				END;
			}
		?>
	</div>
</div>

<div id="navegation-bar">  <!-- subcategorías, cada una abre una pagina diferente -->
    <ul>
        <li><a href="index.php">Inicio</a></li>

        <li class="dropdown">
            <a  class="dropbtn">Categorias</a>
            <div class="dropdown-content">
                <a href="obra.php?subcategoria=cat_comedia">Comedia</a> <!-- redirecciona a ropa con subcategoria correspondiente -->
                <a href="obra.php?subcategoria=cat_musical">Musical</a>
                <a href="obra.php?subcategoria=cat_opera">Opera</a>
                <a href="obra.php?subcategoria=cat_monologo">Monologo</a>
            </div>
        </li>
        
    </ul>
</div>