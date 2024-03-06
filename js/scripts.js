//Chiamate AJAX

function checklog(){
    //Controllo dati in fase di login
    $.ajax({
      'type': "POST",
      'url': "../php/utility/log.php",
      'data': "username="+$('#username').val()+"&password="+$('#password').val(),
      'success': function(response){
        //in base al valore di response, un errore relativo o nessuno
        if(response == 1){
          $('#logerr').text('Username o password errati!');
        }
        else {
            window.location = "../php/home.php";
        }
      },
      'error': function(){
        $('#logerr').html("Si è verificato un errore con il server");
      }
    })
}

//chiamata per logout
function logout(){
    $.ajax({
        'url': "../php/utility/sessionabort.php",
        'success': function(response){
        //in base al valore di response, un errore relativo o nessuno
        if(response == 1){
            window.location = "../php/index.php";
        }
        },
        'error': function(){
        $('#logerr').html("Si è verificato un errore con il server");
        }
    })
}

//chiamata funzione per generazione schede utenti
function users(){
    $.ajax({
        'url': "../php/utility/selusr.php",
        'success': function(response){
            if(response){
                $('#users').html(response);
            }
        },
        'error': function(){
            $('#users').html("Si è verificato un errore con il server");
            }
    })
}

//chiamata funzione per generazione post di tutti gli utenti sulla home
function userposts(){
    $.ajax({
        'url': "../php/utility/selpost.php",
        'success': function(response){
            if(response){
                $('#home').html(response);
            }
        },
        'error': function(){
            $('#home').html("Si è verificato un errore con il server");
            }
    })
}

//creazione area personale
function areaP(){
    $.ajax({
        'url': "../php/utility/singleuser.php",
        'success': function(response){
            if(response){
                $('#prf').append(response);
            }
        },
        'error': function(){
            $('#prf').append("Si è verificato un errore con il server");
            }
    })
}

//generazione blog utente attivo in sessione
function loadBU(){
      $.ajax({
          'url': "../php/utility/loadUserBlog.php",
          'success': function(response){
              if(response){
                $('#blg').html(response);
              }
          },
          'error': function(){
              $('#blg').html("Si è verificato un errore con il server");
          }
      })
}

//generazione post utente attivo in sessione per ogni blog
function loadPU(dato){
    $.ajax({
        'url':"../php/utility/loadPU.php",
        'data':"blog="+dato,
        'success': function(response){
            if(response){
                $('.sx').html(response);
            }
        },
        'error': function(){
            $('.sx').html("Si è verificato un errore con il server");
        }
    })
}

//generazione pagina dei post completa
function openPU(idP){
    $.ajax({
        'url':"../php/utility/openPU.php",
        'data':"idP="+idP,
        'success': function(response){
            if(response){
                $('.sx').html(response);
            }
        },
        'error': function(){
            $('.sx').html("Si è verificato un errore con il server.");
        }
    })
}

//contatore per lunghezza massima bio/commento
function counter(){
    let max = 250;
    if($('.count').val().length == 250){
        $('.cd').text("0/250").css("color", "red");
    } else {
        let rim = max - $('.count').val().length;
        $('.cd').text(rim + "/250").css("color", "black");
        if($('.count').val().length >= 225){
            $('.cd').text(rim + "/250").css("color", "red");
        }
    }
}

//impostazione immagine di default per il profilo
function def(){
    $.ajax({
        'url': "../php/utility/defimg.php",
        'success': function(response){
            if(response){
                setTimeout(function(){location.reload();}, 2000);
                $('#errL').text(response).css("color","green");
            }
        },
        'error': function(){
            $('#errL').text("Si è verificato un errore con il server").css("color","red");
            }
    })
}

//ricarica della biografia già presente per modifica parziale
function bioC(){
    $.ajax({
        'url': "../php/utility/loadbio.php",
        'success': function(response){
            if(response){
                $('#biog').text(response);
            }
        },
        'error': function(){
            $('#biog').text("Si è verificato un errore con il server").css("color","red");
            }
    })
}

