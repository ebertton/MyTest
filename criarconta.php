<?php require_once("principal/header.php"); ?>
<div class="card card-width mx-auto">
  <div id="msg"></div>
  <div class="card-header text-white bg-primary ">Cadastro</div>
  <div class="card-body">
    <form id="form_usuario" method="post" action="src/controller/UsuarioController.php">
      <div class="form-group">
        <input type="hidden" name="opcao" value="cadastrar">     
        <label for="nome">Nome completo*</label>
        <input required="true" type="text" class="form-control" id="nome" name="nome" placeholder="Informe o nome completo">        
      </div>
       <div class="form-group">
        <label for="usuario">Usuário*</label>
        <input required="true" type="text" class="form-control" id="usuario"  name="usuario" placeholder="Informe o nome completo">        
      </div>
      <div class="form-group">
        <label for="email">E-mail*</label>
        <input required="true" type="email" class="form-control" id="email" name="email" aria-describedby="emailInfo" placeholder="Informe o e-mail">
        <small id="emailInfo" class="form-text text-muted">Informe um e-mail valido. Ex: email@email.com.</small>
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" required="true" class="form-control" id="senha" name="senha" placeholder="Senha">
      </div>

     
      <button type="submit" class="btn btn-primary" id="btn-cadastrar-usuario">Cadastrar</button>
      <button class="btn btn-voltar" >Voltar</button>
    </form>
  </div>
</div>
<?php 
require_once("principal/footer.php");
 ?>