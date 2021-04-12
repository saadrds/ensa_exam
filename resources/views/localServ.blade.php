 @foreach($calandriers as $line)
 <tr>
  <td width="58" style="width:45pt;border:none;mso-border-themecolor:
  accent1;mso-border-alt:solid #8EAADB .5pt;
  mso-border-themecolor:accent1;border-bottom:solid #8EAADB 1.0pt;">
  <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center">{{$line->NOM_LOCAL}}</p>
  </td>
<td></td>
  <td width="262" style="width:200pt;border:none;mso-border-themecolor:
  accent1;mso-border-themetint:153;border-left:none;mso-border-left-alt:solid #8EAADB .5pt;
  mso-border-left-themecolor:accent1;mso-border-left-themetint:153;mso-border-alt:
  solid #8EAADB .5pt;mso-border-themecolor:accent1;border-bottom:solid #8EAADB 1.0pt;">
  <p cclass="MsoNormal" align="center" style="margin-bottom:0in;text-align:center">{{$line->NOM_PROF}}</p>
  </td>
 @endforeach