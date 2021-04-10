@extends('layouts.navbars')

  <!-- content -->
  

@section('content')
<div class="container">

        <h1 class="p-5">Ajouter Une Filiere</h1>

<form action="/createFiliere" method='post'>
    @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Nom  de filiere: </label>
        <input type="text" required  class="form-control" id="nom_module" name ="nom_filiere" aria-describedby="nom_respo" placeholder="entrez un nom pour ce module">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Responsable de la filiere: </label>
        <input type="text" class="form-control" id="nom_respo" name ="nom_respo" aria-describedby="nom_respo" placeholder="entrez le chef de filiere" required>
        <div id="tab"></div>
        <div id="hiddenTab" hidden></div>
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
            $("#niveau").load("/cp");
          
        
        }
          else{
            $("#niveau").load("/cycle");
            
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
