<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "barespel";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT bar_nombre,buz_id,buz_fecha,buz_descripcion FROM buzon b,bar c WHERE b.bar_id=c.bar_id ";//* es para seleccionar todos los datos de la tabla bar
    $result = $conn->query($sql);
    $conn->close();
    //validacion para ver si existia el mensaje
    if (isset($_GET["mensaje"])) {
        $mensaje=$_GET["mensaje"];
    }else {
        $mensaje="";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">
body {
    background-image: url(https://cdn.pixabay.com/photo/2017/05/31/23/44/email-marketing-2362038_1280.png);
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Buzon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row bg-secondary">
            <div class="col">
                <h1 class ="text-center">GESTIÓN DE BUZON</h1>
            </div>
        </div>
        <!-- Espacio para mensajes-->
        <div class="row">
            <div class="col">
                <p class ="text-danger" ><?php echo $mensaje ?></p>
            </div>
        </div>
        <!-- Fin espacio para mensajes-->
        <div class="row">
            <div class="col">
                
                <table class="table table-warning">
                    <tr>
                        <th class ="text-center">Ord</th>
                        <th>Bar</th>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th class ="text-center">Operciones</th>
                    </tr>
                    <?php
                        $ord=1;
                        while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td class ="text-center"><?php echo $ord++;?></td>
                        <td><?php echo $row["bar_nombre"]?></td>
                        <td><?php echo $row["buz_fecha"]?></td>
                        <td><?php echo $row["buz_descripcion"]?></td>
                        <td class ="text-center">
                            <a href="view.php?buz_id=<?php echo $row["buz_id"]?>" class="btn btn-info">Ver</a> 
                            <a href="update.php?buz_id=<?php echo $row["buz_id"]?>" class="btn btn-primary">Editar</a> 
                            <a href="delete.php?buz_id=<?php echo $row["buz_id"]?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
            
        </div>
        <div class="row">
            <div class="col">
            <a href="create.php"><button type="button" class="btn btn-primary">Nuevo</button></a>
            <a href="../index.php"><button type="button" class="btn btn-info">Regresar</button></a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>