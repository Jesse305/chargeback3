$(document).ready(function(){

  $(".dtTable").DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
    }
  });

  //revela senha
  var revela_senha = $(".revela_senha");
  revela_senha.click(function(){
    var input_senha = $(this).data("input_senha");
    var senha = document.getElementById(input_senha);
    if(senha.type == "password"){
      senha.type = "text";
    }else{
      senha.type = "password";
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

  //banco de dados
  var btn_visualizar = $('.btn_visualizar');
  var modal = $('#modal_info');

  btn_visualizar.click(function(){
    var _this = $(this);
    var user = _this.data("user");
    var password = _this.data("password");

    $("#user").html(user);
    $("#password").html(password);
  });

  //fim banco dados

});

// funções gerais
function toastAlert(texto, tipo){
  $.toast({
      text: texto,
      position: 'top-right',
      icon: tipo,
      bgColor: '#0088cc',
      loader: false,
      stack: false
  });
}
