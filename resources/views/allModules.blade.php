@foreach($modules as $line)
    <tr>
      <th scope="row">{{$line->ID_MODULE}}</th>
      <td>{{$line->NOM_MODULE}}</td>
      <td>{{$line->NOM_PROF}}</td>
      <td>{{$line->ID_SEMESTRE}}</td>
      <td><a href="Modules/{{$line->ID_MODULE}}"><button class="btn btn-success">acceder</button></a></td>
    </tr>
  @endforeach 