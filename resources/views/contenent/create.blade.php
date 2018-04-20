@extends('index')

@section('title')
    Create a contenent
@endsection

@section('content')
<form method="post" action="{{url('/contenent')}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <label for="name">Contenent Title</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Contenent title" name="name" value="{{ old('name')}}">
    <small class="form-text text-muted">let's build the world!</small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection