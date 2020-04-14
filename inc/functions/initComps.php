<?php
if (isset($_SESSION['nombre'])||isset($_SESSION['status'])) {
    $idu=$_SESSION['id'];
    $user=$_SESSION['name'];
  $status=$_SESSION['status'];
  $numerito=1;
  $imagen=$_SESSION['img'];
} else {
    $status='';
    $numerito=0;
    $user='';
    $imagen='';
}
