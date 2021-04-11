<div id="ds_liste" class="text-center d-flex flex-column justify-content-center mx-auto">
    <div class="card text-white bg-warning mb-3" style="width: 22rem;">
        <div class="card-header">DS1</div>
            <div class="card-body p-0">
                <div class="mb-2 date_heure" id="date_heure1" style="height:6rem;">
                    <div class="d-flex justify-content-around">
                        <label>Date : </label><h5 class="card-title" id="date_examDS1">@if($DS1 != null) {{$DS1->DATE_RESERV}}  @endif
                        @if($DS1 == null) empty  @endif</h5>
                    </div>
                    <div class="d-flex justify-content-around">
                        <label>Heure: </label><h6 class="card-title" id="heure_examDS1">@if($DS1 != null) {{$DS1->DEBUT_RESERV}}  @endif
                        @if($DS1 == null) empty  @endif - @if($DS1 != null) {{$DS1->FIN_RESERV}}  @endif
                        @if($DS1 == null) empty  @endif</h6>
                    </div>
                </div>
                <div class="card-text">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Salle</th>
                                <th scope="col">Surveillant</th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <div class="card text-white bg-primary mb-3" style="width: 22rem;">
        <div class="card-header">DS2</div>
            <div class="card-body p-0">
                <div class="mb-2 date_heure" id="date_heure2" style="height:6rem;">
                    <div class="d-flex justify-content-around">
                        <label>Date : </label><h5 class="card-title" id="date_examDS2">@if($DS2 != null) {{$DS1->DATE_RESERV}}  @endif
                        @if($DS2 == null) empty  @endif</h5>
                    </div>
                    <div class="d-flex justify-content-around">
                        <label>Heure: </label><h6 class="card-title" id="heure_examDS2">@if($DS2 != null) {{$DS2->DEBUT_RESERV}}  @endif
                        @if($DS2 == null) empty  @endif - @if($DS2 != null) {{$DS2->FIN_RESERV}}  @endif
                        @if($DS2 == null) empty  @endif</h6>
                    </div>
                </div>
                <div class="card-text">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Salle</th>
                                <th scope="col">Surveillant</th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <div class="card text-white bg-danger mb-3" style="width: 22rem;">
        <div class="card-header">Rattrappage</div>
            <div class="card-body p-0">
                <div class="mb-2 date_heure" id="date_heure3" style="height:6rem;">
                    <div class="d-flex justify-content-around">
                        <label>Date : </label><h5 class="card-title" id="date_examRATT">@if($RATT != null) {{$RATT->DATE_RESERV}}  @endif
                        @if($RATT == null) empty  @endif</h5>
                    </div>
                    <div class="d-flex justify-content-around">
                        <label>Heure: </label><h6 class="card-title" id="heure_examRATT">@if($RATT != null) {{$RATT->DEBUT_RESERV}}  @endif
                        @if($RATT == null) empty  @endif - @if($RATT != null) {{$RATT->FIN_RESERV}}  @endif
                        @if($RATT == null) empty  @endif</h6>
                    </div>
                </div>
                <div class="card-text">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Salle</th>
                                <th scope="col">Surveillant</th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
</div>
<div id="op"></div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Date de</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" id="hiddenS">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Date de l'Examen </label>
        <input type="date" required  class="form-control" id="date_exam_select" name ="date_exam_select" aria-describedby="date_exam_select" placeholder="entrez la date de l'examen">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Huere de debut de l'Examen </label>
        <input type="time" required  class="form-control" id="debut_exam_select" name ="debut_exam_select" aria-describedby="debut_exam_select" placeholder="heure de debut">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">heure de Fin de l'Examen </label>
        <input type="time" required  class="form-control" id="fin_exam_select" name ="fin_exam_select" aria-describedby="fin_exam_select" placeholder="heure de fin">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
        var empty;
      
        $("#date_heure1").hover(function(e){
          $("#date_heure1").addClass("hoverDate");
        },function(e){
            $("#date_heure1").removeClass("hoverDate");
        })

        $("#date_heure2").hover(function(e){
          $("#date_heure2").addClass("hoverDate");
        },function(e){
            $("#date_heure2").removeClass("hoverDate");
        })

        $("#date_heure3").hover(function(e){
          $("#date_heure3").addClass("hoverDate");
        },function(e){
            $("#date_heure3").removeClass("hoverDate");
        })

        $("#date_heure1").click(function(e){
            //jQuery.noConflict();
            $("#myModal").modal();
            $("#modalTitle").html("Date de DS1");
        })

        $("#date_heure2").click(function(e){
            //jQuery.noConflict();
            $("#myModal").modal();
            $("#modalTitle").html("Date de DS2");
        })

        $("#date_heure3").click(function(e){
            //jQuery.noConflict();
            $("#myModal").modal();
            $("#modalTitle").html("Date de Rattrappage");
        })
        var $id;
        function afficherFormulaire(){
            if($("#modalTitle").html() == "Date de DS2"){
                empty = $("#date_examDS2").html();
                $id="DS2";
                $("#date_examDS2").html($("#date_exam_select").val());
                $("#heure_examDS2").html($("#debut_exam_select").val() + "-" + $("#fin_exam_select").val());
                //alert("DS2");
            }
            else if( $("#modalTitle").html() == "Date de DS1"){
                $id="DS1";
                empty = $("#date_examDS1").html();
                $("#date_examDS1").html($("#date_exam_select").val());
                $("#heure_examDS1").html($("#debut_exam_select").val() + "-" + $("#fin_exam_select").val());
                //alert("DS1");
            }
            else{
                $id="Rattrappage";
                empty = $("#date_examRATT").html();
                $("#date_examRATT").html($("#date_exam_select").val());
                $("#heure_examRATT").html($("#debut_exam_select").val() + "-" + $("#fin_exam_select").val());
                //alert("Ratt");
            }
           
            
            
            $("#myModal").modal('hide');
            
            //sending data in ajax
            //lert(id);
            
            
        }
        $("#saveChanges").click(function(){
            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            afficherFormulaire();
            console.log(empty);
            console.log({"typeDS" : $id, "idModule" : $("#idModule").html(), "date_exam" : $("#date_exam_select").val(),"debut_exam" : $("#debut_exam_select").val(),"fin_exam" : $("#fin_exam_select").val(),"empty":empty,"annee":$("#select_annee").val() })
        $("#op").load('/saveExam',{"typeDS" : $id, "idModule" : $("#idModule").html(), "date_exam" : $("#date_exam_select").val(),"debut_exam" : $("#debut_exam_select").val(),"fin_exam" : $("#fin_exam_select").val(),"empty":empty,"annee":$("#select_annee").val() })
            //jQuery.noConflict();
            
        })

})
</script>