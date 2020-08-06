<?php
    //conexion a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "barespel";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (isset($_POST["men_nombre"])) {
        $men_id=$_POST["men_id"];
        $bar_id=$_POST["bar_id"];
        $men_nombre=strtoupper($_POST["men_nombre"]);
        $men_precio=$_POST["men_precio"];
        $men_disponible=$_POST["men_disponible"];
        $men_descripcion=$_POST["men_descripcion"];
        // Create connection
        $sql = "UPDATE menu SET bar_id=".$bar_id.",men_nombre='".$men_nombre."',men_descripcion='".$men_descripcion."',men_precio=".$men_precio.",men_disponible=".$men_disponible." WHERE men_id=".$men_id;
        ECHO $sql;
        $conn->query($sql);
        $conn->close();
        header("Location: index.php");
    }
    $men_id=$_GET["men_id"];
    $sql = "SELECT bar_nombre,b.bar_id,men_id,men_nombre,men_precio,men_disponible,men_descripcion FROM menu b,bar c WHERE men_id=".$men_id." AND b.bar_id=c.bar_id ";//* es para seleccionar todos los datos de la tabla bar
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row["men_disponible"]==1) {
        $abierto="checked";
        $cerrado="";
    }else{
        $abierto="";
        $cerrado="checked";
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
    <title>Crear Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container" >
        <div class="row">
            <div class="col">
                <h1 class ="text-center">ACTUALIZAR MENU</h1>
            </div>
        </div>
        <form action=""method="POST">
            <div class="row border">
                <div class="col">
                    <div class="form-group">
                        <label for="bar_id">Bar</label>
                        <select class="custom-select"id="bar_id" name="bar_id">
                            <?php while($row_bar=$result_bar-> fetch_assoc()){ ?>
                            <option value="<?php echo $row_bar["bar_id"]?>"<?php if ($row["bar_id"]==$row_bar["bar_id"]) {
                                echo "selected";
                            }?>>
                            <?php echo $row_bar["bar_nombre"]?></option>
                            <?php } ?>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="men_nombre">Nombre</label>
                        <input type="text" class="form-control" id="men_nombre" name="men_nombre" value="<?php echo $row["men_nombre"]?>" >
                    </div>
                    <div class="form-group">
                        <label for="men_nombre">Precio</label>
                        <input type="text" class="form-control" id="men_precio" name="men_precio" value="<?php echo $row["men_precio"]?>">
                    </div>
                    <div class="form-group">
                        <label for="men_disponible">Disponible</label>
                        <input type="radio" class="form-control" id="men_disponible" name="men_disponible" value="1" <?php echo $abierto?>>
                        <label for="sna_disponible">No Disponible</label>
                        <input type="radio" class="form-control" id="men_disponible" name="men_disponible" value="0" <?php echo $cerrado?>>
                    </div>     
                    <div class="form-group">
                        <label for="men_descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="men_descripcion" name="men_descripcion" value="<?php echo $row["men_descripcion"]?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <br>
                    <input type="hidden" name="men_id" value=<?php echo $row["men_id"]?>>
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