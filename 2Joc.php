<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>MiniJocs</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <style type="text/css">
            .tetris{
                 border-collapse: collapse;
            }
            .tetris tr td{
                 width:20px;
                 height:20px;
                 padding: 0px;
            }
            .celda0{
                 background-color: #000000;
            }
            .celda1{
                 background-color: #0000FF;
            }
            .celda2{
                 background-color: #FF0000;
            }
            .celda3{
                 background-color: #00FF00;
            }
            .celda4{
                 background-color: #FFFF00;
            }
            .celda5{
                 background-color: #00FFFF;
            }
            .celda6{
                 background-color: #FF00FF;
            }
            .celda7{
                 background-color: #888888;
            }
    </style>
        
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
                        <a href="login.php" class="nav-item nav-link">Pàgina Principal</a>
                        <a href="minijocs.php" class="nav-item nav-link active">MiniJocs</a>
                        <a href="index.php" class="nav-item nav-link">Iniciar Sessió</a>
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
                            <h3 class="text-primary text-capitalize m-0">MiniJocs</h3>
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

       
    <div class="container mt-5">

        <div class="row">
            <div class="col-sm-4">

            <CENTER>
                <p style="text-align:center; color:black; ">"A" Esquerra //  "D" Dreta<br> 
                    "S" Accerlarar  //   "W" Rotar
                </p>
            </div>
                </br></br></br>
                <div class="col-sm-4">
        <script>
          
        var velocidad=50000; //velocidad del juego
        var fpi, cpi, rot; //fila, columna y rotación de la ficha
        var tablero;  //matriz con el tablero
        var pieza=0; //pieza
    var record=0;  //almacena la mejor puntuación
    var lineas=0;   //almacena la  puntuación actual
        var pos=[  //Valores referencia de coordenadas relativas
              [0,0],
              [0,1],
              [-1,0],
              [1,0],
              [-1,-1],
              [0,-1],
              [1,-1],
              [0,-2]
        ];
        var piezas=[  //Diseño de las piezas, el primer valor de cada fila corresponde con el número de rotaciones posibles
              [4,0,1,2,3], 
              [4,0,1,5,6],  
              [4,0,1,5,4],
              [2,0,1,5,7],
              [2,0,2,5,6],
              [2,0,3,5,4],
              [1,0,5,6,3]
    ];
    //Genera una nueva partida inicializando las variables
    function nuevaPartida(){ 
                velocidad=50000;
                tablero=new Array(20); 
                for (var n=0;n < 20;n++){
                     tablero[n]=new Array(9);
                     for (var m=0;m < 9;m++){
                          tablero[n][m]=0;
                     }
                }
        lineas=0;
        record=0
                nuevaPieza();
    }
    //Detecta si una fila columna del tablero está libre para ser ocupada
        function cuadroNoDisponible(f,c){
        if (f < 0) return false;
        return (c < 0 || c >= 9 || f >= 20 || tablero[f][c] > 0);
    }
    //Detecta si la pieza activa colisiona fuera del tablero o con otra pieza
        function colisionaPieza(){
        for (var v=1;v < 5;v++){
            var des=piezas[pieza][v];
            var pos2=rotarCasilla(pos[des]);
            if (cuadroNoDisponible(pos2 [ 0 ] +fpi, pos2 [ 1 ]+cpi)){
                return true;
            }
        }
        return false;
        }
    //Detecta si hay lineas completas y si las hay las computa y borra la linea desplazando la submatriz superior
        function detectarLineas(){
   
        for (var f=0;f < 20;f++){
            var contarCuadros=0;
            for (var c=0;c < 9;c++){
                if (tablero[f][c]>0){
                    contarCuadros++;
                }
            }
            if (contarCuadros==9){
                for (var f2=f;f2 > 0;f2--){
                    for (var c2=0;c2 < 9;c2++){
                        tablero[f2][c2]=tablero[f2-1][c2];
                    }
                }
                lineas++;
                record++;
               
                    localStorage.setItem('record', record);
               
            }
          
        }
    }
    //Baja la pieza, si toca otra pieza o el suelo, saca una nueva pieza
        function bajarPieza(){
        fpi=fpi+1;
        if (colisionaPieza()){
            fpi=fpi-1;
            for (v=1;v < 5;v++){
                des=piezas[pieza][v];
                var pos2=rotarCasilla(pos[des]);
                if (pos2 [ 0 ] +fpi >= 0 && pos2 [ 0 ] +fpi < 20 &&
                    pos2 [ 1 ] +cpi >=0 && pos2 [ 1 ] +cpi < 9){
                    tablero[pos2 [ 0 ] +fpi][pos2 [ 1 ] +cpi]=pieza+1;
                }
            }
            detectarLineas();
            //Si hay algun cuadro en la fila 0 reinicia el juego
            var reiniciar=0;
            for (var c=0;c < 9;c++){
                if (tablero [ 0 ] [ c ] !=0){
                    reiniciar=1;
                   
                }
            }
            if (reiniciar==1){
                if (record<=lineas ){
                    record=lineas;
                  
                
                    }
                
                nuevaPartida()
              
                
            }else{
                nuevaPieza();
              
                    
                }
            }
            
        }
        
    //Mueve la pieza lateralmente
    function moverPieza(des){
        cpi=cpi+des;
        if (colisionaPieza()){
            cpi=cpi-des;
        }
    }
    //Rota la pieza según el número de rotaciones posibles tenga la pieza activa. (posición 0 de la pieza)
    function rotarPieza(){
                rot=rot+1;
                if (rot==piezas[pieza] [ 0 ] ){
            rot=0;
        }
        if (colisionaPieza()){
            rot=rot-1;
                    if (rot==-1){
                rot=piezas[pieza] [ 0 ] -1;
            }
        }
    }
    //Obtiene unas coordenadas f,c y las rota 90 grados
    function rotarCasilla(celda){
        var pos2=[celda [ 0 ] , celda [ 1 ] ];
        for (var n=0;n < rot ;n++){
            var f=pos2 [ 1 ]; 
            var c=-pos2 [ 0 ] ;
            pos2 [ 0 ] =f;
            pos2 [ 1 ] =c;
        }
        return pos2;
    }

    function record(record){


    }
    //Genera una nueva pieza aleatoriamente
    function nuevaPieza(){
        cpi=3;
        fpi=0;
        rot=0;
        pieza=Math.floor(Math.random()*7);
        }
    //Ejecución principal del juego, realiza la animación y repinta
        function tick(){
        bajarPieza();
        pintar();
        setTimeout('tick()', velocidad/100);
        }
    //Pinta el tablero (lo genera con html) y lo plasma en un div.
    function pintar(){
       
      
        var lt=" <";
        var des;
        var records;
        var html="<table class='tetris'>"
        for (var f=0;f < 20;f++){
            html+="<tr>";
            for (var c=0;c < 9;c++){
                var color=tablero[f][c];
                if (color==0){
                    for (v=1;v < 5;v++){
                        des=piezas[pieza][v];
                        var pos2=rotarCasilla(pos[des]);
                        if (f==fpi+pos2 [ 0 ]   && c==cpi+pos2 [ 1 ] ){
                            color=pieza+1;
                        }
                    }
                }
                html+="<td class='celda" + color + "'/>";
                    }
            html+=lt+"/tr>";
                }
        
       
        records=localStorage.getItem('record') ;
       
        html+=lt+"/table>";
        html+="<br />Lineas : " + lineas;
        if(records==null){
            html+="<br />Millor record : " + "0";
        }
        else{
            html+="<br />Millor record : " + records;}
     
        
        
        document.getElementById('tetris').innerHTML=html;
                velocidad=Math.max(velocidad-1,500);
        
    }
    //Al iniciar la pagina inicia el juego
        function eventoCargar(){
                nuevaPartida();
                setTimeout('tick()', 1);
        }
    //Al pulsar una tecla
        function tecla(e){
                var characterCode = (e && e.which)? e.which: e.keyCode;
                switch (characterCode){
        case 65:
                        moverPieza(-1);
            break;
        case 87:
            rotarPieza();
            break;
        case 68:
                        moverPieza(1);
            break;
        case 83:
            bajarPieza();
            break;
                }
        pintar();
        }
    </script>
    <body onload='eventoCargar()' onkeydown="tecla(event)">
    <div id='tetris'>
    </body>

  </CENTER>
        </div>
    </div>
    </div>
    </div>

    <?php

