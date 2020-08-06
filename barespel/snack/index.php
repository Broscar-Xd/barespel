<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barespel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM snack";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
    body {
    background-image: url(https://cdn.pixabay.com/photo/2018/06/29/08/15/doodle-3505459_960_720.png);
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Snacks</title>
</head>
<body>
    <div class="container">
        <div class="row bg-success" align="center">
            <div class="col">
                <h1> Snacks </h1>
            </div>
        </div>
        <div class="row">
        <br>
        <br>
        <br>
            <div class="col">
            <table class="table table-primary">
                    <tr>
                        <th>Ord</th>
                        <th>Bar</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Dispinible</th>
                        <th>Operaciones</th>
                    </tr>
                    <?php
                    $ord=1;
                        while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $ord++; ?></td>
                        <td><?php echo $row["bar_id"]; ?></td>
                        <td><?php echo $row["sna_nombre"]; ?></td>
                        <td><?php echo $row["sna_precio"]; ?></td>
                        <td><?php echo $row["sna_disponible"]; ?></td>
                        <td><a href="view.php?sna_id=<?php echo $row["sna_id"]?>" class="btn btn-info">Ver</a> 
                            <a href="update.php?sna_id=<?php echo $row["sna_id"]?>" class="btn btn-warning">Editar</a> 
                            <a href="delete.php?sna_id=<?php echo $row["sna_id"]?>" class="btn btn-danger">Eliminar</a>
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