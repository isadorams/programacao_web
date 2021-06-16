@extends('templates')

@section('conteudo')
	  <nav class="navbar navbar-light bg-light">
	  <div class="d-grid gap-2 d-md-block">
	     <button type="button" class="btn btn-dark" type="submit">Novo Cadastro</button>
	      <button type="button" class="btn btn-dark" type="submit">Já possuo Cadastro</button></div>
	    <form class="d-flex">
	      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Pesquisar">
	      <button type="button" class="btn btn-dark" type="submit">Pesquisar</button>
	    </form>
	</nav>
	<br><br>
	<form action="/tenta_login" method="POST">
	@csrf
	
	<div class="d-grid gap-2 col-6 mx-auto">
        <label for="floatingInput">Email:</label>
        <input type="text" name="email" class="form-control"  placeholder="Email" id="email_id">
      </div>

      <div class="d-grid gap-2 col-6 mx-auto">
        <label for="floatingInput">Senha:</label>
        <input type="password" name="senha" class="form-control"  placeholder="Senha" id="senha_id">
      </div> <br>

	<input type="submit" name="Entrar" class="d-grid gap-2 col-6 mx-auto btn btn-dark"/>
</form>
 

@endsection 

