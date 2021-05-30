<?php include("header.php"); ?> 
<section class = 'caseconnexioninscription'>
            <section class = 'caseconnexionbase'>
                <h3 class = 'titreconnexioninscription'>Déjà inscrit ? </h3>
                <br>
                    <div class = 'caseconnexion'>
                        <form>
                            <label class='lbl' for="login">Login : </label>
                            <input class='inpt'  type = 'text' name = 'identifiantPHP' id = 'login' > <br>
                            <label class='lbl' for="password">Mot de passe : </label>
                            <input class='inpt'  type = 'password' name = 'password' id = 'passwordPHP'> <br>
                    </div>
                        <section class = 'caseerreur' id = 'reponse1'>
                        <?php 
                        // if(isset($_POST['submitconnexion'])){
                        //     $user->connexion($_POST['login'], $_POST['password']);
                        //  } ?>
                        </section>
                            <button type = 'submit' id ='connexion_button' name = 'submitconnexion' value = 'Connexion' class = 'buttonconnexion'>Connexion</button>
                        </form>
            </section>
                <hr class = 'connexionsepareinscription'>
            <section class = 'caseinscriptionbase'>
                <h3 class = 'titreconnexioninscription'> Pas encore membre ? </h3>
                <div class = 'caseinscription'>
                    <form>

                        <label class='lbl' for = "indentifiant">Identifiant : </label>
                        <input class='inpt'  name = 'identifiant ' type = 'text' id = 'id_inscription'><br>
                        <label class='lbl'  for="password2">Mot de passe : </label>
                        <input class='inpt' type = 'password'  name = 'mdp' id = 'id_password'> <br>
                        <label class='lbl' for="confirmpassword">Confirmer mot de passe : </label>
                        <input class='inpt' type = 'password' name = 'confirmpassword' id = 'id_password2' name = 'mdp2'> <br>
                </div>
                    <section class = 'caseerreur' id = 'reponse2'>
                        <?php 
                        // if(isset($_POST['submitinscription'])){
                        //     $user->inscription($_POST['identifiant'], $_POST['password2'], $_POST['confirmpassword']);
                        //  } ?>
                    </section>
                        <button id='inscription_button'  name = "submitinscription" value = 'Inscription' class = 'buttonconnexion'>Inscription</button>
                    </form>
            </section>
        </section>

        <script>

$(document).ready(function(){
 
 $("#connexion_button").click(function(e){
     e.preventDefault();

     $.ajax({
         url : 'inscription.php', 
         type : 'POST',
         data:{
             identifiantPHP:$("#login").val(),  
             passwordPHP:$("#passwordPHP").val(),
             co:'co'

         },
         dataType:'text',
         success: function(response){
             response = response.trim();
             console.log(response);
             if(response == '1'){
                $(location).attr('href','todolist.php');
             }
             if(response == '2'){
                $('#reponse1').html('Mauvais mot de passe')
             }
             if(response == '3'){
                $('#reponse1').html('Login inexistant')
             }
             if(response == '4'){
                $('#reponse1').html('Veuillez remplir tout les caractères.')
             }
            }
         }
      );
   });
});

///    Inscription 

 
 $("#inscription_button").click(function(e){
     e.preventDefault();

     $.ajax({
         url : 'inscription.php', 
         type : 'POST',
         data:{
             identifiantINSCR:$("#id_inscription").val(),  
             passwordINSCR:$("#id_password").val(),
             passwordINSCR2:$("#id_password2").val(),
             ins:'ins'
         },
         dataType:'text',
         success: function(response2){
             response2 = response2.trim();
             console.log(response2);
             if(response2 == '5'){
                $('#reponse2').html('Bienvenue !');
                $("#id_inscription").val('');  
                $("#id_password").val('');
               $("#id_password2").val('');
             }
             if(response2 == '6'){
                $('#reponse2').html('Ce nom d\'utilisateur existe déjà')
             }
             if(response2 == '7'){
                $('#reponse2').html('Les mots de passe ne sont pas identiques')
             }
             if(response2 == '8'){
                $('#reponse2').html('Veuillez remplir tout les caractères')
             }
                }
            }
    );
});


/// Ajout rappel 


</script>

<?php include ("footer.php") ?> 