//funzione di controllo ed eventuale cambio dati di accesso
function change(){
    $.ajax({
        'type': "POST",
        'url': "../php/utility/change.php",
        'data': "usr="+$('#usrn').val()+"&psw="+$('#old').val()+"&pswN="+$('#new').val()+"&pswNC="+$('#newc').val(),
        'success': function(response){
            if(response == 1){
                setTimeout(function(){location.reload();}, 2000);
                $('#errC').text("Username modificato con successo!").css("color", "green");
            } else if (response == 2) {
                setTimeout(function(){location.reload();}, 2000);
                $('#errC').text("Password cambiata con successo!").css("color", "green");
            } else if (response == 3) {
                setTimeout(function(){location.reload();}, 2000);
                $('#errC').text("Dati di accesso cambiati correttamente").css("color", "green");
            } else {
                $('#errC').text(response).css("color", "red");
            }
        },
        'error': function(){
            $('#biog').text("Si è verificato un errore con il server").css("color","red");
            }
    })
}

//eliminazione di profilo e relativi elementi correlati
function del(){
    $.ajax({
        'url': "../php/utility/del.php",
        'success': function(response){
            if(response == 1){
                alert("Profilo eliminato con successo!");
                window.location = "../php/index.php";
            }
        },
        'error': function(){
            $('#errP').text("Si è verificato un errore con il server").css("color","red");
            }
    })
}

//funzione caricamento post di blog di utente non in sessione
function loadP(dato){
    $.ajax({
        'url':"../php/utility/loadP.php",
        'data':"blog="+dato,
        'success': function(response){
            if(response){
                $('.sx').html(response);
            }
        },
        'error': function(){
            $('.sx').html("Si è verificato un errore con il server");
        }
    })
}

//generazione profilo utente non in sessione
function loadU(dato){
      $.ajax({
        'url':"../php/utility/userP.php",
        'data': "username="+dato,
        'success': function(response){
            if(response){
                $('.sx').html(response);
            }
        },
        'error': function(){
            $('.sx').html("Si è verificato un errore con il server");
        }
    })
}

//generazione blog in profilo utente non in sessione
function loadB(dato){
    $.ajax({
        'url':"../php/utility/loadB.php",
        'data': "username="+dato,
        'success': function(response){
            if(response){
                $('.sx').append(response);
            }
        },
        'error': function(){
            $('.sx').append("Si è verificato un errore con il server");
        }
    })
}

//apertura dei post di specifico blog
function openP(idP){
    $.ajax({
        'url':"../php/utility/openP.php",
        'data':"idP="+idP,
        'success': function(response){
            if(response){
                $('.sx').html(response);
            }
        },
        'error': function(){
            $('.sx').html("Si è verificato un errore con il server.");
        }
    })
}

//eliminazione di blog e relativi elementi correlati
function delB(idB){
    $.ajax({
        'url':"../php/utility/delB.php",
        'data': "idB="+idB,
        'success': function(response){
            if(response == 1){
                alert("Blog eliminato con successo!");
                window.location = "../php/profile.php";
            }
        },
        'error': function(){
            $('.head').append("Si è verificato un errore con il server.");
        }
    })
}
//modifica del blog con selezione coautori
function toolsB(idB){
    $.ajax({
        'url':"../php/utility/toolB.php",
        'data':"idB="+idB,
        'type':'POST',
        'success': function(response){
            if(response){
                $('.sx').html(response);
            }
        },
        'error': function(){
            $('.head').append(response);
        }
    })
}
//aggiungo-rimuovo co-autore
function coAut(idB){
    $("#add").on("click", function(){
        $.ajax({
            'url':"../php/utility/addCo.php",
            'data':"idB="+idB+"&idU="+$('#coaut').val(),
            'success': function(response){
                if(response){
                    $('#msgB').html(response)
                }
            },
            'error': function(){
                $('#msgB').html("Errore in aggiunta del co-autore");
            }
        })
    })
    $("#rem").on("click", function(){
        $.ajax({
        'url':"../php/utility/remCo.php",
        'data':"idB="+idB+"&idU="+$('#coaut').val(),
        'success': function(response){
            if(response){
                $('#msgB').html(response)
            }
        },
        'error': function(){
            $('#msgB').html("Errore in rimozione del co-autore");
        }
        })
    })
}


