<?php
        $server="localhost";
        $usuario="root";
        $clave="123456789";
        //$clave="";
        $base="bd_theprox";
        //$base="theprox";
        $conector=mysqli_connect($server,$usuario,$clave,$base);
    if ($conector->connect_error) {
        die("Conexion Perdida: " . $conector->connect_error);
    }
    
?>