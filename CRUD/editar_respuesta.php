<?php
    
    include("conexion.php");

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $name = $_POST["nombre"];
    $email = $_POST["correo"];
    
    $pass = $_POST["password"];
    $id = $_POST["id"];

    $consulta = "UPDATE usuarios SET nombre = '" . $name . "', correo = '" . $email. "', contraseña = '" . $pass . "' WHERE id = " . $id;
    $query = $bd->prepare($consulta);

    $query->execute();

    header("Location:ver.php");

    
?>