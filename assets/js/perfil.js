$(document).ready(function(){
	$(".navbar").removeClass( "navbar-oculta" );
	//$('#nome_perfil').text('Ebertton');
	carregarDadosPerfil();

	function carregarDadosPerfil(){
		var id_validacao =  getUrlVars();
		if (id_validacao.usuario != undefined) {
			$.ajax({
				url: 'src/controller/UsuarioController.php?usuario='+ id_validacao.usuario +'&opcao=perfil',
				type: "GET",
				dataType : 'json',
				success: function(response){
					$('#nome_perfil').text(response.nome_completo);
					$('#email_perfil').text("E-Mail: "+response.email);
					$('#usuario_perfil').text("Usuário: "+response.usuario);
					$("#avatar").attr("src",response.img);
					
				},
				complete: function(){
					console.log('entrou');
					//window.history.pushState( '/teste', '', '/teste');
				}
			});
		}else{
			console.log('Não carregou o perfil');
		}
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