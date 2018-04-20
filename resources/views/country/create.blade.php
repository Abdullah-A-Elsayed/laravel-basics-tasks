@extends('index')

@section('title')
    Create a country
@endsection

@section('content')
<!-- need: all_conts -->
<form method="post" action="{{url('/country')}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <label for="name">Country Title</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Country title" name="name" value="{{ old('name')}}">
    </br>
    <!-- contenent -->
    <label for="contenent">choose contenent</label>
    <select name="contenent_id">
        @foreach($all_conts as $cont)
        <option value="{{$cont->id}}">{{$cont->name}}</option>
        @endforeach
    </select>
    <small class="form-text text-muted">let's build the world!</small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection