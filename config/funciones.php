<?php
function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}
function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}
function redireccionar($url)
{   
    echo '
      <script type="text/javascript">         
         function redirigir() {
            window.location = "'.$url.'";
         }
       setTimeout("redirigir()", 1000);
      </script>';
}

function redireccionar2($url)
{   
   header("Location:".$url."",TRUE);
}

function generar_clave($cant){
   $key = '';
   $cadena = "1234567890abcdefghijklmnrstuvwz@";
   $max = strlen($cadena)-1;
   for($i=0;$i<$cant;$i++){
      $key .= substr($cadena,mt_rand(0,$max),1);
   }
   return $key;
}
?>