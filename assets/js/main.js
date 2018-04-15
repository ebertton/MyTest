$(document).ready(function(){
	var form_usuario = $('#form_usuario');

$('a').on('click', function(e){
	e.preventDefault();
	var paginaRef = $(this).attr('href');
	getPag(paginaRef);

});

$('#btn-cadastrar-usuario').on('click', function(e){
	e.preventDefault();
	cadastrarUsuario();

});

$('.btn-voltar').on('click', function(){
	getPag('index.php');
});



function getPag(paginaRef){
	$.ajax({
		url: paginaRef,
		type: "GET",
		dataType : 'text',
		success: function(response){
			
			$('body').html(response);
		},
		error: function( error ){
			console.log('Pagina não carregada', error);
		},
		complete: function( xhr, status){
			console.log('A requisição foi comcluida!');
		}
	});
}
var senha = $('#senha');
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
			
				$('#msg').html("<h4 class='alert alert-danger'>" + response.error + "</h4>");

			}if (senha.val().length < 6) {
				console.log(senha.val().length)
				$('#msg').html("<h4 class='alert alert-danger'>A senha tem que ter pelo menos  6 caracteres</h4>");
			}if (senha.val().length >= '6') {
				if (!tem_maiusculas(senha.val())){
					$('#msg').html("<h4 class='alert alert-danger'>A senha tem que ter pelo menos  uma letra maiuscula</h4>");
				}
				if (!tem_minusculas(senha.val())){
					$('#msg').html("<h4 class='alert alert-danger'>A senha tem que ter pelo menos  uma letra minuscula</h4>");
				}
				if (!tem_numeros(senha.val())){
					$('#msg').html("<h4 class='alert alert-danger'>A senha tem que ter pelo menos  um número</h4>");
				}
				else{
					$('#msg').hide();
					window.setTimeout(function() {
	    				getPag('index.php');
						alert("O usuário "+ usuario_cadastrado + ", " + msg_cadatro);
					}, 1000);
				}
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


});