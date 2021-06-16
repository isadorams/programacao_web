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
	  <label for="floatingInput">Endereço do usuário:</label>
	  <input type="text" class="form-control"  placeholder="Endereco do usuário"  name="endereco" id="endereco_id">
	</div>

	<div class="d-grid gap-2 col-6 mx-auto">
	  <label for="floatingInput">CEP:</label>
	  <input  type="tel" class="form-control"  placeholder="cep"  name="cep" id="cp_id">
	</div>

	<div class="d-grid gap-2 col-6 mx-auto">
	  <label for="floatingInput">Cidade:</label>
	  <input type="text" class="form-control"  placeholder="Cidade"  name="cidade" id="cidade_id">
	</div>

	<div class="d-grid gap-2 col-6 mx-auto">
	  <label for="floatingInput">Estado:</label>
	      <select  type="text" class="form-control"  placeholder="Estados"  name="estado" id="estados_id">
	           <option value="Acre-AC">Acre-AC</option>
	          <option value="Alagoas-AL">Alagoas-AL</option>
	          <option value="Amapá-AP">Amapá-AP</option>
	          <option value="Amazonas-AM">Amazonas-AM</option>
	          <option value="Bahia-BA">Bahia-BA</option>
	          <option value="Ceará-CE">Ceará-CE</option>
	          <option value="Distrito Federal-DF">Distrito Federal-DF</option>
	          <option value="Espírito Santo-ES">Espírito Santo-ES</option>
	          <option value="Goiás-GO">Goiás-GO</option>
	          <option value="Maranhão-MA">Maranhão-MA</option>
	          <option value="Mato Grosso-MT">Mato Grosso-MT</option>
	          <option value="Mato Grosso do Sul-MS">Mato Grosso do Sul-MS</option>
	          <option value="Minas Gerais-MG">Minas Gerais-MG</option>
	          <option value="Pará-PA">Pará-PA</option>
	          <option value="Paraíba-PB">Paraíba-PB</option>
	          <option value="Paraná-PR">Paraná-PR</option>
	          <option value="Pernambuco-PE">Pernambuco-PE</option>
	          <option value="Piauí-PI">Piauí-PI</option>
	          <option value="Roraima-RR">Roraima-RR</option>
	          <option value="Rondônia-RO">Rondônia-RO</option>
	          <option value="Rio de Janeiro-RJ">Rio de Janeiro-RJ</option>
	          <option value="Rio Grande do Norte-RN">Rio Grande do Norte-RN</option>
	          <option value="Rio Grande do Sul-RS">Rio Grande do Sul-RS</option>
	          <option value="Santa Catarina-SC">Santa Catarina-SC</option>
	          <option value="São Paulo-SP">São Paulo-SP</option>
	          <option value="Sergipe-SE">Sergipe-SE</option>
	          <option value="Tocantins-TO">Tocantins-TO</option>
	      </select>
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
	  <label for="floatingInput">Categoria:</label>
	      <select name="categoria" type="text" class="form-control"  placeholder="Categoria" id="id_categoria">
	      	@foreach ($categoria as $k => $cat)
	          <option value="{{ $cat->id }}" {{ ($cat->id == $u->id_categoria ? "selected" : "") }}>{{ $cat->nome }}</option>
	          <option value="{{ $cat->id }}" {{ ($cat->id == $u->id_categoria ? "selected" : "") }}>{{ $cat->nome }}</option>
	        @endforeach 
	       </select>
	  </div>
	
	<input type="submit" class="btn btn-dark"  value="Cadastrar">
</form>
@endsection('conteudo')