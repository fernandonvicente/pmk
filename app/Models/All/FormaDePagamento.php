<?php

namespace App\Models\All;

use Illuminate\Database\Eloquent\Model;

class FormaDePagamento extends Model
{

	protected $table = 'forma_de_pagamento';

    protected $fillable = ['nome'];

}
