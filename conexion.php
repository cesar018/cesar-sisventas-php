<?php
    $conex = new mysqli("localhost", "root", "", "ventas");
    if($conex->connect_errno){
        die("Error");
    }else{
        echo "Conexión exitosa";
    }
?>