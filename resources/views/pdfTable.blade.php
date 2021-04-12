
@if($selonAnnee != null)
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Annee</th>
      <th scope="col">Module</th>
      <th scope="col">Local</th>
      <th scope="col">Surveillant</th>

    </tr>
  </thead>
  <tbody>
  @foreach($selonAnnee as $line)
    <tr>
      <td>{{$line->TYPE}}</td>
      <td>{{$line->NOM_ANNEE}}</td>
      <td>{{$line->NOM_MODULE}}</td>
      <td>{{$line->NOM_LOCAL}}</td>
      <td>{{$line->NOM_PROF}}</td>

    </tr>  
  @endforeach    
  
    

  </tbody>
</table>
@endif
