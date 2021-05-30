<?php 
session_start();
include("tdl.php");
$user = new tdl();
$user->dbconnect();




// Systeme de connexion.



if(isset($_POST['co'])){
    $_login = $_POST['identifiantPHP'];
$_password = $_POST['passwordPHP'];

$user->connexion($_login, $_password);
}


// Systeme d'inscription. 



if(isset($_POST['ins'])){

    $_login_inscription = $_POST['identifiantINSCR'];
$_password_inscription = $_POST['passwordINSCR'];
$_password2_inscription = $_POST['passwordINSCR2'];

$user->inscription($_login_inscription, $_password_inscription, $_password2_inscription);
}


// Ajout un rappel 

if(isset($_POST['rap']))
{
    $rappel = $_POST['rappelphp'];
    $date = $_POST['datephp'];
    
    $user->ajouter_rappel($rappel, $date);
    //$user->afficher_rappel();
}

// Affiher les rappels 
if(isset($_GET['show'])){
   echo $user->afficher_rappel();
}

// Supprimer un rappel
if(isset($_GET['supprimer'])){
    echo $user->supprimer($_GET['id']);
}

// Afficher les rappels effectué
if(isset($_GET['affich'])){
     echo $user->afficher_rappel_fini();
}


// Effectuer un rappel 
if(isset($_GET['change'])){
    echo $user->rappel_effectuer($_GET['id']);
}


?> 


<?php 



?>