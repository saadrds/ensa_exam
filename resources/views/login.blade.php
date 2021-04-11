@extends('layouts.navbars')

  <!-- content -->
  

@section('content')
<br>
<div class="container">
<br><br>
     <h1>Welcome to ENSAS Examens Surveilllance</h1>
     <p></p>
     <p>{{Session::get("username")}}</p>
    </div>

@endsection
    @section('script')
@endsection
