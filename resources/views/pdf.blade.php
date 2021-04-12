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
    <h1>Prof Page</h1> 
    <a href="/downloadPDF"><button type="button" class="btn btn-dark">PDF</button></a>
    
    <br>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Email</th>
      <th scope="col">Departement</th>

    </tr>
  </thead>
  <tbody>
  @foreach($profs as $line)
    <tr>
      <td>{{$line->NOM_PROF}}</td>
      <td>{{$line->PRENOM_PROF}}</td>
      <td>{{$line->EMAIL}}</td>
      <td>{{$line->NOM_DEP}}</td>
    </tr>  
  @endforeach    
  
    
  </tbody>
</table>
</div>

</body>
</html>