<?php 

class tdl 
{
    private $login;
    private $password;
    public $tache;
    public $_db;



    
    /// Fonction pour se connecter a la base de données.

    public function dbconnect()
    {
        $db = new PDO("mysql:host=localhost; dbname=tdl", 'root', '');
        $this->_db= $db;
    }


    public function deconnect()
    {
        header("location:index.php");
        session_destroy();
        
    }



    public function inscription($_login, $_password, $_password2)
    {

        $db = $this->_db;

        $login = htmlspecialchars(trim($_login));
        $password = htmlspecialchars(trim($_password));
        $password2 = htmlspecialchars(trim($_password2));
        $cryptage = password_hash($password, PASSWORD_BCRYPT);

    
          
    


        if(!empty($login) && !empty($password) && !empty($password2)){
            $verification = $db->prepare("SELECT * FROM utilisateurs WHERE login = '$login'");
            $verification->execute();
            $verification2 = $verification->rowcount();
            if($password == $password2){
                if($verification2 == 0 )
                    {
                        $requete = $db->prepare("INSERT INTO utilisateurs (`login` , `password`) values ('$login', '$cryptage')");
                        $requete->execute();
                        echo '5';// Bienvenue !
                    }else{
                        echo '6'; // Ce nom d'utilisateur existe déjà
                    }
            }else{
                echo '7'; // Les mots de passe ne sont pas identiques
            }
        }else{
            echo '8'; //Veuillez remplir tout les caractères
        }
    }




    public function connexion($_login, $_password)
    {
        $db = $this->_db;

        $login = htmlspecialchars(trim($_login));
        $password = htmlspecialchars(trim($_password));

        $requete = $db->prepare("SELECT * FROM utilisateurs WHERE login = '$_login'");
        $requete->execute();
        $info = $requete->fetch();
        $verif = $info['password'];

        $verification = $requete->rowcount();

        if(!empty($login) && !empty($password)){
            if($verification == 1){
                if($password = password_verify($password, $verif)){
                    $_SESSION['login'] = $info['login'];
                    $_SESSION['password'] = $info['password'];
                    $_SESSION['id'] = $info['id'];
                    $log = $info['login'];
                   echo '1'; // Connexion Reussi 
                    // header("location:todolist.php");
                }else{
                    echo '2'; // Mauvais mot de passe
                }
            }else{
                echo "3"; // Login inexistant 
            }    
        }else{
            echo '4'; // Veuillez remplir tout les caractères.
        }


        // $login = htmlspecialchars(trim($_login));
        // $password = htmlspecialchars(trim($_password));

        // $requete = $db->prepare("SELECT * FROM utilisateurs WHERE login = '$_login'");
        // $requete->execute();
        // $info = $requete->fetch();
        // $verif = $info['password'];

        // $verification = $requete->rowcount();

        // if(!empty($login) && !empty($password)){
        //     if($verification == 1){
        //         if($password = password_verify($password, $verif)){
        //             $_SESSION['login'] = $info['login'];
        //             $_SESSION['password'] = $info['password'];
        //             $_SESSION['id'] = $info['id'];
        //             $log = $info['login'];
        //             $msg = "Bonjour $log !";
        //             header("location:todolist.php");
        //         }else{
        //             $msg = 'Mauvais mot de passe';
        //         }
        //     }else{
        //         $msg = "Ce login n'existe pas";
        //     }    
        // }else{
        //     $msg = 'Veuillez remplir tout les caractères.';
        // }
    }

    public function ajouter_rappel($ajout, $date)
    {
        $db = $this->_db;
        $id = $_SESSION['id'];    
        $effectuer = '0';


        if(!empty($ajout) && !empty($date)){
            $requete = $db->prepare("INSERT INTO `rappels` (`id_utilisateurs`, `rappel`, `date`, `effectuer`) values ('$id', '$ajout', '$date', '$effectuer')");
            $requete->execute();
            // echo '9'; // Rappel ajouter 
        }else{
             // echo '10'; // Veuillez remplir les formulaires !
        }

    }

    public function afficher_rappel()
    {
        $db = $this->_db;
        $id = $_SESSION['id'];

        $requete = $db->prepare("SELECT * FROM rappels WHERE id_utilisateurs='$id' && effectuer = 0");
        $requete->execute();
        $resultat_requete = $requete->fetchall();
        return json_encode($resultat_requete);
        // foreach($resultat_requete as $resultat)
        // {
        //     $rappel = $resultat['rappel'];
        //     $id_rappel = $resultat['id_rappel'];
        //     $id = $resultat['id_utilisateurs'];
        //     $date = $resultat['date'];
        //     echo "<li>$rappel<div class = 'droite'>$date</div> </li>";
        //     // echo "<form method = 'post'><input type = 'submit' value = '$id_rappel' name = 'valide'></form>";


        // }
    }

    public function afficher_rappel_fini()
    {
        $db = $this->_db;
        $id = $_SESSION['id'];

        $requete = $db->prepare("SELECT * FROM rappels WHERE id_utilisateurs='$id' && effectuer = 1");
        $requete->execute();
        $resultat_requete = $requete->fetchall();
        return json_encode($resultat_requete);

        // foreach($resultat_requete as $resultat)
        // {
        //     $rappel = $resultat['rappel'];
        //     echo "<li>$rappel</li>";
        // }
    }


    public function rappel_effectuer($id_rappel)
    {   
        $db = $this->_db;
        $today = date("Y-n-j");

        $requete2 = $db->prepare("UPDATE `rappels` SET `effectuer`= '1', `date`='$today' WHERE `id_rappel` = '$id_rappel' ");
        $requete2->execute();
        return json_encode($requete2);
    }


    public function supprimer($id)
    {
        $db = $this->_db;
        $requete = $db->prepare("DELETE FROM `rappels` WHERE id_rappel='$id'");
        $requete->execute();
    }

}



?>