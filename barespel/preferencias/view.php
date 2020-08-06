<?php 
    $pre_id = $_GET["pre_id"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "barespel";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT men_nombre,pre_id,pre_fecha,pre_observacion "
            ."FROM preferencias b,menu c "
            ."WHERE pre_id=".$pre_id." AND b.men_id=c.men_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Preferencias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">VER PREFERENCIAS</h1>
            </div>
        </div>
        <div class="row border">
            <div class="col">
            <div class="form-group">
                <label for="men_id" class="font-weight-bold">Nombre del Menu</label><br>
                <span id="men_id"><?php echo $row["men_nombre"]?></span>
            </div>    
            <div class="form-group">
                <label for="pre_fecha" class="font-weight-bold">Fecha de Publicacion</label><br>
                <span id="pre_fecha"><?php echo $row["pre_fecha"]?></span>
            </div>    
            <div class="form-group">
                <label for="pre_observacion" class="font-weight-bold">Obervaciones</label><br>
                <span id="pre_observacion"><?php echo $row["pre_observacion"]?></span>
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