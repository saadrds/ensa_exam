@extends('layouts.navbars')

@section('content')

<div class="m-5">
    <h1>Prof Page</h1>

    <br>
    <form action="/createProf" method='post'>
    @csrf
      
      <div class="form-group">
        <label for="exampleInputEmail1">Nom :</label>
        <input type="text" require class="form-control" id="nom" name ="nom" aria-describedby="nom" placeholder="Enter nom">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Prenom :</label>
        <input type="text" class="form-control" id="prenom" name ="prenom" aria-describedby="prenom" placeholder="Enter prenom">
      </div>
      <div class="form-group">
      <div class="form-group">
        <label for="exampleInputEmail1">Adresse Email :</label>
        <input name ="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">exemple: a.nom@uca.ma</small>
      </div>
        <label for="exampleInputEmail1">Departement :</label>
        <select class="form-control" id="departement" name ="dep" aria-describedby="Departement" placeholder="selectioner departement">
        <option value=null selected="selected" disabled>-- Choisez leur departement --</option>
        @foreach($departement as $line)
        <option value= {{@$line->ID_DEP}}>{{$line->NOM_DEP}}</option>
        @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Ajouter Prof</button>
    </form>
</div>


@endsection