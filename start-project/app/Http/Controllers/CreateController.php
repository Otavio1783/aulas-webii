<?php

namespace App\Http\Controllers;

use App\Models\Veiculos;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(Request $request){

    $request->validate([
        'tipo'=>'required',
        'modelo' => 'required',
        'placa' => 'required',
        'cor' => 'required'
    ]);
    Veiculos::create([
        'tipo' => $request->tipo,
        'modelo' => mb_strtoupper($request->modelo, 'UTF-8'),
        'placa' => $request->placa,
        'cor' => $request->cor,
    ]);
    return redirect()->route('veiculos.index');    
    }
}

