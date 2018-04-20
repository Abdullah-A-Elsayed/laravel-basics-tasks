<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
<?php $num=0; ?>
<!-- for each for single record goes through its attributes -->
@if($single == false)
 @foreach ($conts as $cont)
 <?php $num++; ?>
    <tr>
      <th scope="row"><?php echo $num; ?></th>
      <td>{{$cont->id}}</td>
      <td>{{$cont->name}}</td>
      <td>
        <form method="post" action ="{{url('/contenent/'.$cont->id)}}">
         <input type="hidden" name="_token" value="{{csrf_token()}}">
         <input type="hidden" name="_method" value="delete">
         <label for="delete_{{$cont->id}}"><i class="fa fa-trash-o"></i></label>
         <input type="submit" id="delete_{{$cont->id}}" value='' hidden>
        </form>
      </td>

      <td>
         <a id ="edit_{{$cont->id}}" href="{{url('contenent/'.$cont->id.'/edit')}}"><i class="fa fa-edit"></i></a>
      </td>

    </tr>
  @endforeach
@endif
@if($single==true)
    <tr>
      <th scope="row">1</th>
      <td>{{$conts->id}}</td>
      <td>{{$conts->name}}</td>
    </tr>
@endif
  </tbody>
</table>
<a href="{{url('contenent/create')}}"><span style="font-size: 30px;"><i class="fa fa-plus-circle"></span></i></a>
