<?php 
session_start();
if( isset( $_POST['name'] ) ){
    $db = new PDO("mysql:host=localhost; dbname=tdl", 'root', '');
    $id = $_SESSION['id'];
    $date = date("j, n, Y");    
    $effectuer = '0'; 
    $name = $_POST['name'];
    
    $requete = $db->prepare("INSERT INTO `rappels` (`id_utilisateurs`, `rappel`, `date`, `effectuer`) values ('$id', '$name', '$date', '$effectuer')");
    $requete->execute();
}


?>