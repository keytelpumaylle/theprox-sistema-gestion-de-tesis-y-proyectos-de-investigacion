<?php
    include_once 'funciones.php';
    $clave = "72667118";
    $llave = "Theprox_unamba_keytel_a2V5dGVs";
    $new_clave = encrypt($clave,$llave);
    echo "la clave inicial es : ".$clave;
    echo "<br>";
    echo "La clave encriptada es : ".$new_clave;
    $clave_gen = generar_clave(8);
    echo "<br>";
    echo "La clave generada es : ".$clave_gen;
?>