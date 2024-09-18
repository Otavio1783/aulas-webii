@extends('templates.main')
 
@section('content')

    <div class="card mt-2">
        <div class="card-header">
            <b>{{$vehicle->nome}}</b> ({{$vehicle->color}})
        </div>
        <div class="card-body">
            <h5 class="card-title">Informações do Veículo</h5>
            <p class="card-text">
                <b>Placa</b> {{$vehicle->plate}}
            </p>
            <p class="card-text">
                <b>Marca:</b> {{$vehicle->brand->name}}
            </p>
            
          <a href="{{route('vehicle.index')}}" class="btn btn-secondary mt-2" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" fill="#FFF" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
            Voltar
          </a>
        </div>
      </div>

@endsection
        