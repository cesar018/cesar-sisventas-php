<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Documento</title>
</head>
<body>
<section class="container mt-5 cont">
            <form method="post" class="row">
                <div class="form-group col-md-3"> 
                    <label class="control-label" for="date"></label>
                    <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="date"/>
                </div>
                <div class="form-group col-md-3">
                    <label class="control-label" for="date"></label>
                    <input class="form-control" id="date1" name="date" placeholder="MM/DD/YYY" type="date"/>
                </div>
                <div class="form-group col-md-3 mt-4">
                    <select class="form-select" id="traerid" aria-label="Default select example">
                        <?php
                         require "conexion.php";
                         $resp = mysqli_query($conex, "select *from cliente");
                         while($row = mysqli_fetch_array($resp)){
                             $nombres=$row["nombres"]; 
                             $apellidos=$row["apellidos"];
                             $idcliente=$row["idcliente"];
                             ?>
                             <option value="<?php echo $idcliente ?>"><?php echo $nombres," ",$apellidos?> </option>
                             <?php
                             
                         }
                    ?>
                    </select>
                </div>
                <div class="form-group col-md-3 mt-4">
                    <button type="button" id="button"  class="btn btn-danger">Generar Reporte</button>
                </div>
            </form>
    </section> 

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script>
    $(document).ready(function(){
        $("#button").on("click",function(){
            var gi = $("#traerid").val();
            var fi = $("#date").val();
            var ff = $("#date1").val();
            $.ajax({
            url: "detalle.php",
            type: 'POST',
            data: {gi:gi,fi:fi,ff:ff},
            dataType: "dataType",
            success: function (response) { }
        });
        })
    });
    </script>
</body>
</html>