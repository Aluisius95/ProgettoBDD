//array globale di controllo per abilitazione alla SUBMIT
var ok = [false, false, false, false, false, false, false, false];


$(document).ready(function(){
  //Effettua il controllo dell'array per abilitare la submit
  //quando tutto "ok" è true, altrimenti submit disabilitata
  $('input').change(function(){
    console.log(ok);
    let i = 0;
    while (i < ok.length){
      if(!ok[i]){
        $('#signin').prop('disabled', true);
        break;
      } else {
        i = i + 1;
      }
      if (i == ok.length){
        $('#signin').prop('disabled', false);
      }
    }
  })

/*Abilitazione CAMPI PREMIUM in fase di registrazione*/
  $(".pcard").hide();
  $("#premium").click(function(){
    if($("#premium").is(":checked")){
      $(".pcard").attr('required', true);
      $(".pcard").show();
    }
    else{
      $(".pcard").removeAttr('required');
      $(".pcard").hide();
    }
  })

/*Controllo DATI ANAGRAFICI per violazione delle chiavi del DB o regole di iscrizione*/
  var reName = /^([ \u00c0-\u01ffa-zA-Z'\-])+$/;
  var reUser = /^\w*[<>]+\w*[<>]+$/;
  var rePsw = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&\.])[A-Za-z\d$@$!%*#?&\.]{8,16}$/;
  var reMail = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
  var reTel = /^\d{10}$/;

  $('#first_name').keyup(function(){
    var first = $('#first_name').val();
    if(first.length == ""){
      $('#invname').text("Il campo è obbligatorio!");
      ok[0] = false;
    }
    else if(!reName.test($('#first_name').val()) ){
      $('#invname').text("Nome non valido: numeri non ammessi!");
      ok[0] = false;
    }
    else{
      $('#invname').text("");
      ok[0] = true;
    }
  })

  $('#last_name').keyup(function(){
    var last = $('#last_name').val();
    if(last.length == ""){
      $('#invlast').text("Il campo è obbligatorio!");
      ok[1] = false;
    }
    else if(!reName.test($('#last_name').val()) ){
      $('#invlast').text("Cognome non valido: numeri non ammessi!");
      ok[1] = false;
    }
    else{
      $('#invlast').text("");
      ok[1] = true;
    }
  })

  $('#username').keyup(function(){
    var userVal = $('#username').val();
    if(userVal.length == ""){
      $('#userexist').text("Il campo è obbligatorio!");
      ok[2] = false;
    }
    else if(userVal.length < 5 || userVal.length > 18){
      $('#userexist').text("Lo username deve essere tra 5 e 18 caratteri!");
      ok[2] = false;
    } else if(reUser.test($('#username').val())){
      $('#userexist').text("Caratteri non validi nello username!");
      ok[2] = false;
    }
  })

  $('#psw').keyup(function(){
    let pswVal = $('#psw').val();
    let userVal = $('#username').val();
    if(pswVal.length == ""){
      $('#lowpsw').text("Il campo è obbligatorio!");
      ok[3] = false;
    } else if (userVal == pswVal) {
      $('#lowpsw').text("Username e password non possono essere uguali");
      ok[3] = false;
    }
    else if(!rePsw.test($('#psw').val())){
      $('#lowpsw').text("La password deve contenere una maiuscola, minuscola, un numero e un simbolo ed essere compresa tra 8 e 16 caratteri!");
      ok[3] = false;
    }
    else{
      $('#lowpsw').text("");
      ok[3] = true;
    }

  })

  $('#conf_psw').keyup(function(){
    let pswVal = $('#psw').val();
    let cpswVal = $('#conf_psw').val();
    if(cpswVal.length == ""){
      $('#nomatch').text("Il campo è obbligatorio!");
      ok[4] = false;
    }
    else if(pswVal !== cpswVal){
      $('#nomatch').text("Le password non combaciano!");
      ok[4] = false;
    }
    else{ $('#nomatch').text("");
    ok[4] = true;
  }
  })

  $('#email').keyup(function(){
    if($('#email').val().length == ""){
      $('#invem').text("Il campo è obbligatorio!");
      ok[5] = false;
    }
    else if(!reMail.test($('#email').val())){
      $('#invem').text("Il formato dell'email non è valido!");
      ok[5] = false;
    }
    else if($('#email').val().length > 50){
      $('#invem').text("Lunghezza massima di 50 caratteri");
      ok[5] = false;
    }
  })

  $('#birth').keyup(function(){
    var data = new Date();
    var gg = data.getDate();
    var mm = data.getMonth() + 1;
    var yyyy = data.getFullYear();
    var birth = $('#birth').val();
    var birthS = birth.split("-");
    if(birth.length == ""){
      $('#invdate').text("Il campo è obbligatorio!");ok[6] = false;
    } else if((birthS[0] > yyyy)){
      $('#invdate').text("Ci dispiace, ma non siamo ancora pronti per gli utenti del futuro!");ok[6] = false;
    } else if(birthS[0] < yyyy-100){
      $('#invdate').text("Ricontrollare l'anno di nascita!");ok[6] = false;
    } else if(yyyy == birthS[0] && birthS[1] > mm){
      $('#invdate').text("Ci dispiace, ma non siamo ancora pronti per gli utenti del futuro!");ok[6] = false;
    } else if (yyyy == birthS[0] && mm == birthS[1] && birthS[2] > gg){
      $('#invdate').text("Ci dispiace, ma non siamo ancora pronti per gli utenti del futuro!");ok[6] = false;
    } else {
      $('#invdate').text("");
      ok[6] = true;
    }
  })

  $('#phone').keyup(function(){
    if($('#phone').val().length == ""){
      $('#invph').text("Il campo è obbligatorio!");ok[7] = false;
    }
    else if(!reTel.test($('#phone').val())){
      $('#invph').text("Solo numeri o lunghezza non valida (10)");ok[7] = false;
    }
    else{
      $('#invph').text("");
      ok[7] = true;
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
})


//Funzione abilitata sull'onchange degli input di Username e Email
//per chiamata AJAX e verifica di username e email non utilizzate
//con cambio valori nell'array "ok" ed eventuale abil./disabil. SUBMIT
function check(){
  $.ajax({
    'type': "POST",
    'url': "../php/utility/selectuser.php",
    'data': "username="+$('#username').val()+"&email="+$('#email').val(),
    'success': function(response){
      //in base al valore di response, un errore relativo o nessuno
      if(response == 1){
        $('#userexist').text('Username già in uso!');
        ok[2] = false;
      } else if(response == 2){
        $('#invem').text("Email già in uso!");
        ok[5] = false;
      } else if(response == 12){
        $('#invem').text("Email già in uso!");
        $('#userexist').text('Username già in uso!');
        ok[2] = false;
      } else if(response != "" && response != 1 && response != 2 && response != 12){
        $('#ccdata').text("Ops! Qualcosa è andato storto!");
        $('#signin').prop('disabled', true);
      } else {
        $('#invem').text("");
        $('#userexist').text("");
        ok[2] = true;
        ok[5] = true;
      }

    },
    'error': function(){
      $('#ccdata').html("Si è verificato un errore con il server");
      ok[2] = false;
    }
  })
}
