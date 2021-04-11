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
            jQuery.noConflict();
            $("#myModal").modal();
            $("#modalTitle").html("Date de DS1");
        })

        $("#date_heure2").click(function(e){
            jQuery.noConflict();
            $("#myModal").modal();
            $("#modalTitle").html("Date de DS2");
        })

        $("#date_heure3").click(function(e){
            jQuery.noConflict();
            $("#myModal").modal();
            $("#modalTitle").html("Date de Rattrappage");
        })
        var $id;
        function afficherFormulaire(){
            if($("#modalTitle").html() == "Date de DS2"){
                empty = $("#date_examDS2").html();
                $id="DS2";
                $("#date_examDS2").html($("#date_exam_select").val());
                $("heure_examDS2").html($("#debut_exam_select").val() + "-" + $("fin_exam_select").val());
                //alert("DS2");
            }
            else if( $("#modalTitle").html() == "Date de DS1"){
                $id="DS1";
                empty = $("#date_examDS1").html();
                $("#date_examDS1").html($("#date_exam_select").val());
                $("heure_examDS1").html($("#debut_exam_select").val() + "-" + $("fin_exam_select").val());
                //alert("DS1");
            }
            else{
                $id="Rattrappage";
                empty = $("#date_examRATT").html();
                $("#date_examRATT").html($("#date_exam_select").val());
                $("heure_examRATT").html($("#debut_exam_select").val() + "-" + $("fin_exam_select").val());
                //alert("Ratt");
            }
           
            jQuery.noConflict();
            //$("#myModal").modal('hide');
           
            
            //sending data in ajax
            //lert(id);
            
            
        }
        $("#saveChanges").click(function(){
            afficherFormulaire();
            $("#hiddenS").load('/saveExam',{"typeDS" : $id, "idModule" : $("#idModule").html(), "date_exam" : $("#date_exam_select").val(),"debut_exam" : $("#debut_exam_select").val(),"fin_exam" : $("fin_exam_select").val(),"empty":empty,"annee":$("#select_annee").val() })

        })

})
</script>