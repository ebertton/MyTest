<?php require_once("principal/header.php"); ?>

<div class="card card-width mx-auto">
  <div class="card-header text-white bg-danger ">Realizar Login</div>
  <div class="card-body">
    <form id="form_login">
      <input type="hidden" required="true" name="opcao" value="login">
      <div class="form-group">
        <label for="usuario" class="col-sm-4">Usuário</label>
        <input required="true" type="text" class="fcol-sm-12 form-control" id="usuario" name="usuario" placeholder="Informe o usuário">
      </div>
      <div class="form-group">
        <label for="senha" class="col-sm-4">Senha</label>
        <input required="true" type="password" name="senha" class="col-sm-12 form-control" id="senha" placeholder="Senha">
      </div>
     <div class="form-group">
      <button type="submit" id="btn-logar" class="btn btn-success form-control">Entrar</button>
    </div>
    <div class="form-group">
      <button class="btn btn-info form-control btn-voltar">Voltar</button>
    </div>
    </form>
    
  </div>
  <div id="msg_login"></div>
</div>
<?php 
require_once("principal/footer.php");
 ?>