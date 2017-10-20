<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenacao extends Model
{
    protected $fillable = ['nome','sigla','ativo','resp_id'];


//    public function responsavel(){
//        return $this->belongsTo('App\User', 'id');
//    }
}
