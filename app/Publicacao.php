<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{


    protected $fillable = [
        'titulo','data_expiracao','imagem','texto','ativo','publicado','data_publicacao','tipo','user_id'
    ];



    public function user(){
       return $this->belongsTo('App\User');
    }


    public function log(){
        return $this->hasMany('App\Log','publicacao_id');
    }

}
