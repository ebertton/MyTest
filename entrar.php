<?php require_once("principal/header.php"); ?>
<div class="card card-width mx-auto">
  <div class="card-header text-white bg-danger ">Realizar Login</div>
  <div class="card-body">
    <form>
      <div class="form-group">
        <label for="usuario">Usuário</label>
        <input required="true" type="usuario" class="form-control" id="usuario" placeholder="Informe o usuário">
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input required="true" type="password" class="form-control" id="senha" placeholder="Senha">
      </div>
     
      <button type="submit" class="btn btn-primary">Entrar</button>
      <button class="btn btn-voltar">Voltar</button>
    </form>
  </div>
</div>
<?php 
require_once("principal/footer.php");
 ?>