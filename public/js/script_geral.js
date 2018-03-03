$(document).ready(function(){

  $(".dtTable").DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
    }
  });

  //mascaras gerais
  $("#cpf").mask("999.999.999-99");
  $(".ip").mask("999.999.999.999");

  // pagina register
  var perfil_user = $("#perfil_user");
  var form_register = $("#form_register");
  form_register.on("submit", function(event){
    if(perfil_user.val() == 0){
      event.preventDefault();
      toastAlert("Selecione o perfil de usuário", "info");
      perfil_user.focus();
      return
    }
    form_register.submit();
  });

  //fim register

});

// funções gerais
function toastAlert(texto, tipo){
  $.toast({
      text: texto,
      position: 'top-right',
      icon: tipo,
      bgColor: '#424242',
      loader: false,
      stack: false
  });
}
