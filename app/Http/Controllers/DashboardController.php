<?php

namespace App\Http\Controllers;

use App\Publicacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
//        $publicacoes = Publicacao::all()->where([['tipo', '=', 'TV'], ['ativo', '=', '1']]);

        $publicacoes = DB::table('publicacaos')->where([
                           ['tipo', '=', 'TV'],
                            ['publicado', '=', '1']
                         ])
//                       ->select('publicacaos.*')->where('ativo', '=', '1')
//                    ->select('publicacaos.*')
            ->get();

//        dd($publicacoes);

        return view('dashboard',compact('publicacoes'));
    }


    public function tv(){

        $publicacoes = DB::table('publicacaos')->where([
            ['tipo', '=', 'TV'],
            ['publicado', '=', '1']
        ])
//                       ->select('publicacaos.*')->where('ativo', '=', '1')
//                    ->select('publicacaos.*')
            ->get();

//        dd($publicacoes);

        return view('publicacao/showTV',compact('publicacoes'));
    }




    public function tvv(){

        return view('publicacao/showTVV');

    }
}
