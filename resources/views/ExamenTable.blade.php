<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    @page { size: 30cm 38cm landscape; }
  </style>
</head>
<body>
  

<div class="WordSection1">

<p class="MsoNormal">&nbsp;</p>

<table class="MsoTable15Grid1LightAccent1" border="1" cellspacing="0" cellpadding="0" align="left" width="1087" style="width:815.3pt;border-collapse:collapse;
 border:none;margin-left:0pt;margin-right:4.8pt">
 <tbody><tr style="height:22.2pt">
  <td width="90" style="width:115pt;border:solid #B4C6E7 1.0pt;border-bottom:
  solid #8EAADB 1.5pt;background:#8EAADB;padding:0in 5.4pt 0in 5.4pt;
  height:22.2pt">
  <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b>Filière</span></b></p>
  </td>
  <td width="144" style="width:130pt;border-top:solid #B4C6E7 1.0pt;border-left:
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

</tbody></table>
@foreach($calandriers as $line)

<div stystyle="margin-bottom:7px;">

<table class="MsoTable15Grid1LightAccent1" border="1" cellspacing="0" cellpadding="0" align="left"solide #B4C6E7="1087" style="width:815.3pt;border-collapse:collapse;
 border:none;margin-left:solide #B4C6E7.8pt;margin-right:4.8pt">
 <tbody><tr style="height:22.2pt">
<tr style="height:22.2pt">
  <td width="60" rowspan="5" style="width:70pt;border:solid #B4C6E7 2.0pt;
  border-top:solid #B4C6E7 2.0pt;padding:0in 5.4pt t;height:22.2pt">
  <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal">{{$line->NOM_FILIERE}}</p>
  </td>
  <td width="144" rowspan="5" style="width:75pt;border-top:solid #B4C6E7 2.0pt;border-left:solide;
  border-bottom:solid #B4C6E7 2.0pt;border-right:solid #B4C6E7 2.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.2pt">
  <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal">{{$line->NOM_PROF}}</p>
  </td>
  <td width="224" rowspan="5" style="width:100pt;border-top:solid #B4C6E7 2.0pt;border-left:solide;border-bottom:solid #B4C6E7 2.0pt;border-right:solid #B4C6E7 2.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.2pt">
  <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal">{{$line->NOM_MODULE}}</p>
  </td>
  <td width="168" rowspan="5" style="width:75pt;border-top:solid #B4C6E7 2.0pt;border-left:solide;border-bottom:solid #B4C6E7 2.0pt;border-right:solid #B4C6E7 2.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.2pt">
  <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal">{{$line->DATE_RESERV}}</p>
  </td>
  <td width="126" rowspan="5" style="width:60pt;border-top:solid #B4C6E7 2.0pt;border-left:solide;
  border-bottom:solid #B4C6E7 2.0pt;border-right:solid #B4C6E7 2.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.2pt">
  <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal">{{$line->DEBUT_RESERV}} - {{$line->FIN_RESERV}}</p>
  </td>

  <td width="75" style="width:160pt;border-top:solid #B4C6E7 2.0pt;border-left:solide;
  border-bottom:solid #B4C6E7 2.0pt;border-right:solid #B4C6E7 2.0pt;
  padding:0in 5.4pt 0in 5.4pt;" id="localServ"></td>
 
 </tr>
 </tbody></table>
 </div>
 @endforeach

 <script>
$(document).ready(function(){
        
    $("#localServ").load("/localServ",{filiere : $("#nom_filiere").val(), niveau : $("#select_niveau").val(), semestre: $("#semestre").val(), annee: $("#annee").val(), ds: $("#ds").val()} );
    

})
</script>
</body>
</html>