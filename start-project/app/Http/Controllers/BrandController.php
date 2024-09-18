<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Vehicles;
use Dompdf\Dompdf;
use PhpParser\Node\Stmt\Foreach_;

class BrandController extends Controller
{
    private $regras = [
        'name' => 'required|max:100|min:3|unique:brands',
        'description' => 'required|max:300|min:10',
        ];

    private $msgs = [
        "required" => "O preenchimento do campo [:attribute] é obrigatório!",
        "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
        "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        "unique" => "Já existe um endereço cadastrado com esse [:attribute]!"
    ];

    public function index()
    {
        $data = Brand::with('vehicle')->get();

        return view('brand.index',compact(['data']));
        
    }

    public function create()
    {
        return view('brand.create');
    }


    public function store(Request $request)
    {
        $request->validate($this->regras, $this->msgs);
    
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();
        return redirect()->route('brand.index');
    }

    public function show($id)
    {
        $brand = Brand::find($id);

        if(isset($brand)){
            return view('brand.show', compact('brand'));
        }
        return "<h1>ERRO, MARCA NÃO ENCONTRADA!</h1>";
    }

    public function edit($id)
    {
        $brand = Brand::find($id);

        if(isset($brand)){
            return view('brand.edit', compact('brand'));

            return "<h1>MARCA NÃO ENCONTRADA!</h1>";
        }
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);

        if(isset($brand)){
            $brand->name = $request->name;
            $brand->description = $request-> description;
            $brand->save();
            return redirect()->route('brand.index');
        }
        return "<h1>MARCA NÃO ENCONTRADA!</h1>";
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        if(isset($brand)){
            $brand->delete();
            return redirect()->route('brand.index');
        }
        return "<h1>MARCA NÃO ENCONTRADA</h1>";
    }

    public function report($id){

        $cursos = Vehicles::where('brand_id', $id)->get();

        $dompdf = new Dompdf();
       
        $dompdf->loadHtml(view('brand.report', compact('vehicles')));
       
        $dompdf->setPaper('A4', 'landscape');
        
        $dompdf->render();
       
        $dompdf->stream("relatorio-dos-veiculos.pdf", array("Attachment" => false));
    }

    public function graph(){


        $brand = Brand::with('vehicle')->orderBy('name')->get();

        
        $data = [ 
            ["MARCA", "NÚMERO DE VEÍCULOS"] 
        ];
        $cont = 1;
        foreach($brand as $item){
            $data[$cont] = [
                $item->name, count($item->curso)
            ];
            $cont++;
        }

        
        $data = json_encode($data);
        
        return view('brand.graph', compact(['data']));
        
    }
}
