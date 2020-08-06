<?php
    $sna_id= $_GET["sna_id"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "barespel";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT bar_nombre,sna_id,sna_nombre,sna_precio,sna_disponible FROM bar b,snack n WHERE sna_id=".$sna_id." AND b.bar_id=n.bar_id ";//* es para seleccionar todos los datos de la tabla bar
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();//fetch assoc es para extraer un resultado y ponerlo en una row
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Bar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container" >
        <div class="row">
            <div class="col">
                <h1 class="text-center">VER MENU</h1>
            </div>
        </div>

        <div class="row border">
            <div class="col">
                
                <div class="form-group">
                    <label for="cam_id" class="font-weight-bold">Bar</label>
                    <br>
                    <span id="bar_id"><?php echo $row["bar_nombre"];?></span>
                </div>
                <div class="form-group">
                    <label for="sna_nombre" class="font-weight-bold">Nombre</label>
                    <br>
                    <span id="sna_nombre"><?php echo $row["sna_nombre"];?></span>
                </div>
                <div class="form-group">
                    <label for="sna_precio" class="font-weight-bold">Precio</label>
                    <br>
                    <span id="sna_precio"><?php echo $row["sna_precio"];?></span>
                </div>
                <div class="form-group">
                    <label for="sna_disponible" class="font-weight-bold">Estado</label>
                    <br>
                    <span id="sna_disponible">
                        <?php if($row["sna_disponible"]==1) 
                                    echo "Disponible"; 
                                  else echo "No disponible";?>
                    </span>
                </div>
            </div>          
        </div>
            
        <div class="row">
            <div class="col">
                <br>
                <a href="index.php" class="btn btn-info">Salir</a>
            </div>
            
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>