//eliminazione di post e relativi elementi correlati
function delP(idP){
    $.ajax({
        'url':"../php/utility/delP.php",
        'data': "idP="+idP,
        'success': function(response){
            if(response == 1){
                alert("Post eliminato con successo!");
                window.location = "../php/profile.php";
            }
        },
        'error': function(){
            $('.head').append("Si è verificato un errore con il server.");
        }
    })
}

//selezione tema per blog
function the(){
    $.ajax({
        'url':"../php/utility/selT.php",
        'success':function(response){
            if(response){
                $('#theme').html(response);
            }
        },
        'error':function(){
            $('.sx').append("Si è verificato un errore nel caricare i temi!")
        }
    })
}

//selezione stile per blog
function sty(){
    $.ajax({
        'url':"../php/utility/selS.php",
        'success':function(response){
            if(response){
                $('#style').html(response);
            }
        },
        'error':function(){
            $('.sx').append("Si è verificato un errore nel caricare i temi!")
        }
    })
}

//inserimento blog in DB
function registerB(){
    $.ajax({
      'type': "POST",
      'url': "../php/utility/recB.php",
      'data': "title="+$('#TitB').val()+"&theme="+$('#theme').val()+"&style="+$('#style').val(),
      'success': function(response){
        if(response == 1){
            $('#errNB').html('Blog creato con successo!');
            setTimeout(function(){window.location = "../php/profile.php";}, 2000);
        } else if (response == 2) {
            $('#errNB').html('Hai già un blog con questo nome!').css("color","red");
        } else {
            $('#errNB').html(response).css("color","red");
        }
      },
      'error': function(){
        $('#logerr').html("Si è verificato un errore con il server");
      }
    })
}

//selezione sottotema per post
function subThe(elem){
    $.ajax({
        'url':"../php/utility/selST.php",
        'data':"title="+elem,
        'success':function(response){
            if(response){
                $('#subth').html(response);
            }
        },
        'error':function(){
            $('.sx').append("Si è verificato un errore nel caricare i temi!")
        }
    })
}

//inserimento dati post in DB
function registerP(elem){
    $.ajax({
        'url':"../php/utility/recP.php",
        'type':"POST",
        'data':"title="+$('#TitP').val()+"&text="+$('#testo').val()+"&subth="+$('#subth').val()+"&img="+$('#carica').val()+"&premium="+$('#y').val()+"&blog="+elem,
        'success':function(response){
            if(response == 1){
                $('#errNP').html('Post creato con successo!');
                setTimeout(function(){window.location = "../php/profile.php";}, 2000);
            } else if (response == 2) {
                $('#errNP').html('Hai già un post con questo nome!').css("color","red");
            } else {
                $('#errNP').html(response).css("color","red");
            }
        },
        'error':function(){
            $('.sx').html("Si è verificato un errore con il server");
        }
    })
}

//inserimento commenti relativi al post in DB
function addCom(id){
    $.ajax({
        'url' : "../php/utility/addCom.php",
        'type': "POST",
        'data': "idPost="+id+"&commento="+$('#commento').val(),
        'success': function(response){
            if(response){
                $('.comm').append("Lunghezza minima 30 caratteri!")
            } else {
                location.reload();
            }
        },
        'error': function(){
            $('.comm').html("Si è verificato un errore caricare il commento");
        }
    })
}

