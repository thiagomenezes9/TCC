<?php

namespace App\Policies;

use App\Publicacao;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PublicacaoPolicy
{
    use HandlesAuthorization;

//
//    public function view(User $user, Post $post)
//    {
//        return $user->id === $post->user->id;
//    }



//    public function before($user , $ability){
//        if($user->membro == User::_TYPEADMIN){
//            return true;
//        }
//    }


    public function edit(User $user , Publicacao $publicacao){
        return $user->id === $publicacao->user->id;
    }
}
