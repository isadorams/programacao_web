@extends('layouts.app')

@section('content')

	<div class="alert alert-secondary" role="alert">
	 <h2>Novo Usuário</h2>
	</div>

<form method="POST" action="{{ route('usuario_inserir') }}">
	@csrf

	<div class="d-grid gap-2 col-6 mx-auto">
	  <label for="floatingInput">Nome de usuário:</label>
	  <input type="text" class="form-control"  placeholder="Nome de usuário" name="nome" id="usuario_id">
	</div>

	<div class="d-grid gap-2 col-6 mx-auto">
	  <label for="floatingInput">CPF:</label>
	  <input  type="tel" class="form-control"  placeholder="cpf"  name="cpf" id="cpf_id">
	</div>

	<div class="d-grid gap-2 col-6 mx-auto">
	  <label for="floatingInput">Telefone:</label>
	  <input  type="tel" class="form-control"  placeholder="telefone"  name="telefone" id="telefone_id">
	</div>
	
	<div class="d-grid gap-2 col-6 mx-auto">
		<label for="f_email">Email</label>
	   <input type="email" class="form-control" id="f_email" placeholder="name@example.com" name="email">
	</div>
	
	<div class="d-grid gap-2 col-6 mx-auto">
	<label for="f_senha">Senha</label>
	 <input type="password" class="form-control" id="f_senha" placeholder="Senha" name="senha">
	</div>

	<div class="d-grid gap-2 col-6 mx-auto">
	  <label for="floatingInput">Número da Conta:</label>
	  <input  type="tel" class="form-control"  placeholder="num_conta"  name="num_conta" id="num_conta_id">
	</div>

	
	<input type="submit" class="btn btn-dark"  value="Cadastrar">
</form>
@endsection('conteudo')