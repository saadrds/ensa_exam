@extends('layouts.navbars')

  <!-- content -->
  

@section('content')
<style>
  .hoverDate{
  background-image: url('/img/edit.png');
  background-size  :cover;
  cursor :pointer;
  }
  
</style>
<div class="container mt-4">
  <div class="d-flex justify-content-around mb-4">
    <h1> Module de {{$module->NOM_MODULE}}</h1><div hidden id="idModule">{{$module->ID_MODULE}}</div>
    <div class="form-group">
    <label for="exampleInputEmail1">Selectionner l'Année</label>
        <select class="form-control" id="select_annee" name ="select_annee" aria-describedby="select_annee" required>
        <option value="0" disabled selected>--Choisir une Année-</option>
        @foreach($annees as $line)
        <option>{{$line->NOM_ANNEE}}</option>
        @endforeach
        </select>
    </div>
  </div>
  <div class="d-flex justify-content-center" id="exams_content">
  
  </div>
</div>
@endsection
@section('script')
    <script>
    var editUrl = "url({{ URL::asset('/img/edit.png') }})";
      $(document).ready(function(){
        $("#select_annee").change(function(e){
          $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }})
            $("#exams_content").load("/exams",{"annee":$("#select_annee").val(), "id_module" :$('#idModule').html()});
        });

        $("#date_heure").hover(function(e){
          $("#date_heure").css({
            "background" : "red"
          })
        })
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
      
    });

      */})
    </script>
@endsection
