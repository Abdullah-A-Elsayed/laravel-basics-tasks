@extends('index')

@section('title')
    edit a contenent
@endsection

@section('content')
<form method="post" action="{{url('/contenent/'.$cont->id)}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="hidden" name="_method" value="put">
  <div class="form-group">
    <label for="name">Contenent Title</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Contenent title" name="name" value="{{ $cont->name }}">
    <small class="form-text text-muted">let's improve the world!</small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection