@extends('index')

@section('title')
    edit a country
@endsection

@section('content')
<!-- variables needed
    all_conts
    contr
 -->

<form method="post" action="{{url('/country/'.$contr->id)}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="hidden" name="_method" value="put">
  <div class="form-group">
    <label for="name">Country Title</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Country" name="name" value="{{ $contr->name }}">
    <!-- contenent -->
    </br>
    <label for="contenent">choose contenent</label>
    <select name="contenent_id">
        @foreach($all_conts as $cont)
        <option 
        @if($contr->contenent->name == $cont->name)
            selected
        @endif
        value="{{$cont->id}}">{{$cont->name}}</option>
        @endforeach
    </select>
    <small class="form-text text-muted">let's improve the world!</small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection