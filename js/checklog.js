function checklog(){
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