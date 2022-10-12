<?php
	session_start();
	include_once("conexion.php");	//Se incluye el archivo conexion.php, ahí esta la clase Conexion
	$login = new Conexion();	//Creacion de objeto Conexion
	$login->Conectar();			//Conexión a Base de datos
	mysqli_select_db($login->conexion, $login->SQL_DB) or die("Problemas para conectar con la base de datos");
	/*
	if( isset($_POST['usr']) && !empty($_POST['usr']) &&
			isset($_POST['pass']) && !empty($_POST['pass']) )
	*/
	$v = Validar();
	if($v == 0){
		$usr = $_POST['usr'];
		$contr = $_POST['pass'];
		$seleccion = $login->conexion->query("SELECT nomb_usr, pswrd, nombre, apellidoPat, apellidoMat, correo, numero, idTipo_usr FROM usuario WHERE nomb_usr =  '" . $usr. "'" , $connection);
		$consulta = mysqli_fetch_array($seleccion);
		if ($contr == $consulta['pswrd'])
		{
			// Datos de la consulta para utilizar en la pagina web, estos se almacenan en $_SESSION
			$_SESSION['nombre'] = $consulta['nombre'];
			$_SESSION['nomb_usr'] = $consulta['nomb_usr'];
			$_SESSION['apellidoPat'] = $consulta['apellidoPat'];
			$_SESSION['apellidoMat'] = $consulta['apellidoMat'];
			$_SESSION['correo'] = $consulta['correo'];
			$_SESSION['numero'] = $consulta['numero'];
			$_SESSION['pswrd'] = $consulta['pswrd'];
			$_SESSION['sesion'] = 1;
			//header('Location: ../principal.php');
			header('Location: ../principal/');	//Prueba
		}
		else
		{
			unset($_SESSION); 		//Se borra variable con datos de la sesion
			$login->Desconectar();			// Se cierra la conexión
			header('Location: ../index.html?error=1');
		}
	}
	else{
		header('Location: ../index.html?error=1');
	}
	function Validar(){
		$valido = "0";
		if(empty($_POST['usr']) ){
			$valido = "1";
		}else{
			if(empty($_POST['pass']) ){
				$valido = "1";
			}
		}
		return $valido;
	}
?>