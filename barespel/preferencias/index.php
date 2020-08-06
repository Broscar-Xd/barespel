<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "barespel";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT men_nombre,pre_id,pre_fecha,pre_observacion "
     ."FROM preferencias p,menu c "
     ."WHERE p.men_id=c.men_id ";
     $result = $conn->query($sql);
    if(isset($_GET["mensaje"]))
        $mensaje=$_GET["mensaje"];
    else
        $mensaje="";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">
        body {
        background-image: url(https://cdn.pixabay.com/photo/2014/12/21/23/24/spare-ribs-575310__340.png);
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row bg-danger">
            <div class="col">
            <h1 class="text-center">PREFERENCIAS</h1>
            </div>
        </div>
         <!-- Espacio para mensajes-->
    <div class="row">
        <div class="col">
            <p class="text-danger" ><?php echo $mensaje?></p>
          
        </div>
    </div>
    <!-- FIN -->
    <div class="row">
        <div class="col">
         
        <table class="table table-danger">
            <thead class="thead-dark">
        <tr>
            <th>Ord</th>
            <th>Menu</th>
            <th>Fecha</th>
            <th>Observacion</th>
            <th>Operaciones</th>
        </tr>
            </thead>
        <?php
         $ord=1;
            while($row = $result->fetch_assoc()) {
        ?>

        <tr>
            <td><?php echo $ord++; ?></td>
            <td><?php echo $row["men_nombre"] ;?></td>
            <td><?php echo $row["pre_fecha"] ;?></td>
            <td><?php echo $row["pre_observacion"] ;?></td>
            <td class="text-center">
            <a class="btn btn-info" href="view.php?pre_id=<?php echo $row["pre_id"]?>" >Ver</a> 
            <a class="btn btn-danger" href="delete.php?pre_id=<?php echo $row["pre_id"]?>">Eliminar</a>
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
             
            <a href="../index.php"><button type="button" class="btn btn-info">Regresar</button></a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>  
</body>
</html>