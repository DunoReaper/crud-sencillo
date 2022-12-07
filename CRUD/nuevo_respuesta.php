<?php
    
    include("conexion.php");

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $name = $_POST["nombre"];
    $email = $_POST["correo"];
   
    $pass = $_POST["contraseña"];
    $consulta = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES ('".$name."', '".$email."','".$pass."')";
    $query = $bd->prepare($consulta);
    $query->execute();

    header("Location:ver.php");

    //
?>