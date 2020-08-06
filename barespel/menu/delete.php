<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "barespel";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (isset($_POST["btn_eliminar"])) {
        $men_id=$_POST["men_id"];
        $sql = "DELETE FROM menu WHERE men_id=".$men_id;
        $result = $conn->query($sql);
        if ($result==TRUE) {
            $mensaje="";
        }else {
            $mensaje="No se pudo eliminar el Registro";
        }
        $conn->close();
        header("location:index.php?mensaje=".$mensaje);
    }
    $men_id= $_GET["men_id"];
    // Create connection
    $sql = "SELECT bar_nombre,men_id,men_nombre,men_disponible,men_precio,men_descripcion FROM bar b,menu m WHERE men_id=".$men_id." AND b.bar_id=m.bar_id ";//* es para seleccionar todos los datos de la tabla bar
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
                <h1 class="text-center">ELIMINAR MENU</h1>
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
                    <label for="men_nombre" class="font-weight-bold">Nombre del plato</label>
                    <br>
                    <span id="men_nombre"><?php echo $row["men_nombre"];?></span>
                </div>
                <div class="form-group">
                    <label for="men_precio" class="font-weight-bold">Precio</label>
                    <br>
                    <span id="men_precio"><?php echo $row["men_precio"];?></span>
                </div>
                <div class="form-group">
                    <label for="men_disponible" class="font-weight-bold">Estado</label>
                    <br>
                    <span id="men_disponible">
                        <?php if($row["men_disponible"]==1) 
                                    echo "Disponible"; 
                                  else echo "No disponible";?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="men_descripcion" class="font-weight-bold">Descripcion</label>
                    <br>
                    <span id="men_descripcion"><?php echo $row["men_descripcion"];?></span>
                </div>
            </div>          
        </div>
            
        <div class="row">
            <div class="col">
                <br>
                <form action="" method="POST">
                    <input type="hidden" name="men_id" value=<?php echo $row["men_id"]?>>
                    <input type="submit" class="btn btn-danger" value="Eliminar" name="btn_eliminar">
                    <a href="index.php" class="btn btn-info">Salir</a>
                </form>
            </div>
            
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>