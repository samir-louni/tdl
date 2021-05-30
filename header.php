<?php 
session_start();
include("tdl.php");
$user = new tdl();
$user->dbconnect();
if(isset($_SESSION['login'])){
$id = $_SESSION['id'];}

?> 

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/3e0170c061.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="tdl.css">
        <title>To do list</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap');
        </style>
    </head>
    <body>
        <header>
            <div class = 'contenue_header'>
                <a class = 'text_header' href = 'index.php'>ACCUEIL</a>
                <div class = 'profil'>
                    <?php 
                    if(!isset($_SESSION['login'])){
                     echo "<img class = 'image_profil_header' src = 'images-tdl/pastille.jpg'><p class = 'statut'>HORS LIGNE</p>";
                    }else{
                        echo "<img class = 'image_profil_header' src = 'images-tdl/pastilleverte.jpg'><p class = 'statut'>EN LIGNE</p>
                              <form method = 'post'>
                                <input  type = 'submit' name = 'deconnecter'  value = '' class = 'log_out'>
                              </form>";

                            if(isset($_POST['deconnecter'])){
                                $user->deconnect();
                            } 
                    }
                     ?>
                </div>
            </div >
        </header>
        

