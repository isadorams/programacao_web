@extends('templates')
@routes
@section('conteudo')

    <h1 class="alert alert-{{ $tipo_resposta }}">{{ $resposta }}</h1>

    @if(session('mensagem'))
    <div class="alert-alert-success">
      {{ session('mensagem') }}
    </div>
    @endif

    @if ($tipo_resposta == 'success')
    <table class="table">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>CEP</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Email</th>
        <th>Categoria</th>
        <th>Operações</th>
      </tr>
       @foreach ($usuarios as $u)
      <tr>
        <td>{{ $u->id }}</td>
        <td>{{ $u->nome }}</td>
        <td>{{ $u->endereco }}</td>
        <td>{{ $u->cep }}</td>
        <td>{{ $u->cidade }}</td>
        <td>{{ $u->estado }}</td>
        <td>{{ $u->email }}</td>
        <td>{{ $u->categoria->nome }}</td>
        <td> 
          <a href="{{ route('usuario_editar', ['id' => $u->id]) }}" class="btn btn-warning">Alterar</a>

          <a href="#" onclick="excluir({{ $u->id }})" class="btn btn-danger">Excluir</a>
         </td>
       </tr>
        @endforeach
    </table>
    @endif
    <a href="{{ route('usuario_novo') }}" class="btn btn-success">Adicionar novo</a><br>
    <a href="#" class="btn btn-danger mt-5">Logout</a>

    <script type="text/javascript">
      function excluir(id){
        if(confirm('Voce deseja excluir realmente o usuario de id: ' + id + '?')){
          location.href = route('usuario_excluir', { id: id });
        }
      }
    </script>
    
  @endsection 