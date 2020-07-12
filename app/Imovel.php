<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Imovel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'emailProprietario', 'estado', 'cidade', 'rua', 'numero', 'complemento', 'contrato_id', 'email_verified_at'
    ];

    protected $dates = ['deleted_at'];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'contrato_id', 'id');
    }
}
