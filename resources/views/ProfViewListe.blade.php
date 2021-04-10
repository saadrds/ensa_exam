@extends('layouts.navbars')

@section('content')

<div class="m-5">
    <h1>Prof Page</h1>
    
    <br>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Email</th>
      <th scope="col">Departement</th>

    </tr>
  </thead>
  <tbody>
  @foreach($prof as $line)
    <tr>
      <td>{{$line->NOM_PROF}}</td>
      <td>{{$line->PRENOM_PROF}}</td>
      <td>{{$line->EMAIL}}</td>
      <td>{{$line->NOM_DEP}}</td>
    </tr>  
  @endforeach    
  
    
  </tbody>
</table>
</div>


@endsection