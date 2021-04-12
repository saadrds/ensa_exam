@extends('layouts.navbars')

  <!-- content -->
  

@section('content')
<div class="container">
  <h1 class="p-5">Liste des Modules</h1>
  
  <form action="downloadPDFExams" method="post">
  @csrf
  <div class="d-flex align-items-start bd-highlight mb-3">
  <div class="form-group mr-auto">
        <select type="text" class="form-control select" id="annee" name ="annee" aria-describedby="semestre">
        <option value="0" disabled selected>-- select Annee --</option>
        @foreach($annees as $line)
        <option>{{$line->NOM_ANNEE}}</option>
        @endforeach
        </select>
      </div>
    <div class="form-group mr-auto">
      <select type="text" class="form-control select" id="nom_filiere" name ="nom_filiere" aria-describedby="nom_filere" required>
        <option value="0" disabled selected>-- Choisir une Filiere --</option>
        @foreach($filieres as $line)
        <option>{{$line->NOM_FILIERE}}</option>
        @endforeach
      </select>
    </div>
      <div class="form-group mr-auto">
        <div id="niveau">
          <select type="text" class="form-control select" name ="select_niveau" aria-describedby="niveau" id="select_niveau">
            <option value="0" disabled selected>-- select Niveau --</option>
          </select>
        </div>
      </div>
      <div class="form-group mr-auto">
        <select type="text" class="form-control select" id="semestre" name ="semestre" aria-describedby="semestre">
        <option value="0" disabled selected>-- select Semestre --</option>
        <option value="1">Semestre 1</option>
        <option value="2">Semestre 2</option>
        </select>
      </div>
      <div class="form-group mr-auto">
        <select type="text" class="form-control select" id="ds" name ="ds" aria-describedby="semestre">
        <option value="0" disabled selected>-- select type de DS --</option>
        <option value="DS1">DS 1</option>
        <option value="DS2">DS 2</option>
        <option value="Rattrapage">Rattrapage</option>
        </select>
      </div>
      <div hidden id="pdfHidden"></div>
      <button type="submit" id="submitpdf" class="btn btn-link">Generate PDF</button>
      </form>
      
      
      <div class="form-group mr-auto">
      <button type="button" class="btn btn-primary" id="btncalandrier">Search</button>
      </div>
      
  </div>




 <!--       hna fin kayn tableau        -->
 


<div id="tablecalandrier" style="position:relative; top:-20px;"></div>

<p class="MsoNormal">&nbsp;</p>

<p class="MsoNormal">&nbsp;</p>

</div>
 <!--       hna fin kayn tableau        -->





  </div>
</div>



    @endsection
    @section('script')
    <script>
      $(document).ready(function(){
        $('#submitpdf').click(function(){
            $("#pdfHidden").load("/downloadPDFExams",{filiere : $("#nom_filiere").val(), niveau : $("#select_niveau").val(), semestre: $("#semestre").val(), annee: $("#annee").val(), ds: $("#ds").val()} );
            //console.log({filiere : $("#nom_filiere").val(), niveau : $("#select_niveau").val(), semestre: $("#semestre").val(), annee: $("#annee").val(), ds: $("#ds").val()});
        });

        $('#btncalandrier').click(function(){
            $("#tablecalandrier").load("/ExamenTable",{filiere : $("#nom_filiere").val(), niveau : $("#select_niveau").val(), semestre: $("#semestre").val(), annee: $("#annee").val(), ds: $("#ds").val()} );
            //console.log({filiere : $("#nom_filiere").val(), niveau : $("#select_niveau").val(), semestre: $("#semestre").val(), annee: $("#annee").val(), ds: $("#ds").val()});
        });

        $("#nom_filiere").change(function(e){
          
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