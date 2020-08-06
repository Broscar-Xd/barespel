<?php
    // Create connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "barespel";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (isset($_POST["buz_id"])) {
        $buz_id=$_POST["buz_id"];
        $bar_id=$_POST["bar_id"];
        $buz_fecha=$_POST["buz_fecha"];
        $buz_descripcion=$_POST["buz_descripcion"];
        // Create connection
        $sql = "UPDATE buzon SET bar_id=".$bar_id.",buz_fecha='".$buz_fecha."',buz_descripcion='".$buz_descripcion."' WHERE buz_id=".$buz_id;
        ECHO $sql;
        $conn->query($sql);
        $conn->close();
        header("Location: index.php");
    }
    $buz_id=$_GET["buz_id"];
    $sql = "SELECT bar_nombre,b.bar_id,buz_id,buz_fecha,buz_descripcion FROM buzon b,bar c WHERE buz_id=".$buz_id." AND b.bar_id=c.bar_id ";//* es para seleccionar todos los datos de la tabla bar
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();//fetch assoc es para extraer un resultado y ponerlo en una row

    $sql = "SELECT * FROM bar ORDER BY bar_nombre";//* es para seleccionar todos los datos de la tabla bar
    $result_bar = $conn->query($sql);
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
                <h1 class="text-center">ACTUALIZAR BUZON</h1>
            </div>
        </div>

        <form action=""method="POST">
            <div class="row border">
                <div class="col">
                    <div class="form-group">
                        <label for="bar_id">Bar</label>
                        <select class="custom-select"id="bar_id" name="bar_id">
                            <?php while($row_bar=$result_bar-> fetch_assoc()){ ?>
                            <option value="<?php echo $row_bar["bar_id"]?>" <?php if ($row["bar_id"]==$row_bar["bar_id"]) {
                                echo "selected";}?>>
                                <?php echo $row_bar["bar_nombre"]?></option>
                            <?php } ?>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="buz_fecha">Fecha</label>
                        <input type="date" class="form-control" id="buz_fecha" name="buz_fecha" value="<?php echo $row["buz_fecha"]?>" required>
                    </div>
                    <div class="form-group">
                        <label for="buz_descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="buz_descripcion" name="buz_descripcion" value="<?php echo $row["buz_descripcion"]?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <br>
                    <input type="hidden" name="buz_id" value=<?php echo $row["buz_id"]?>>
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