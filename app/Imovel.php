<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imovel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'emailProprietario', 'estado', 'cidade', 'rua', 'numero', 'complemento'
    ];

    protected $dates = ['deleted_at'];
}
