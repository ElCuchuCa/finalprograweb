<?php
	include_once 'header.php'; //Incluyo la parte de arriba (Titulo y login)
?>

<section class="signup-form">
    <h2>Sign up</h2>
    <form action="signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Nombre Completo">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="contraseña" placeholder="Contraseña">
        <input type="text" name="contraseña2" placeholder="Repita la Contraseña">
        <button type="submit" name="submit"> Registrarse </button>
    </form>
</section>
<?php
	include_once 'footer.php'; //Incluyo la parte de abajo y archivos js
?>