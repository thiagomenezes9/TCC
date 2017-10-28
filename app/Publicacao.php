<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{


    protected $fillable = [
        'titulo','data_expiracao','imagem','texto','ativo','publicado','data_publicacao'
    ];



    public function user(){
        $this->belongsTo('App\User');
    }


    public function log(){
        $this->hasMany('App\Log');
    }

}
