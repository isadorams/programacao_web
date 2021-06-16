<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;


class Venda extends Model
{
    use HasFactory;
     protected $table = 'vendas';

      function produtos(){
        return $this->belongsToMany(Produto::class, 'produtos_vendas', 'id_venda', 'id_produto')->withPivot('quantidade', 'subtotal')->withTimestamps();
}
