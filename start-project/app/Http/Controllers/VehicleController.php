<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicles;
use App\Models\Brand;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vehicles::with(['brand'])->get();

        return view('vehicle.index',compact(['data']));
    }

    public function create()
    {
        $brands = Brand::orderBy('name')->get();
        return view('vehicle.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $brand = Brand::find($request->brand);

        if(isset($brand)){
            $vehicle = new Vehicles();
            $vehicle->name = mb_strtoupper($request->name,'UTF-8');
            $vehicle->brand = mb_strtoupper($request->brand,'UTF-8');
            $vehicle->plate = $request->plate;
            $vehicle->color = $request->color;
            $vehicle->brand()->associate($brand);
            $vehicle->save();

            return redirect()->route('vehicle.index');
        }
    }

    public function show($id)
    {
        $curso = Vehicles::find($id);

        if(isset($vehicle)){
            return view('vehicle.show', compact('vehicle'));
        }
        return "<h1>VEÍCULO NÃO ENCONTRADO!</h1>";
    }

    public function edit($id)
    {
        $vehicle = Vehicles::find($id);
        $brand = Brand::orderBy('name')->get();

        if(isset($vehicle)){

            return view('vehicle.edit', compact('vehicle','brands'));

        }
        return "<h1>VEÍCULO NÃO ENCONTRADO!</h1>";
    }

    public function update(Request $request, $id) 
    {
        $vehicle = Vehicles::find($id);
        $brand = Brand::find($request->brand);

        if(isset($brand) && isset($vehicle)){
            $vehicle->name = mb_strtoupper($request->name,'UTF-8');
            $vehicle->brand = mb_strtoupper($request->brand,'UTF-8');
            $vehicle->plate = $request->plate;
            $vehicle->color = $request->color;
            $vehicle->brand()->associate($brand);
            $vehicle->save();

            return redirect()->route('curso.index');
        }
        return "<h1>VEÍCULO NÃO ENCONTRADO!</h1>";
    }

    public function destroy($id)
    {
        $curso = Vehicles::find($id);

        if(isset($vehicle)){
            $vehicle->delete();
            return redirect()->route('vehicle.index');
        }
        return "<h1>VEÍCULO NÃO ENCONTRADO!</h1>";
    }
}
