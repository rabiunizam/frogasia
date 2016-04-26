<?php
   function crypter($string,$key,$a)
   {
   if(empty($a))
   $string=base64_decode($string);
   $salida='';
	   for($i=0;$i<strlen($string);$i++)
	   {
	   $char=substr($string,$i,1);
	   $keychar=substr($key,($i%strlen($key))-1,1);
	   if($a)$char=chr(ord($char)+ord($keychar));
	   else $char=chr(ord($char)-ord($keychar));
	   $salida.=$char;
	   }
   if($a)
   $salida=base64_encode($salida);
   return $salida;
   }
 
/*     $a='nizam';
   echo crypter($a,'xs:a/55p;',1);
   $b = crypter($a,'xs:a/55p;',1);
   echo '<hr>';
   echo crypter($b,'xs:a/55p;',0);
exit; */
?>