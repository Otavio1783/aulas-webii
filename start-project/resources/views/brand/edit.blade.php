@extends('templates.main')

@section('content')

<form action="{{route('brand.update', $brand->id)}}" method="POST">

@csrf
@method('PUT')
<label class="mt-3">Name</label>
<input type="text" name="name" class="form-control mt-3" value="{{$brand->name}}"/>

<textarea name="description" rows="3" class="form-control mt-1">
    {{$brand->description}}
</textarea>
<input type="submit" value="Change" class="btn btn-success mt-1">
</form>


@endsection