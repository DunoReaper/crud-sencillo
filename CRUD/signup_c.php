<?php
	include('conn.php');
	if(isset($_POST['susername'])){
		$username=$_POST['Nombre'];
		$correo=$_POST['correo'];
		$telefono=$_POST['telefono'];
		$dir=$_POST['direccion'];
		$nombreneg=$_POST['Nombre de negocio'];
		$dirneg=$_POST['Direccion de negocio'];
		$password=$_POST['spassword'];

		$query=$conn->query("select * from clientes where username='$username'");

		if ($query->num_rows>0){
			?>
  				<span>El nombre de usuario ya existe.</span>
  			<?php 
		}

		elseif (!preg_match("/^[a-zA-Z0-9_]*$/",$username)){
			?>
  				<span style="font-size:11px;">Nombre de usuario no válido. No se permiten espacios ni caracteres especiales.</span>
  			<?php 
		}
		elseif (!preg_match("/^[a-zA-Z0-9_]*$/",$password)){
			?>
  				<span style="font-size:11px;">Contraseña invalida. No se permiten espacios ni caracteres especiales.</span>
  			<?php 
		}
		else{
			$conn->query("insert into clientes (username,correo,telefono,direccion,Nombre de negocio,Direccion de negocio, password) values ('$username','$correo' ,'$telefono','$dir','$nombreneg','$dirneg','$password')");
			?>
  				<span>Regístrado con éxito.</span>
  			<?php 
		}
	}
?>