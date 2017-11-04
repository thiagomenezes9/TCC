<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\Notificacao;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','matricula','coordenacao_id','ativo','resp_coord_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function responsavel(){
        return $this->belongsTo('App\Coordenacao','resp_coord_id');
    }

    public function membro()
    {
        return $this->belongsTo('App\Coordenacao','coordenacao_id');
    }


    public function publicacao(){
        return $this->hasMany('App\Publicacao','user_id');
    }

    public function log(){
        return $this->hasMany('App\Log','user_id');
    }



}