//caricamento dei commenti relativi al post
function loadCom(id){
    $.ajax({
        'url' : "../php/utility/loadCom.php",
        'type': "POST",
        'data': "idPost="+id,
        'success': function(response){
            if(response){
                $('.allComm').append(response);
            }
        },
        'error': function(){
            $('.allComm').html("Si è verificato un errore caricare i commenti");
        }
    })
}

//elimina il commento
function delC(idC){
    $.ajax({
        'url':"../php/utility/delC.php",
        'data': "idC="+idC,
        'success': function(response){
            if(response == 1){
                alert("Commento eliminato con successo!");
                location.reload();
            }
        },
        'error': function(){
            $('.head').append("Si è verificato un errore con il server.");
        }
    })
}

//aggiornamento premium
function upP(){
    $(".pcard").hide();
      $("#premium").click(function(){
        if($("#premium").is(":checked")){
          $(".pcard").attr('required', true);
          $(".pcard").show();
        } else {
          $(".pcard").removeAttr('required');
          $(".pcard").hide();
        }
    })

    $('#credit_card').keyup(function(){
        if($('#credit_card').val().length == ""){
          $('#ccdata').text("I campi sono obbligatori!");
        }
        else if ($('#credit_card').val().length > 16){
          $('#ccdata').text("Massimo 16 cifre nella C.C.!");
        }
        else if(!/^\d{0,16}$/.test($('#credit_card').val())){
          $('#ccdata').text("Solo numeri ammessi!");
        }
        else{
          $('#ccdata').text("");
        }
      })
    
      $('#cvc').keyup(function(){
        if($('#cvc').val().length == ""){
          $('#ccdata').text("I campi sono obbligatori!");
        }
        else if ($('#cvc').val().length > 3){
          $('#ccdata').text("Massimo 3 cifre nel CVC!");
        }
        else if(!/^\d{0,3}$/.test($('#cvc').val())){
          $('#ccdata').text("Solo numeri ammessi!");;
        }
        else{
          $('#ccdata').text("");
        }
      })
    
      $('#titolare').keyup(function(){
        var name = $('#titolare').val();
        if(name.length == ""){
          $('#ccdata').text("I campi sono obbligatori!");
        }
        else if(!reName.test($('#titolare').val()) ){
          $('#ccdata').text("Nome non valido: numeri non ammessi!");
        }else if($('#titolare').val().length > 40){
          $('#ccdata').text("Lunghezza massima di 40 caratteri");
        }
        else{
          $('#ccdata').text("");
        }
      })
}

function updP(){
    $.ajax({
        'url':"../php/utility/updP.php",
        'type':'POST',
        'data':"credit_card="+$('#credit_card').val()+"&cvc="+$('#cvc').val()+"&month="+$('#month').val()+"&year="+$('#year').val()+"&titolare="+$('#titolare').val(),
        'success': function(response){
            if(response == 1){
                $('.error').html("Pagamento riuscito! Tre pochi secondi verrà aggiornato il tuo profilo!");
                setTimeout(function(){window.location = "../php/home.php";}, 2000);
            } else if (response == 2) {
                $('.error').html("Errore nel tentativo di pagamento! Riprova più tardi!");
            } else {
                $('.error').html(response);
            }
        },
        'error': function(){
            $('.error').html("Errore nell'acquisizione dati!");
        }

    })
}

//funzione per la ricerca
function searchAny(){
    $.ajax({
        'url':'../php/utility/search.php',
        'data':'search='+$('#search').val(),
        'success':function(response){
            if(response != ''){
                $('.sx').html(response);
            } else {
                $('.sx').html("Ricerca vuota, verrai reindirizzato alla Home");
                setTimeout(function(){window.location = "../php/home.php";}, 2000);
            }
        },
        'error': function(response){
            $('.sx').html("Errore durante la ricerca");
        }
    })
}