<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Auth;

class UsuariosController extends Controller
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


    function inserir(Request $req){
            $nome = $req->input('nome');
            $cpf = $req->input('cpf');
            $telefone = $req->input('telefone');
            $email = $req->input('email');
            $senha = $req->input('senha');
            $num_conta = $req->input('num_conta');

            $u = new Usuario();
            $u->nome = $nome;
            $u->cpf = $cpf;
            $u->telefone = $telefone;
            $u->email = $email;
            $u->senha = $senha;
            $u->num_conta = $num_conta;

            $u->save();
            session()->flash('mensagem', "o usuário {$u->nome} foi inserido com sucesso! ");
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
        $u->cpf = $req->input('cpf');
        $u->telefone = $req->input('telefone');
        $u->email = $req->input('email');
        $u->senha = $req->input('senha');
        $u->num_conta = $req->input('num_conta');
        $u->save();

        session()->flash('mensagem', "o usuário {$u->nome} foi alterado com sucesso! ");
        return redirect()->route('usuario_lista');
    }

    function excluir($id){
        $u = Usuario::findOrFail($id);
        $u->delete();
        session()->flash('mensagem', "o usuário {$u->nome} foi excluido com sucesso! ");
         return view('usuario_lista');
    }

    function logout(){
        session()->forget('login');
        return redirect()->route('login');
    }
}
