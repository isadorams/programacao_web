@extends('template_loja')

@section('conteudo')

	@foreach($ps as $p)
	<div class="col-md-3 mb-2 ">
		<div class="col-md-12 card {{ (!$loop->first ? 'ml-2': '') }}">
		  <img src="https://upload.wikimedia.org/wikipedia/commons/1/1b/Square_200x200.png" class="card-img-top img-fluid" alt="...">
		  <div class="card-body">
		    <h5 class="card-title">{{ $p->nome }}</h5>
		    <p class="card-text">{{ $p->valor_unitario }}</p>
		    <a href="{{ route('adiciona_carrinho', ['produto'=>$p->id]) }}" class="btn btn-primary w-100">Adicionar ao carrinho</a>
		  </div>
		</div>
	</div>
	@endforeach

@endsection