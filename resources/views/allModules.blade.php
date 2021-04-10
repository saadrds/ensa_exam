@foreach($modules as $line)
    <tr>
      <th scope="row">{{$line->ID_MODULE}}</th>
      <td>{{$line->NOM_MODULE}}</td>
      <td>{{$line->NOM_PROF}}</td>
      <td>{{$line->ID_SEMESTRE}}</td>
    </tr>
  @endforeach 