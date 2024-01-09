<?php

session_start();
    unset($_SESSION['acceso']);
    unset($_SESSION['nombre']);
    header("Location: Catalogo.php");
?>

