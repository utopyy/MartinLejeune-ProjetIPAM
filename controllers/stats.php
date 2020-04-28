<?php
if($_SESSION['id']!=2){
    header("Location: welcome");
    exit();
}
include 'views/stats.php';
?>