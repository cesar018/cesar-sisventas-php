<?php
    $gi=$_POST['gi'];
    $fi=$_POST['fi']; 
    $ff=$_POST['ff'];
    function imprimir($fechaini, $fechafin, $idcliente){
        require "conexion.php";
    $resp = mysqli_query($conex, "SELECT * from cliente c JOIN venta v ON (c.idcliente = v.idcliente) JOIN detalle d ON (v.idventa = d.idventa) JOIN producto p ON (p.idproducto = d.idproducto) WHERE v.fecha BETWEEN '$fechaini' AND '$fechafin' AND c.idcliente = $idcliente ;");
    if($resp){
        $xml = new DOMDocument("1.0");
        $xml->formatOutput = true;
        $fitness = $xml->createElement("detalle");
        $xml -> appendChild($fitness);
        while($row = mysqli_fetch_array($resp)){
            $detalle=$xml->createElement("detalle");
            $fitness->appendChild($detalle);

            $nombres = $xml->createElement("nombres", $row['nombres']);
            $detalle->appendChild($nombres);

            $apellidos = $xml->createElement("apedillos", $row['apellidos']);
            $detalle->appendChild($apellidos);

            $nomprod = $xml->createElement("nomprod", $row['nomprod']);
            $detalle->appendChild($nomprod);

            $cantidad = $xml->createElement("cantidad", $row['cantidad']);
            $detalle->appendChild($cantidad);

            $precia = $xml->createElement("precio", $row['precia']);
            $detalle->appendChild($precia);


        }
        echo "<xmp>".$xml->saveXML()."</xmp>";
        $xml->save("report.xml");
    }else{
        echo "error...!";
    }
    }
    imprimir($fi,$ff,$gi);
?>