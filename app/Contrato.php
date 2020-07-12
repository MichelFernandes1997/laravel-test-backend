<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Arr;

class Contrato extends Model
{
    protected $tipoPessoa = [
        0 => 'Pessoa física',
        1 => 'Pessoa jurídica',
    ];

    protected $fillable = [
        'tipo_pessoa', 'documento', 'emailContratante', 'nomeContratante'
    ];

    public function propriedade()
    {
        return $this->hasOne(Imovel::class);
    }

    /**
    * @param int $value
    * @return string|null
    */
    public function getTipoPessoaAttribute($value)
    {
        return Arr::get($this->tipoPessoa, $value);
    }
}
