<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Venda;


class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';

    function vendas(){
        return $this->belongsToMany(Venda::class, 'produtos_vendas', 'id_produto', 'id_venda')->withPivot('quantidade', 'subtotal')->withTimestamps();
    }

}
