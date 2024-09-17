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

    public function store($request){

    $request->validate([
        'type'=>'required',
        'model' => 'required',
        'plate' => 'required',
        'color' => 'required'
    ]);
    Veiculos::create([
        'type' => $request->tipo,
        'model' => mb_strtoupper($request->modelo, 'UTF-8'),
        'plate' => $request->placa,
        'color' => $request->cor,
    ]);
    return redirect()->route('vehicles.index');    
    }
}

