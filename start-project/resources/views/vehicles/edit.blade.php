@extends('templates.main')

@section('content')

<form action="{{route('vehicle.update', $vehicle->id)}}" method="POST">

    @csrf
    @method('PUT')
    <label class="mt-3">Nome</label>
    <input type="text" name="nome" class="form-control mt-3" value="{{$vehicle->name}}"/>
    <label class="mt-3">Cor</label>
    <input type="text" name="abbreviation" class="form-control mt-3" value="{{$vehicle->color}}"/>
    <label class="mt-3">Placa</label>
    <input type="number" name="duracao" class="form-control mt-3" value="{{$vehicle->plate}}"/>
    <label name="brand" class="mt-3">Marca</label>
    <select name="brand" class="form-control">
        <option disabled></option>
        @foreach ($brands as $item)
            @if($item->id == $vehicle->brand_id)
                <option value="{{$item->id}}" selected>{{$item->name}}</option>
            @else
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endif
        @endforeach
    </select>
<input type="submit" value="Change" class="btn btn-success mt-1">
</form>


@endsection