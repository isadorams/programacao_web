<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;

class CarrinhoController extends Controller
{
    function pre_adicao($produto){
        $p = Produto::find($produto);

        $carrinho = session('carrinho');
        return view('carrinho', [
            'produto' => $p, 
            'carrinho' => $carrinho
        ]);
    }

    function finaliza_adicao(Request $req){
        $p = Produto::find($req->input('id'));
        $informacoes = [
            'produto' => $p,
            'quantidade' => $req->input('quantidade')
        ];

        if (!session()->exists('carrinho')){
            $carrinho = [];
            $carrinho[] = $informacoes;
            session(['carrinho' => $carrinho]);
        } else {
            $carrinho = session('carrinho');

            $atualizacao = false;
            for($i=0; $i<count($carrinho); $i++){
                if ($carrinho[$i]['produto']->id == $p->id){
                    $carrinho[$i]['quantidade'] += $informacoes['quantidade'];
                    $atualizacao = true;
                }
            }

            if (!$atualizacao){
                $carrinho[] = $informacoes;
            }
            
            session(['carrinho' => $carrinho]);
        }

        return redirect()->route('principal');
    }

    function visualiza(){
        $p = null;
        $carrinho = session('carrinho');

        return view('carrinho', [
            'produto' => $p, 
            'carrinho' => $carrinho
        ]);
    }

    function fecha_carrinho(){
        $venda = new Venda();
        $venda->valor_total = 0;
        $venda->quantidade_itens = 0;
        $venda->save();

        $carrinho = session('carrinho');
        $valor_total = 0;

        foreach ($carrinho as $c){
            # Atualização do total
            $valor_total += $c['produto']->valor_unitario * $c['quantidade'];

            # Atualização das quantidades em estoque
            $c['produto']->quantidade_atual -= $c['quantidade'];
            $c['produto']->save();

            # Vínculo da venda com o produto
            $venda->produtos()->attach($c['produto']->id, [
                'quantidade' => $c['quantidade'],
                'subtotal' => $c['produto']->valor_unitario * $c['quantidade']
            ]);
        }

        # Atualiza venda
        $venda->quantidade_itens = count($carrinho);
        $venda->valor_total = $valor_total;
        $venda->save();

        session()->forget('carrinho');
        session()->flash('mensagem', 'Venda efetuada com sucesso');

        return redirect()->route('principal');

    }
}
