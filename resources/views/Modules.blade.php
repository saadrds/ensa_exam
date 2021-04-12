@extends('layouts.navbars')

  <!-- content -->
  

@section('content')
<div class="container">
  <h1 class="p-5">Liste des Modules</h1>
  <div class="d-flex align-items-start bd-highlight mb-3">
    <div class="form-group mr-auto">
      <select type="text" class="form-control select" id="nom_filiere" name ="nom_filiere" aria-describedby="nom_filere" required>
        <option value="0" disabled selected>--Choisir une Filiere--</option>
        @foreach($filieres as $line)
        <option>{{$line->NOM_FILIERE}}</option>
        @endforeach
      </select>
    </div>
      <div class="form-group mr-auto">
        <div id="niveau">
          <select type="text" class="form-control select" name ="select_niveau" aria-describedby="niveau" id="select_niveau">
            <option value="0" disabled selected>--select Niveau--</option>
          </select>
        </div>
      </div>
      <div class="form-group mr-auto">
        <select type="text" class="form-control select" id="semestre" name ="semestre" aria-describedby="semestre">
        <option value="0" disabled selected>--select Semestre--</option>
        <option value="1">Semestre 1</option>
        <option value="2">Semestre 2</option>
        </select>
      </div>
  </div>
  <div id="liste_modules" class="mr-4">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id de Module</th>
      <th scope="col">Nom de Module</th>
      <th scope="col">Responsable</th>
      <th scope="col">Semesetre</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody id="tbody">
    
  
    
  </tbody>
</table>
</div>
  </div>
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
        $(".select").change(function(e){
          
            afficherModules();
        })
        function afficherModules(){
          if($("#select_niveau").val() == null || $("#semestre").val() == null || $("#nom_filiere").val() == null){
          }
          else{
            $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
            $("#tbody").load("/allModules",{filiere : $("#nom_filiere").val(), niveau : $("#select_niveau").val(), semestre: $("#semestre").val()} );
          }
        }

        
          
        /*
        
        
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
      
    });*/

      })
    </script>
    @endsection