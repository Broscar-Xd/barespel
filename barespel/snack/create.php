<?php
    //conexion a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "barespel";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (isset($_POST["sna_nombre"])) {
        $bar_id=$_POST["bar_id"];
        $sna_nombre=strtoupper($_POST["sna_nombre"]);
        $sna_precio=$_POST["sna_precio"];
        $sna_disponible=$_POST["sna_disponible"];    
        // Create connection
        $sql = "INSERT INTO snack (sna_id,bar_id,sna_nombre,sna_precio,sna_disponible) VALUES(0,".$bar_id.",'".$sna_nombre."',".$sna_precio.",".$sna_disponible.")";//* es para seleccionar todos los datos de la tabla bar
        ECHO $sql;
        $conn->query($sql);
        $conn->close();
        header("Location: index.php");
    }
    $sql = "SELECT * FROM bar ORDER BY bar_nombre";//* es para seleccionar todos los datos de la tabla bar
    $result_bar = $conn->query($sql);
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Snack</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container" >
        <div class="row">
            <div class="col">
                <h1 class ="text-center">CREAR SNACK</h1>
            </div>
        </div>
        <form action="create.php"method="POST">
            <div class="row border">
                <div class="col">
                    <div class="form-group">
                        <label for="bar_id">Bar</label>
                        <select class="custom-select"id="bar_id" name="bar_id">
                            <?php while($row=$result_bar-> fetch_assoc()){ ?>
                            <option value="<?php echo $row["bar_id"]?>"><?php echo $row["bar_nombre"]?></option>
                            <?php } ?>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="sna_nombre">Nombre</label>
                        <input type="text" class="form-control" id="sna_nombre" name="sna_nombre">
                    </div>
                    <div class="form-group">
                        <label for="sna_nombre">Precio</label>
                        <input type="text" class="form-control" id="sna_precio" name="sna_precio">
                    </div>
                    <div class="form-group">
                        <label for="sna_disponible">Disponible</label>
                        <input type="radio" class="form-control" id="sna_disponible" name="sna_disponible" value="1">
                        <label for="sna_disponible">No Disponible</label>
                        <input type="radio" class="form-control" id="sna_disponible" name="sna_disponible" value="0">
                    </div>      
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <br>
                    <input type="submit" class="btn btn-primary" value="Grabar">
                    <a href="index.php" class="btn btn-info">Salir</a>
                </div>
            </div>
        </form>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>