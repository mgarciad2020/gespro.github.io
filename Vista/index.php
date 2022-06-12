<?php
session_start();

if (isset($_SESSION['usuario'])) {
	unset($_SESSION['usuario']);
	unset($_SESSION['id_trabajador']);
}

include_once '../Controlador/gestor.php';

	//var_dump($_POST);
	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		function login(){
			if($_POST['correo'] == "root@administrador.com"  && $_POST['spassword'] == 'root'){
				header('Location: /Gestor/Vista/Administrador/dashboardadmin.php');
			}else {
				loginSQL($_POST['correo'], $_POST['spassword']);	
			}
		}

		function loginSQL($user, $password){
			$item['usuario'] = $user;
			$item['contrasena'] = $password;
			$login = new Gestor();
			$result = $login->Login($item)->fetchAll();
			if(count($result) == 1){
				$_SESSION['usuario'] = $result[0]['usuario'];
				$_SESSION['id_trabajador'] = $result[0]['id_trabajador'];
				header('Location: /Gestor/Vista/Trabajador/dashboarduser.php');
			}
		}
		login();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GesPro - Iniciar Sesion</title>
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<img class="wave" src="wave.png">
	<div class="container">
		<div class="img">
			<img src="avatartrabajo.svg">
		</div>
		<div class="login-content">
			<form method="POST" id="loginForm">
				<img src="avatarlogin.svg">
				<h2 class="title">GesPro</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="email" id="email" name="correo" class="input" placeholder="Usuario">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" id="password" name="spassword" class="input" placeholder="Contraseña">
            	   </div>
            	</div>
				<br>
            	<input type="submit" class="btn" value="Iniciar Sesion">
            </form>
        </div>
    </div>
</body>
</html>