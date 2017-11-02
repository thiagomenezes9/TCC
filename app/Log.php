<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'user_id','publicacao_id','desc'
    ];


    public function publicacao(){
       return $this->belongsTo('App\Publicacao');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }


}
