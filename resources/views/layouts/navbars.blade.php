<!DOCTYPE html>
<html>
<head>
    <title>Ensa Safi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/main.css">
    
</head>
<body>
 
<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center">
      <img loading="lazy" src="{{ asset('img/pic.jpg') }}" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0">Admin</h4>
        <p class="font-weight-normal text-muted mb-0">Nom Admin</p>
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
        <div class="dropdown show">
            <a class=" dropdown-toggle nav-link text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-chalkboard-teacher mr-3 text-primary"></i>
                Professeur
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Liste Prof</a>
                <a class="dropdown-item" href="#">Ajouter Prof</a>
            </div>
        </div>

        <div class="dropdown show">
            <a class=" dropdown-toggle text-dark nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-code-branch mr-3 text-primary"></i>
                Filiere
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Liste Filiere</a>
                <a class="dropdown-item" href="#">Ajouter Filiere</a>
            </div>
        </div>

        <div class="dropdown show">
            <a class=" dropdown-toggle text-dark nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-file-signature mr-3 text-primary"></i>
                Modules
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Module 1</a>
                <a class="dropdown-item" href="#">Module 2</a>
            </div>
        </div>

    </li>
   
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
                <i class="fa fa-area-chart mr-3 text-primary fa-fw"></i>
                Statistiques
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
            <i class="fas fa-calendar-week mr-3 text-primary" ></i>
                Calandrier
            </a>
    </li>
  </ul>

 
</div>
<!-- End vertical navbar -->


<!-- Page content holder -->
<div class="page-content" id="content">

  <nav class="top-bar navbar navbar-light bg-light justify-content-between p-3">
      <!-- Toggle button -->
      <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-circle shadow-sm"><i class="fa fa-bars"></i></button>
      <h2>ENSA</h2>
      <form class="form-inline" action="" method="POST" >
       
        <button type="submit" class="btn btn-light bg-white rounded-pill shadow-sm px-4 font-weight-bold" name="logout"><i class="fas fa-sign-out-alt mr-2"></i>Logout</button>
      </form>
  </nav>




<!-- content -->


    @yield('content')












<!-- footer -->
  <div class="footer bg-white">
        <p class="m-0">Copyright 2020 ©ENSAS | All rights reserved </p>
        <p class="m-0"></p>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/toggle.js"></script>
</body>
</html>