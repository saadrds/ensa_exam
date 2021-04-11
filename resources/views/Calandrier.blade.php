@extends('layouts.navbars')

  <!-- content -->
  

@section('content')
<div class="container">
  <h1 class="p-5">Liste des Modules</h1>
  <div class="d-flex align-items-start bd-highlight mb-3">
  <div class="form-group mr-auto">
        <select type="text" class="form-control select" id="anee" name ="annee" aria-describedby="semestre">
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
        <select type="text" class="form-control select" id="anee" name ="ds" aria-describedby="semestre">
        <option value="0" disabled selected>-- select type de DS --</option>
        <option value="DS1">DS 1</option>
        <option value="DS2">DS 2</option>
        <option value="Rattrapage">Rattrapage</option>
        </select>
      </div>
      
      <div class="form-group mr-auto">
      <button type="button" class="btn btn-primary" id="btncalandrier">Primary</button>
      </div>
      
  </div>




 <!--       hna fin kayn tableau        -->
 <div class="WordSection1">

<p class="MsoNormal">&nbsp;</p>

<table class="MsoTable15Grid1LightAccent1" border="1" cellspacing="0" cellpadding="0" align="left" width="1087" style="width:815.3pt;border-collapse:collapse;
 border:none;margin-left:0pt;margin-right:4.8pt">
 <tbody><tr style="height:22.2pt">
  <td width="60" style="width:44.7pt;border:solid #B4C6E7 1.0pt;border-bottom:
  solid #8EAADB 1.5pt;background:#8EAADB;padding:0in 5.4pt 0in 5.4pt;
  height:22.2pt">
  <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b>Filière</span></b></p>
  </td>
  <td width="144" style="width:1.5in;border-top:solid #B4C6E7 1.0pt;border-left:
  none;border-bottom:solid #8EAADB 1.5pt;border-right:solid #B4C6E7 1.0pt;
  background:#8EAADB;padding:0in 5.4pt 0in 5.4pt;height:22.2pt">
  <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="color:black">Responsable</span></b></p>
  </td>
  <td width="224" style="width:167.9pt;border-top:solid #B4C6E7 1.0pt;border-left:
  none;border-bottom:solid #8EAADB 1.5pt;border-right:solid #B4C6E7 1.0pt;
  background:#8EAADB;padding:0in 5.4pt 0in 5.4pt;height:22.2pt">
  <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="color:black">Intitulé du module</span></b></p>
  </td>
  <td width="168" style="width:126.1pt;border-top:solid #B4C6E7 1.0pt;border-left:
  none;border-bottom:solid #8EAADB 1.5pt;border-right:solid #B4C6E7 1.0pt;
  background:#8EAADB;padding:0in 5.4pt 0in 5.4pt;height:22.2pt">
  <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="color:black">Date de l’examen</span></b></p>
  </td>
  <td width="126" style="width:94.8pt;border-top:solid #B4C6E7 1.0pt;border-left:
  none;border-bottom:solid #8EAADB 1.5pt;border-right:solid #B4C6E7 1.0pt;
  background:#8EAADB;padding:0in 5.4pt 0in 5.4pt;height:22.2pt">
  <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="color:black">Heure</span></b></p>
  </td>
  <td width="75" style="width:56.45pt;border-top:solid #B4C6E7 1.0pt;border-left:
  none;border-bottom:solid #4472C4 1.0pt;border-right:solid #B4C6E7 1.0pt;
  background:#8EAADB;padding:0in 5.4pt 0in 5.4pt;height:22.2pt">
  <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="color:black">Local</span></b></p>
  </td>
  <td width="290" style="width:217.35pt;border-top:solid #B4C6E7 1.0pt;
  border-left:none;border-bottom:solid #4472C4 1.0pt;border-right:solid #4472C4 1.0pt;
  background:#8EAADB;padding:0in 5.4pt 0in 5.4pt;height:22.2pt">
  <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="color:black">Surveillant</span></b></p>
  </td>
 </tr>
 <tr></tr>

</tbody></table>


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
        $('#btncalandrier').click(function(){
            $("#tablecalandrier").load("/ExamenTable",{filiere : $("#nom_filiere").val(), niveau : $("#select_niveau").val(), semestre: $("#semestre").val(), annee: $("#annee").val(), ds: $("#ds").val()} );
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