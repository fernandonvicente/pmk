<?php

namespace App\Models\All;

use Illuminate\Database\Eloquent\Model;

class Doador extends Model
{
    protected $table = 'doador';

    protected $fillable = ['intervalo_de_doacao_id', 'forma_de_pagamento_id', 'nome', 'email', 'documento', 'telefone', 'dt_nascimento', 'valor_doacao', 'cep', 'endereco', 'num', 'complemento', 'bairro', 'cidade', 'uf'];
}
