function afficher2() {
    $.ajax({
            type:'get',
            url:'inscription.php',
            data:{
                affich:'affich'
            },
            dataType:'text',
            success:function(response){
                response = JSON.parse(response);
               response.forEach(element2 => {
                  $('#reponse5').append(`<li class=${element2.id_rappel}>${element2.rappel} <div class = 'droite'>${element2.date}</div><button class = 'button2' onclick="deleteuh(${element2.id_rappel})"><img src = 'images-tdl/cancel.png'></button></li>`)
                  console.log(response);
               });
            }
        })
}


function afficher() {
    $.ajax({
            type:'get',
            url:'inscription.php',
            data:{
                show:'show'
            },
            dataType:'text',
            success:function(response){
                response = JSON.parse(response);
               response.forEach(element => {
                  $('#reponse4').append(`<li class="${element.id_rappel}">${element.rappel}<div class = 'droite'>${element.date}</div><button class = 'button2' onclick="deleteuh(${element.id_rappel})"><img src = 'images-tdl/cancel.png'></button><button class = 'button2' onclick="effectue(${element.id_rappel})"><img src = 'images-tdl/checked.png'></button></li>`)
               });
            }
        })
}



function deleteuh(id){
    console.log(id);
     $.ajax({
        type:'get',
         url:'inscription.php',
         data:{
             supprimer:'supp',
             id:id
        },
        success:function(response){
            console.log(response);
            $('#reponse4 li').remove();
                afficher();
                $('#reponse5 li').remove();
                afficher2();
             
        }
    })
}

function effectue(id){
    console.log(id);
     $.ajax({
        type:'get',
         url:'inscription.php',
         data:{
             change:'change',
             id:id
        },
        success:function(response){
            console.log(response);
            $('#reponse4 li').remove();
                afficher();
                $('#reponse5 li').remove();
                afficher2();
             
        }
    })
}



$(document).ready(function(){
 afficher();
afficher2();

});
$("#submit_rappel").click(function(e){
        e.preventDefault();

        if ($('#rappelJS').val() != '' && $('#dateJS').val() != ''){
        $.ajax({
            type:'post',
            url:'inscription.php',
            data:{
                rappelphp:$('#rappelJS').val(),
                datephp:$('#dateJS').val(),
                rap:'rap'
            },
            dataType:'text',
            success:function(response){
                $('#rappelJS').val('');
                response = response.trim();
                $('#reponse4 li').remove();
                afficher();
                // $('#reponse5 li').remove();
                // afficher2();

                $('#reponse3').html('Rappel ajouté');
            }
        })
    }else{
        $('#reponse3').html('Remplissez tout les champs');
    }
    });
