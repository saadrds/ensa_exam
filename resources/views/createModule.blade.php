@extends('layouts.navbars')

  <!-- content -->
  

@section('content')
<div class="container">

        <h1 class="p-5">Ajouter Un Module</h1>

<form action="Modules" method='post'>
    @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Nom  de module </label>
        <input type="text" required  class="form-control" id="nom_module" name ="nom_module" aria-describedby="nom_respo" placeholder="entrez un nom pour ce module">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nom du Responsable</label>
        <input type="text" class="form-control" id="nom_respo" name ="nom_respo" aria-describedby="nom_respo" required>
        <div id="tab"></div>
        <div id="hiddenTab" hidden></div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Filiere</label>
        <select type="text" class="form-control" id="nom_filiere" name ="nom_filiere" aria-describedby="nom_filere" required>
        <option value="0" disabled selected>--Choisir une Filiere--</option>
        @foreach($filieres as $line)
        <option>{{$line->NOM_FILIERE}}</option>
        @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Niveau</label>
        <div id="niveau">
        <select type="text" class="form-control" name ="select_niveau" aria-describedby="niveau" id="select_niveau">
        <option value="0" disabled selected>--select Niveau--</option>
        </select>
        </div>
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
    @section('script')
    <script>
      $(document).ready(function(){
        $("#nom_filiere").change(function(e){
          //  alert(e.target.value);
          if(e.target.value  == "Cycle Préparatoire"){
            $("#select_niveau").load("/cp");
          
        
        }
          else{
            $("#select_niveau").load("/cycle");
            
          }
        });
        
        $('#nom_respo').keyup(function(e) {
          $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
      //alert(e.target.value);
      $("#tab").load('/getAllProfs',{like : e.target.value},function(){
        $("td").hover(function(e){
          $(this).css({
            'background': 'orange',
            'cursor' : "pointer"
          }
          );
        },function(e){
          $(this).css({
            'background': 'white',
            
          }
          );
        }),
        $(".td").click(function(e){
          $("#nom_respo").val(e.target.innerHTML);
          $("#tab").html("");
        });

      });
      
    });

      })
    </script>
    @endsection
