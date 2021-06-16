@extends('template')

@section('conteudo')
<h1>Nova Categoria</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('categoria_inserir') }}">
	@csrf
	<div class="form-floating mb-3">
	  <input type="text" class="form-control" id="f_nome" placeholder="Nome" name="nome" required value="{{ old('nome') }}">
	  <label for="f_nome">Nome</label>
	</div>
	<input type="submit" class="btn btn-success" value="Cadastrar">
</form>
@endsection('conteudo')