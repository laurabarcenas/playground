<?php 
  //comenzamos recogiendo los datos
function recogeDato($campo){ 
     return isset($_REQUEST[$campo])?$_REQUEST[$campo]:'';
 } //la función recogeDatos comprueba si se ha recibido un dato y recoge su valor
  
 //si no se ha recibido, le asigna un valor vacío.
 $email1    = recogeDato('email1');
 $email2    = recogeDato('email2'); //asignamos cada valor a una variable
 $consulta  = recogeDato('consulta');
 $nombre    = recogeDato('nombre');
 $conocio   = recogeDato('conocio');
 $referente = recogeDato('referente');
 $algunerror = FALSE;
 
//una vez recogidos, los validamos (campos obligatorios, etc...)
if($email1==''){ //validamos los que el email no esté vacio
     $algunerror = TRUE; //si encontramos un error,mostramos un mensaje
     echo "<p class=\"erroneo\">No has introducido tu eMail</p>\n";
 } elseif($email1!=$email2){ //si tiene algo, que concida con la repetición
     $algunerror = TRUE;
     echo "<p class=\"erroneo\">Los eMails introducidos no coinciden.</p>\n";
 }
 if($nombre==''){ //comprobamos que el nombre no haya quedado vacío
     $algunerror = TRUE;
     echo "<p class=\"erroneo\">No has introducido tu nombre.</p>\n";
 }
 if($consulta==''){ //comprobamos que el contenido de la pregunta no esté vacío
     $algunerror = TRUE;
     echo "<p class=\"erroneo\">El área de la consulta no puede quedar en blanco.</p>\n";
  }
  if ($algunerror){ //comprobamos si ha habido algún error
     echo "<p>&nbsp;</p>\n"; //si los hay, se lo indicamos al usuario
     echo "<p>No se ha podido enviar el mensaje por los errores que se detallan arriba.</p>\n";
     echo "<p>Por favor, vuelve a rellenar el formulario.</p>\n";
     echo "<p class=\"centrado\"><a href=\"contacto.html\">Volver al formulario</a></p>\n";
  }else{
     $para="ejemplo.aulaclic@gmail.com"; //si todo es correcto, enviamos el correo
     $asunto="Contacto web Flores - consulta sobre ".$referente;
     $mensaje="Datos del formulario de contacto:\n". //creamos el mensaje con los datos
     "Nombre: ".$nombre." \n".
     "eMail:  ".$email1."\n".
     "Nos conocio por: ".$conocio." \n".
     "Pregunta: ".$consulta;
     mail($para, $asunto, $mensaje); //y lo enviamos
     echo "<p>Tu mensaje se ha enviado correctamente. Gracias por contactar con nosotros.</p>\n";
     echo "<p>Nos pondremos en contacto lo antes posible.</p>\n";
  }
?>