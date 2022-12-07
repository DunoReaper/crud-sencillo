<?php
    include("conn.php");

    //Paso 1.
    $consulta = "SELECT * FROM clientes";

    //Paso 2.
    $query = $conn->prepare($consulta);

    //Paso 3.
    $query->execute();

    //Paso 4. Traer la información de la cosulta
    $usuarios = $query->get_result();
    $data = $usuarios->fetch_all(MYSQLI_ASSOC);


?>

<html>
    <head>
        <title>Ver Lista</title>
        <meta charset="utf-8">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> 
        <style>
            
            body{
                padding: 20px;
            }
            
            tr{
              text-align: center;
            }
            
            .icon-borrar{
                width: 20px;
                cursor: pointer;
            }
            
            .icon-edit{
                width: 30px;
                cursor: pointer;
            }
        </style>
    </head>
    
    <body>
        
        <h1> Lista de Usuarios</h1>
        
        <table border="2" class="table table-striped">
            <tr>
                
                <td>Nombre</td>
                <td>Correo</td>
                <td>Telefono</td>
                <td>Direccion</td>
                <td>Nombre_Negocio</td>
                <td>Direccion_Negocio</td>
                <td>Contraseña</td>
                
            </tr>
            
            <?php 
                for($x=0; $x < count($data); $x++){
            ?>  
                <tr>
                    
                    <td><?php echo $data[$x]["username"]; ?></td>
                   
                    <td><?php echo $data[$x]["correo"]; ?></td>
                    <td><?php echo $data[$x]["telefono"]; ?></td>
                    <td><?php echo $data[$x]["direccion"]; ?></td>
                    <td><?php echo $data[$x]["Nombre de negocio"]; ?></td>
                    <td><?php echo $data[$x]["Direccion de negocio"]; ?></td>
                    


                    

                     <td><?php echo $data[$x]["password"]; ?></td>
                    
                </tr>
            <?php
                }
            ?>
            
        </table>
        
        <br><br>
        
        <a class="btn btn-primary" href="http://localhost/IRD-33/SITIO/index.php">Regresar a Home</a>
    
        <script>
            
            $(".icon-edit").click(function(){
               
                var id = $(this).attr("usid");
                
                window.location = "editar.php?id=" + id;
                
            });
            
            $(".icon-borrar").click(function(){
                
                var idx = $(this).attr("usid");
                
                if(confirm("¿Seguro que deseas eliminar a este Usuario?")){ 
                    window.location = "eliminar.php?id=" + idx; 
                }
                
            });
        
            
        </script>
    </body>
    
</html>