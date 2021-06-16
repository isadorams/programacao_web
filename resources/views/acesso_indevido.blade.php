@extends('template')

@section('conteudo')
	<h1 class="alert alert-danger">
	Você não tem acesso a esta página
	</h1>
	<a href="{{ route('login') }}">Voltar</a>
@endsection