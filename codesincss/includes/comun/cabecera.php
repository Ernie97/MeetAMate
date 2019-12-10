<ul class ="responsive-bar w3-dark-blue">
<?php
	if (isset($_SESSION["LogIn"]) && ($_SESSION["LogIn"]===true)) {
?>
	
		<li class="right"><a class="w3-text-white w3-hover-sand" href= "perfil.php"><?php echo $_SESSION["username"]; ?> </a></li>
		<li class="right"><a class="w3-text-white w3-hover-sand" href='peticion.php'>Notificaciones</a></li>	
		<li class="right"><a class="w3-text-white w3-hover-sand" href='logout.php'>Salir</a></li>	

	<?php
	}
	 else {
	?>
		<li class="right"><a class="w3-text-white w3-hover-sand" href='login.php'>Login</a></li>
		<li class="right"><a class="w3-text-white w3-hover-sand" href='registro.php'> Registrarse</a></li>
	<?php
	}
	?>

		<li><a class="w3-text-white w3-hover-sand" href="index.php">Inicio</a></li>
		<li><a class="w3-text-white w3-hover-sand" href="alojamientos.php">Alojamiento</a></li>
		<li><a class="w3-text-white w3-hover-sand" href="ocio.php">Ocio</a></li>
</ul>








