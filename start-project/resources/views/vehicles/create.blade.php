@extends('templates.main')
 
@section('content')
 
<form action="{{route('vehicle.store')}}" method="POST">
    @csrf
    <label class="mt-3">Nome</label>
    <input type="text" name="name" class="form-control">
    <label class="mt-3">Cor</label>
    <input type="text" name="nickname" class="form-control">
    <label class="mt-3">Placa</label>
    <input type="number" name="time" class="form-control">
    <label name="brand" class="mt-3">Marca</label>
    <select name="brand" class="form-control">
        <option selected disabled></option>
        @foreach ($brands as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    <input type="submit" value="salvar" class="btn btn-success mt-1">
</form>

@endsection
        