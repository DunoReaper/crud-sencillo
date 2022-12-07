<?php
	include('conn.php');
	if(isset($_POST['susername'])){
		$username=$_POST['susername'];
		$correo=$_POST['correo'];
		$password=$_POST['spassword'];

		$query=$conn->query("select * from user where username='$username'");

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
			$conn->query("insert into user (username, password, correo) values ('$username', '$password','$correo')");
			?>
  				<span>Regístrado con éxito.</span>
  			<?php 
		}
	}
?>