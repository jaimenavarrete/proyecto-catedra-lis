<?php
function NotificacionBloqueo($correo, $nombre, $hora){
  $para = $correo;
  $asunto = "Su cuenta ha sido bloqueada";
  $mensaje = "Estimado/a " . $nombre . " le informamos que su cuenta ha sido bloqueada a las " . $hora. " por haber SUPERADO
  el número de intentos fallidos permitidos. Inténtelo de nuevo en una hora.";
  mail($para, $asunto, $mensaje);
}
?>
