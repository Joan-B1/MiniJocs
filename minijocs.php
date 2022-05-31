
<?php
// Cada script que vulguem treballar amb la sessió activa
// ha d'incloure la funció session_start() al capdamunt

session_start();
if ($_SESSION['usuari']== NULL && $_SESSION['passwd']== NULL)
{
echo "No existeix";   
echo '<a href="index.php"?.session_name()."=".session_id()" class="nav-item nav-link">Tancar Sessió</a>';


}else{
echo '<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>MiniJocs</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="css/min/style.min.css" rel="stylesheet">
        <script src="processing-1.1.0.min.js"></script>
        <script src="js/videojuego-javascript.js?04042012" type="text/javascript"></script>
    </head>
    
    <body class="bg-white">
      
        <div class="container-fluid p-0 nav-bar">
            <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 display-4 font-weight-bold text-uppercase text-white">MiniJocs</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto p-4 bg-secondary">
                        <a href="login.php"?.session_name()."=".session_id()" class="nav-item nav-link">Pàgina Principal</a>
                        <a href="minijocs.php"?.session_name()."=".session_id()" class="nav-item nav-link active">MiniJocs</a>
                        <a href="index.php"?.session_name()."=".session_id()" class="nav-item nav-link">Tancar Sessió</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->
    
        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div id="blog-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <b><h3 class="text-primary text-capitalize m-0">MiniJocs</h3></b>
                            <h2 class="display-2 m-0 mt-2 mt-md-4 text-white font-weight-bold text-capitalize">La millor pàgina de videojocs</h2>
                            <a href="minijocs.php" class="btn btn-lg btn-outline-light mt-3 mt-md-5 py-md-3 px-md-5">GOOOO!!!</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <h3 class="text-primary text-capitalize m-0">MiniJocs</h3>
                            <h2 class="display-2 m-0 mt-2 mt-md-4 text-white font-weight-bold text-capitalize">La millor pàgina de videojocs</h2>
                            <a href="minijocs.php" class="btn btn-lg btn-outline-light mt-3 mt-md-5 py-md-3 px-md-5">GOOOO!!!</a>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <!-- Carousel End -->

        <div class="container feature pt-5">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-primary font-weight-bold">MiniJocs</h4>
               
            </div>
            <div class="row">
                <div class="col-md-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <a href="2Joc.php"> <img class="img-fluid mb-3 mb-sm-0" src="./img/tetris.jpg"> </a>
                            <i class="flaticon-training"></i>
                        </div>
                        <div class="col-sm-7">
                            <h4 class="font-weight-bold">Tetris</h4>
                            <p>El clàssic dels clàssics ja disponible!</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <a href="3Joc.php"> <img class="img-fluid mb-3 mb-sm-0" src="./img/carRetro.jpg"> </a>
                            <i class="flaticon-barbell"></i>
                        </div>
                        <div class="col-sm-7">
                            <h4 class="font-weight-bold">RetroCar</h4>
                            <p>Car Xtreme entra en una gran aventura de carrera de un jugador. Diverteix-te en aquest estil de carrera retro!</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <a href="1Joc.php"> <img class="img-fluid mb-3 mb-sm-0" src="./img/vater.gif"> </a>
                            <i class="flaticon-barbell"></i>
                        </div>
                        <div class="col-sm-7">
                            <h4 class="font-weight-bold">Toilet Invasion</h4>
                            <p>Llibera el lavabo de la brutícia!</p>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
   
   

    
   
    
    
    
    
    
        <!-- Footer Start -->
        <div class="footer container-fluid mt-5 py-5 px-sm-3 px-md-5 text-white">
            <div class="row pt-5">
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="text-primary mb-4">MiniJocs</h4>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Plaça de la Mare de Déu del Remei, 1, 17160 Anglès, Girona</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+34 605185270</p>
                    <p><i class="fa fa-envelope mr-2"></i>Dr.Joan@questions.com </p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="text-white font-weight-bold"> Links</h4>
                   
                        <a href="login.php" class="nav-item nav-link active">Pàgina Principal</a>
                        <a href="minijocs.php" class="nav-item nav-link">MiniJocs</a>
                        <a href="index.php" class="nav-item nav-link">Tancar Sessió</a>
                    
                </div>
               
               
            <div class="container border-top border-dark pt-5">
                <p class="m-0 text-center text-white">
                    &copy; <a  href="https://copyright.es/aspecto-juridico.html">MiniJocs</a>. <a class="text-white font-weight-bold" href="https://copyright.es/aspecto-juridico.html">All Rights Reserved. Designed by Joan Batalla</a>
                    
                </p>
            </div>
        </div>
        </div>
        <!-- Footer End -->
    
    
        
    
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        
      
       
      
    </body>
    
    </html>';
}

?>




