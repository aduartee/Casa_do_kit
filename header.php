<?php define('BASE_URL', 'http://localhost/casadokit/')?>

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<!-- BOXICONS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= BASE_URL ?>css/css.css">
<script src="<?= BASE_URL ?>js/validaQtd.js"></script>
<script src="<?= BASE_URL ?>js/adicionaCarrinho.js"></script>
<script src="<?= BASE_URL ?>js/abirDetalhes.js"></script>
<title>Casa do Kit</title>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-1 mt-lg-0" href="#">
                <img src="img/casadokit.png" height="100" alt="MDB Logo" loading="lazy" />
            </a>
            <!-- Left links -->

            <form class="d-flex">
                <input id="search-input" type="search" class="form-control" placeholder="Pesquisar" aria-label="Search" />
                <button id="search-button" type="button" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </form>
              



            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-6" style="color:white;">
                <li class="nav-item">
                    <a class="nav-link" href="#">Cervejas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Whiskys</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Vodkas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Gelos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Energeticos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gin´s</a>
                </li>

            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="text-reset me-3" href="#">
                <i class="fas fa-shopping-cart text-white"></i>
            </a>

            <!-- Notifications -->
            <div class="dropdown">
                <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell text-white"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Sobre nós</a>
                    </li>
                </ul>
            </div>
            <!-- Avatar -->
            <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <a class="dropdown-item" href="#">My profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Settings</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->


<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>