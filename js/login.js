$(document).ready(function(){
 $("#btn_login").click(function(){
	validaLogin($("#user"), $("#pass"));
  });
 
});
function validaLogin(user, pass){
  if(user.val() == ""){
    alert("Informe o Login!"); //Exibe um alerta 
    user.focus(); //Adiciona foco ao campo login usando um ponteiro
    return; //retorna nulo
  }
  else if(pass.val() == ""){
    alert("Informe a Senha!");
    pass.focus();
    return;
  }
  //Se o usuário informou login e senha, então é hora do Ajax entrar em ação
  else
    $("#resultado").html("Autenticando...");
 
 /**Função ajax nativa da jQuery, onde passamos como parâmetro o endereço do arquivo que queremos chamar, 
 * os dados que irá receber, e criamos de forma encadeada a função que irá armazenar o que foi retornado pelo servidor,
 * para poder se trabalhar com o mesmo */
    $.post("session.php", {user: user.val(), pass: pass.val()}, 
      function(retorno){
    
	$("#resultado").html(retorno);
 
      } //function(retorno)
    ); //$.post()
 
}
