@extends('templates.main')
 
@section('content')
 
<form action="{{route('brand.store')}}" method="POST">
    @csrf
    <label class="mt-3">Name</label>
    <input 
        type="text" 
        name="name" 
        value="{{old('name')}}"
        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
    @if($errors->has('name'))
        <div class='invalid-feedback'>
            {{ $errors->first('name') }}
        </div>
    @endif
    <label class="mt-3">Descrição</label>
    <textarea 
        name="description" 
        rows="5" 
        class="form-control mt-1 {{ $errors->has('description') ? 'is-invalid' : '' }}">
        {{old('description')}}
    </textarea>
    @if($errors->has('description'))
        <div class='invalid-feedback'>
            {{ $errors->first('description') }}
        </div>
    @endif
    <input type="submit" value="salvar" class="btn btn-success mt-1">
</form>

@endsection 
        