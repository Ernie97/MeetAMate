<?php
	session_start();
	require_once "includes/config.php";
    require_once "includes/usuario.php";
		$admin = false;
		$username = isset($_POST['username']) ? $_POST['username'] : null;
		$password = isset($_POST['password']) ? $_POST['password'] : null;

		if (empty($username) or empty($password)) {
			$_SESSION["LogIn"] = FALSE;
			header("Location: ../errorLogin.php");
		}
		else{
			$usuario = Usuario::buscaUsuario($username);
			if (!$usuario) {
			$_SESSION["LogIn"] = FALSE;
			header("Location: ../errorLogin.php");
	} else {
	    if ( $usuario->compruebaPassword($password) ) {
    		$_SESSION["LogIn"] = TRUE;
			$_SESSION["username"] = $username;
			$_SESSION["idUser"] = $usuario->ID_Usuario();
			$_SESSION["nombre"] = $usuario->Nombre_Usuario();
			$_SESSION["primerApellido"] = $usuario->Primer_Apellido();
			$_SESSION["segundoApellido"] = $usuario->Segundo_Apellido();
			$_SESSION["imagenPerfil"] = $usuario->Imagen_Perfil();
			$_SESSION["fechaNacimiento"] = $usuario->Fecha_Nacimiento();
			$_SESSION["email"] = $usuario->Correo();
			$_SESSION["telefono"] = $usuario->Telefono();
			$_SESSION["testCompletado"] = $usuario->Test();
			if($usuario->Es_Admin() == '1')
    			$_SESSION['esAdmin'] = true;

    		header('Location: ../index.php');
    		exit();
	    } else {
	    	$_SESSION["LogIn"] = FALSE;
			header("Location: ../errorLogin.php");
	    }
	}
	}		
		
?>