<?php
    require "conexion.php";
    $resp = mysqli_query($conex, "select *from detalle");
    if($resp){
        $xml = new DOMDocument("1.0");
        $xml->formatOutput = true;
        $fitness = $xml->createElement("detalle");
        $xml -> appendChild($fitness);
        while($row = mysqli_fetch_array($resp)){
            $detalle=$xml->createElement("detalle");
            $fitness->appendChild($detalle);

            $iddetalle = $xml->createElement("iddetalle", $row['iddetalle']);
            $detalle->appendChild($iddetalle);

            $precia = $xml->createElement("precia", $row['precia']);
            $detalle->appendChild($precia);

            $cantidad = $xml->createElement("cantidad", $row['cantidad']);
            $detalle->appendChild($cantidad);

            $idproducto = $xml->createElement("idproducto", $row['idproducto']);
            $detalle->appendChild($idproducto);

            $idventa = $xml->createElement("idventa", $row['idventa']);
            $detalle->appendChild($idventa);

        }
        echo "<xmp>".$xml->saveXML()."</xmp>";
        $xml->save("report.xml");
    }else{
        echo "error...!";
    }
?>