$(document).ready(function(){
	var form_usuario = $('#form_usuario');
	var form_login = $('#form_login');
	var msg_login = $('#msg_login');
	var senha = $('#senha');
	
	validarConta();		
$('#logout').on('click', function(e){
	e.preventDefault();
	$.ajax({
		url: 'src/controller/UsuarioController.php?opcao=logout',
		type: 'GET',
		dataType: 'json',
		success: function(response){
				getPag('index.php');
				//window.history.pushState( '/teste/index.php', '', '/teste');
		}

	});

});


$('.btn-acesso').on('click', function(e){
	e.preventDefault();
	var paginaRef = $(this).attr('href');
	getPag(paginaRef);

});

$('#btn-cadastrar-usuario').on('click', function(e){
	e.preventDefault();
	if (senha.val().length >= 6) {
		console.log("é maior");
		if (!tem_maiusculas(senha.val())){
			$('#msg').html("<h4 class='alert alert-danger'>A senha tem que ter pelo menos  uma letra maiuscula</h4>");
		}else if (!tem_minusculas(senha.val())){
			$('#msg').html("<h4 class='alert alert-danger'>A senha tem que ter pelo menos  uma letra minuscula</h4>");
		}else if (!tem_numeros(senha.val())){
			$('#msg').html("<h4 class='alert alert-danger'>A senha tem que ter pelo menos  um número</h4>");
		}else{
			cadastrarUsuario();
		}
	}
	else {
		$('#msg').html("<h4 class='alert alert-danger'>A senha tem que ter pelo menos  6 caracteres</h4>");
	}

});

$('.btn-voltar').on('click', function(){
	getPag('index.php');
});

$('#btn-logar').on('click', function(e){
	e.preventDefault();
	autenticar();
});

function autenticar(){
	$.ajax({
		url: 'src/controller/UsuarioController.php',
		type: 'POST',
		dataType: 'json',
		data: form_login.serialize(),
		beforeSend : function(){
			msg_login.html('<img src="/img/ajax-loader.gif" />', 5000);
		},
		success: function(response){
			if (response.validar == 'true'){
				msg_login.append("<h4 class='alert alert-success'>Logado com sucesso!</h4>");
				
				getPag('perfil.php');
				window.history.pushState( '', '', '/teste/perfil.php?usuario='+ response.id);

			}else{
				msg_login.html("<h4 class='alert alert-danger'>Usuário ou senha inválido!</h4>");
			}
		}

	});
}

function validarConta(){
	var id_validacao =  getUrlVars();
	if (id_validacao.id != undefined) {
		$.ajax({
			url: 'src/controller/UsuarioController.php?id='+ id_validacao.id +'&opcao=ativar',
			type: 'GET',
			dataType : 'json',
			success: function(response){
				window.history.pushState("", "", "/teste/");
				alert(response.msg);	
			}
			

		});	
	}
	
}


function getPag(paginaRef){
	$.ajax({
		url: paginaRef,
		type: "GET",
		dataType : 'text',
		beforeSend : function(){
			var url =  getUrlVars();
			if (url.usuario != undefined) {
				window.history.pushState("", "", "teste");	
			}
		},
		success: function(response){
			
			$('body').html(response);
		
		},
		error: function( error ){
			console.log('Pagina não carregada', error);
		},
		complete: function( xhr, status){
			console.log('A requisição foi comcluida!');
			//window.history.pushState( '', '', '/teste');
		}
	});
}

var usuario_cadastrado;
var msg_cadatro;
function cadastrarUsuario(){
	$.ajax({
		url: 'src/controller/UsuarioController.php',
		type: "POST",
		dataType : 'json',
		data: form_usuario.serialize(),
		success: function(response){
			console.log(response);
			usuario_cadastrado = response.usuario;
			msg_cadatro = response.msg;
	

			if (response.error) {
				console.log(response)
			
				$('#msg').html("<h4 class='alert alert-danger'>" + response.error + "</h4>");

			}
				else{
					$('#msg').hide();
					window.setTimeout(function() {
	    				getPag('index.php');
						alert("O usuário "+ usuario_cadastrado + ", " + msg_cadatro);
					}, 100);
				}
			
										
			

			
		},
		error: function( error ){
			console.log('Pagina não carregada', error);
		},
		complete: function( xhr, status){
			console.log('A requisição foi comcluida!');
		}
	});
}

var numeros="0123456789";

function tem_numeros(texto){
   for(i=0; i<texto.length; i++){
      if (numeros.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

var letras="abcdefghyjklmnopqrstuvwxyz";

function tem_letras(texto){
   texto = texto.toLowerCase();
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}


var letras="abcdefghyjklmnopqrstuvwxyz";

function tem_minusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

var letras_maiusculas="ABCDEFGHYJKLMNOPQRSTUVWXYZ";

function tem_maiusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras_maiusculas.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}


});