$puntuacio = "<script>document.write(localStorage.getItem('record'))</script>";
echo "Pujar Puntuacio = $puntuacio","</br>";
echo '<form method="POST" action="2Joc.php">
            Nom:<input type="text" name="nom">
            <input type="submit" value="Escriu el teu nom i fes click per pujar la millor puntuació" name="buscar"> 
     </form><br> ';




$connexio = new mysqli("localhost", "root", "joan", "loginresgistre");
    

if ($connexio->connect_errno) {
      echo "Connexió fallida: " . $connexio->connect_error." - ".$connexio->connect_errno;
  } 

else {
   
    if(!empty($_POST["nom"])){
    $nom=$_POST["nom"];
     $puntuacio = "<script>document.write(localStorage.getItem('record'))</script>";
      $sentenciaSql =  "INSERT INTO recordstetris(nom,puntuacio) 
      VALUES ('$nom','$puntuacio')";
        $consulta = $connexio->query($sentenciaSql);
     }
     else{
        echo "Necessites el nom per pujar el record","<br><br><br>";
     }
    }
    
   ?>

<fieldset style="overflow: scroll; height: 210px;" name="paisos">
<legend><h4>Top 10 Records Mundials</h4></legend></br>

<?php
     
     $connexio = new mysqli("localhost", "root", "joan", "loginresgistre");
    if ($connexio->connect_errno) {
    echo "Connexió fallida: " . $connexio->connect_error." - ".$connexio->connect_errno;
    } 
    else {


        $sentenciaSql = "SELECT nom,puntuacio FROM recordstetris ORDER BY puntuacio DESC LIMIT 10";
        $consulta = $connexio->query($sentenciaSql);
       

        if ($consulta) {
            while ($vectorRegistres = $consulta->fetch_array(MYSQLI_BOTH)) {
                //LLegim el contingut del registre actual
                 
                $nom = $vectorRegistres["nom"];  //nom
                 $puntuacio = $vectorRegistres["puntuacio"];
                 
                //Mostrem les dades del registre
                echo 'Nom: ',$nom;
                echo '  ---> Puntuació: ',$puntuacio.'</br>';
            }

     
        //No s'ha produit la consulta
        }else {
                echo "La consulta no s'ha realitzat: ".$connexio->error;
            }
    }

?>
 </fieldset>


    
   
    
    
    
    
    
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
    
    </html>
