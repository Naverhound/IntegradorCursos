<?php 
include '../inc/functions/conection.php';


if(isset($_POST['action'])){//ser invocado por POST
$action=$_POST['action'];
}else{

}
if(isset($_GET['action'])){//ser invocado por get
$action=$_GET['action'];
}else{

}