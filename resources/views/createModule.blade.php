@extends('layouts.navbars')

  <!-- content -->
  

@section('content')
<div class="container">

        <h1 class="p-5">Ajouter Un Module</h1>

<form action="Modules" method='post'>
    @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Nom  de module </label>
        <input type="text"   class="form-control" id="nom_module" name ="nom_module" aria-describedby="nom_respo" placeholder="entrez un nom pour ce module">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nom du Responsable</label>
        <input type="text"   class="form-control" id="nom_respo" name ="nom_respo" aria-describedby="nom_respo" placeholder="entrez un nom de responsable">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Filiere</label>
        <select type="text" class="form-control" id="nom_filiere" name ="nom_filere" aria-describedby="nom_filere">
        @foreach($filieres as $line)
        <option>{{$line->NOM_FILIERE}}</option>
        @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Semestre</label>
        <select type="text" class="form-control" id="semestre" name ="semestre" aria-describedby="semestre">
        <option value="0" disabled selected>--select Semestre--</option>
        <option value="1">Semestre 1</option>
        <option value="2">Semestre 2</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    @endsection