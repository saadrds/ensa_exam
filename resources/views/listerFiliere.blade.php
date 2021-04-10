@extends('layouts.navbars')

@section('content')

<div class="m-5">
    <h1>Prof Page</h1>
    
    <br>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nom de la filiere</th>
      <th scope="col">Responsable</th>
      <th scope="col" style="width:120px;"></th>

    </tr>
  </thead>
  <tbody>
  @foreach($filieres as $line)
    <tr>
      <td>{{$line->NOM_FILIERE}}</td>
      <td>{{$line->CHEF_FILIERE}}</td>
      <td><button type="button" class="btn btn-info" src="/">Accede au Filiere</button></td>
    </tr>  
  @endforeach    
  
    
  </tbody>
</table>
</div>


@endsection