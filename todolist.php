<?php include("header.php") ?> 
<?php if(!isset($_SESSION['id'])){
    header("location:index.php");
    include("footer.php");
}
?>
<section class = 'centrer'>

    <section class = 'aligne_rappel'>
        <div class = 'rappels'>
           <h2 class = 'titre_rappel'> RAPPELS  </h2>
           <ul class = 'liste_fini' id = 'reponse4'>
        </ul>
        </div>
        <div class = 'rappels_fini'>
            <h2 class = 'titre_rappel'> RAPPELS EFFECTUE </h2>
            <ul class = 'liste_fini' id = 'reponse5'>

               
            </ul>
        </div>
    </section>
    <section class = 'add_rappel'>
        <div class = 'case_ajout_rappel'>
            <form method='POST'>
                <label class = 'label_add' for ='ajouter'>Ajouter un rappel :</label><br>
                <input  id="rappelJS" class = 'input_add' type = 'text' name ='ajouter'>
                <input id="dateJS" type="date" class = 'input_add_2'>
            
        </div>
    </section>
    <section class = 'caseerreur2' id = 'reponse3'>
    </section>
    <section class = 'case_submit'>
        <button id= 'submit_rappel' name = 'submit_add' class = 'button_add_rappel'>- AJOUTER -</button>
            </form>
    </section>
</section>

 <script src = 'tdlscript.js'>


</script>

<?php include ("footer2.php") ?> 