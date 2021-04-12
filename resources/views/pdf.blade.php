<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/main.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PDF </title>
</head>
<body>
    
<div class="m-5">
    <h1>Prof Statistique</h1> 
    <a href="/downloadPDF"><button type="button" class="btn btn-dark">PDF</button></a>
    <button type="button" id="senddata" class="btn btn-info" style="position: relative; left:100px;">Search</button>
    <br><br>
    <div class="form-group mr-auto">
        <select type="text" class="form-control select" id="annee" name ="annee" aria-describedby="semestre">
        <option value="0" disabled selected>-- select Annee --</option>
        @foreach($annees as $line)
        <option>{{$line->NOM_ANNEE}}</option>
        @endforeach
        </select>
      </div>
      <div class="form-group mr-auto">
        <select type="text" class="form-control select" id="prof" name ="prof" aria-describedby="semestre">
        <option value="0" disabled selected>-- select Prof --</option>
        @foreach($profs as $line)
        <option>{{$line->NOM_PROF}}</option>
        @endforeach
        </select>
      </div>
    
    <div id="pdfTable"></div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="/js/toggle.js"></script>

<script>
      $(document).ready(function(){
        $('#senddata').click(function(){
            $("#pdfTable").load("/pdfTable",{annee: $("#annee").val(), prof: $("#prof").val()} );
            //console.log({filiere : $("#nom_filiere").val(), niveau : $("#select_niveau").val(), semestre: $("#semestre").val(), annee: $("#annee").val(), ds: $("#ds").val()});
        });

        $(".select").change(function(e){
          
            afficherModules();
        })
        function afficherModules(){
          
            $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
            //$("#tbody").load("/allModules",{filiere : $("#nom_filiere").val(), niveau : $("#select_niveau").val(), semestre: $("#semestre").val()} );

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

</body>
</html>