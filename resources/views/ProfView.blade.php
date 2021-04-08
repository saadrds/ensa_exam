@extends('layouts.navbars')

@section('content')

<div class="m-5">
    <h1>Prof Page</h1>
    @foreach($prof as $line)
        <p>{{$line->NOM_PROF}}</p>

    @endforeach

    <form action="/prof" method='post'>
    @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name ="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">Nom</label>
        <input type="text" class="form-control" id="nom" name ="nom" aria-describedby="nom" placeholder="enter nom">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Prenom</label>
        <input type="text" class="form-control" id="prenom" name ="prenom" aria-describedby="prenom" placeholder="enter prenom">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">id departement</label>
        <input type="number" class="form-control" id="departement" name ="id_dep" aria-describedby="departement" placeholder="enter dep">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection