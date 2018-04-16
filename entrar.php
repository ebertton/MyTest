<?php require_once("principal/header.php"); ?>

<div class="card card-width mx-auto">
  <div class="card-header text-white bg-danger ">Realizar Login</div>
  <div class="card-body">
    <form id="form_login">
      <input type="hidden" required="true" name="opcao" value="login">
      <div class="form-group">
        <label for="usuario">Usuário</label>
        <input required="true" type="text" class="form-control" id="usuario" name="usuario" placeholder="Informe o usuário">
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input required="true" type="password" name="senha" class="form-control" id="senha" placeholder="Senha">
      </div>
     
      <button type="submit" id="btn-logar" class="btn btn-primary">Entrar</button>
      <button class="btn btn-voltar">Voltar</button>
    </form>
    
  </div>
  <div id="msg_login"></div>
</div>
<?php 
require_once("principal/footer.php");
 ?>