<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contrato extends Model
{
    use SoftDeletes;

    protected $tipoPessoa = [
        0 => 'Pessoa física',
        1 => 'Pessoa jurídica',
    ];

    protected $fillable = [
        'tipo_pessoa', 'documento', 'emailContratante', 'nomeContratante', 'imovel_id', 'email_verified_at'
    ];

    public function imovel()
    {
        return $this->hasOne(Imovel::class, 'id');
    }

    /**
    * @param int $value
    * @return string|null
    */
    public function getTipoPessoaAttribute($value)
    {
        return $this->tipoPessoa[$value];
    }
}
