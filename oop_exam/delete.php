<?php 
    require_once('database.php');

    $id = $_GET['id'];
    $del = $user_infos->delete('user_informations',$id);
    header('location: home.php')
    //ENTER YOUR CODE HERE
    //USE header('location: home.php') for jumping pages
?>