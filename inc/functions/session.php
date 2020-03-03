<?php

session_start();

if (isset($_SESSION['nombre'])) {
} else {
    header('Location: ../index.php');
    exit();
}
