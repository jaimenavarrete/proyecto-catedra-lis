<?php
session_start();
if(isset($_SESSION['usuario'])) {
    echo "Your session is running " . $_SESSION['usuario'];
  }
?>