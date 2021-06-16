<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    function tela_principal(){
        $categorias = Categoria::all();
        return view('categoria_lista', ['categorias' => $categorias]);
    }

    function novo(){
        return view('categoria_novo');
    }

    function inserir(Request $req){
        $req->validate([
            'nome' => 'bail|required|max:60'
        ]);

        $categoria = new Categoria();
        $categoria->nome = $req->input('nome');
        $categoria->save();

        session()->flash('mensagem', "A categoria {$categoria->nome} foi inserida com sucesso");
        return redirect()->route('categoria_lista');
    }
}
