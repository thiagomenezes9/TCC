<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenacao extends Model
{
    protected $fillable = ['nome','sigla','ativo'];


//    public function responsavel(){
//        return $this->belongsTo('App\User', 'id');
//    }


    public function membros()
    {
        return $this->hasMany('App\User','coordenacoes_id');
    }

    public function responsavel(){
        return $this->hasOne('App\User','resp_coord_id');
    }


}
