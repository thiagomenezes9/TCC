<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{


    protected $fillable = [
        'assunto','data_expiracao','imagem','texto','ativo','publicado'
    ];



    public function user(){
        $this->belongsTo('App\User');
    }

}
