@extends('template')

@section('conteudo')
  <h1>Categorias</h1>

  @if(session('mensagem'))
    <div class="alert alert-success">
      {{ session('mensagem') }}
    </div>
  @endif

  <table class="table">
      <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Operações</th>
      </tr>
      @foreach ($categorias as $c)
      <tr>
          <td>{{ $c->id }}</td>
          <td>{{ $c->nome }}</td>
          <td>
            <a 
            href="#" class="btn btn-warning">Alterar</a> 

            <a href="#" class="btn btn-danger">Excluir</a>
          </td>
      </tr>
      @endforeach
  <table>
  <a href="{{ route('categoria_novo') }}" class="btn btn-primary">Adicionar novo</a><br>

<script>
  /*
  function excluir(id){
    if (confirm('Você deseja realmente excluir o usuário de id: ' + id + '?')){
      location.href = route('usuario_excluir', { id: id });
    }
  }
*/
</script>

@endsection