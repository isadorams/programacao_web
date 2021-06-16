<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\Produto;
use Auth;

class UsuarioController extends Controller
{
    
    function exibeLogin(){
        return view('login');
    }

    function tentaLogin(Request $req){
        // verificar usuario e senha
            $email = $req->input('email');
            $senha = $req->input('senha');
            
            $u = Usuario::where('email', '=', $email)->first();
            $us = Usuario::all();
            

            if ($u && $u->senha == $senha){
                session(['login' => $email]);
                return redirect()->route('usuario_lista');
            } else {
                return view('retornologin', [
                    'resposta' => "Acesso negado",
                    'tipo_resposta' => 'danger',
                    'usuarios' => $us
                ]);
            }

        }
        function novo(){
            $categorias = Categoria::all();
            return view('usuario_novo',['categorias' => $categorias]);
        }
        function inserir(Request $req){
            $nome = $req->input('nome');
            $endereco = $req->input('endereco');
            $cep = $req->input('cep');
            $cidade = $req->input('cidade');
            $estado = $req->input('estado');
            $email = $req->input('email');
            $senha = $req->input('senha');
            $id_categoria = $req->input('id_categoria');

            $u = new Usuario();
            $u->nome = $nome;
            $u->endereco = $endereco;
            $u->cep = $cep;
            $u->cidade = $cidade;
            $u->estado = $estado;
            $u->email = $email;
            $u->senha = $senha;
            $u->id_categoria = $id_categoria;

            $u->save();
            session()->flash('mensagem', "O usuário {$u->nome} foi inserido com sucesso");
            return redirect()->route('usuario_lista');
                    
        }
            function tela_principal(){
                    $us = Usuario::all();
                    return view('retornologin', [
                        'resposta' => "Acesso concedido",
                        'tipo_resposta' => 'success',
                        'usuarios' => $us
                    ]);   
            }

            function editar($id){
                    $u = Usuario::findOrFail($id);
                    $categorias = Categoria::all();
                    return view('usuario_editar', [ 'u' => $u,'categorias'=>$categorias]);
                }
            function alterar(Request $req, $id){
                $u = Usuario::findOrFail($id);
                $u->nome = $req->input('nome');
                $u->endereco = $req->input('endereco');
                $u->cep = $req->input('cep');
                $u->cidade = $req->input('cidade');
                $u->estado = $req->input('estado');
                $u->email = $req->input('email');
                $u->senha = $req->input('senha');
                $u->id_categoria = $req->input('id_categoria');
                $u->save();

                session()->flash('mensagem', "O usuário {$u->nome} foi alterado com sucesso");

                return redirect()->route('usuario_lista');
            }

            function excluir($id){
                $u = Usuario::findOrFail($id);
                $u->delete();
                session()->flash('mensagem', "o usuário {$u->nome} foi excluido com sucesso! ");
                return redirect()->route('usuario_lista');
            }

            function logout(){
                session()->forget('login');
                return redirect()->route('login');
            }
}