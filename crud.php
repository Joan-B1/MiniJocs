<html>

<body>

	<div class="main"> 
		 	
		
		<div><h2>CRUD</h2>

            <h3>Usuaris</h3>
            <fieldset> 
            
				<?php 
		 $connexio = new mysqli("localhost","root","joan","LoginResgistre");
		 if ($connexio->connect_errno) {
			 echo "Connexió fallida: " . $connexio->connect_error." - ".$connexio->connect_errno;
		 } 
	    
         else {
            $sentenciaSql =  "SELECT * FROM registre;";
       		$consulta = $connexio->query($sentenciaSql);
                

	   		if ($consulta ) {
                        
                while ($vectorRegistres = $consulta->fetch_array(MYSQLI_BOTH)) {
                    //LLegim el contingut del registre actual
                            
                    $usuari = $vectorRegistres["usuari"];
                    $email = $vectorRegistres["email"];
                    //Mostrem les dades del registre
                     echo '<b>Usuari: '.$usuari.'</b>'."<br/>";
                     echo '<b>Email: '.$email.'</b>'."<br/><br/>";
                    }
                    }
                            
             else{
                    echo "No hi han usuaris".$connexio->error."<br/>";
                 }
                           
        }
		
		?>
            </fieldset> 

            <h3>Taula Records lavabo</h3>
            <fieldset> 
            
            <?php 
     $connexio = new mysqli("localhost","root","joan","LoginResgistre");
     if ($connexio->connect_errno) {
         echo "Connexió fallida: " . $connexio->connect_error." - ".$connexio->connect_errno;
     } 
    
     else {
        $sentenciaSql =  "SELECT * FROM recordslavabo;";
           $consulta = $connexio->query($sentenciaSql);
            

           if ($consulta) {
                    
            while ($vectorRegistres = $consulta->fetch_array(MYSQLI_BOTH)) {
                //LLegim el contingut del registre actual
                        
                $nom = $vectorRegistres["nr"];
                $MaxPuntuacio = $vectorRegistres["MaxPuntuacio"];
                //Mostrem les dades del registre
                 echo '<b>Nom: '.$nom.'</b>'."<br/>";
                 echo '<b>MaxPuntuacio: '.$MaxPuntuacio.'</b>'."<br/>";
             
                 
                }
                }
                        
         else{
                echo "No hi han usuaris".$connexio->error."<br/>";
             }
                       
    }
    
    ?>
        </fieldset>

        </fieldset> 

            <h3>Taula Records lavabo</h3>
            <fieldset> 
            
            <?php 
     $connexio = new mysqli("localhost","root","joan","LoginResgistre");
     if ($connexio->connect_errno) {
         echo "Connexió fallida: " . $connexio->connect_error." - ".$connexio->connect_errno;
     } 
    
     else {
        $sentenciaSql =  "SELECT * FROM recordstetris;";
           $consulta = $connexio->query($sentenciaSql);
            

           if ($consulta) {
                    
            while ($vectorRegistres = $consulta->fetch_array(MYSQLI_BOTH)) {
                //LLegim el contingut del registre actual
                        
                $nom = $vectorRegistres["nom"];
                $puntuacio = $vectorRegistres["puntuacio"];
                //Mostrem les dades del registre
                 echo '<b>Nom: '.$nom.'</b>'."<br/>";
                 echo '<b>puntuacio: '.$puntuacio.'</b>'."<br/>"."<br/>";
             
                 
                }
                }
                        
         else{
                echo "No hi han usuaris".$connexio->error."<br/>";
             }
                       
    }
    
    ?>
        </fieldset>


        <h3>Eliminar Usuaris</h3>
        <fieldset>
        <div>
            <form method="GET" action="crud.php">
				Email Del Usuari:<input type="text" name="email" value="email">
                <button>Eliminar Usuari</button>
            </form>

        </div>
        </fieldset>
        <?php
             $connexio = new mysqli("localhost","root","joan","LoginResgistre");
              if ($connexio->connect_errno) {
                    echo "Connexió fallida: " . $connexio->connect_error." - ".$connexio->connect_errno;
                } 
            else {
                  
                       $email=$connexio->real_escape_string($_GET["email"]);
                      
                        
                       $sentenciaSql ="DELETE FROM registre WHERE email='$email'";
                       $consulta = $connexio->query($sentenciaSql);
                    
                       
                }
           ?>
			
			
            <?php
         $email=$_GET['email'];
         $email = $_GET["email"];    
         echo '<hr><a href="benvinguda.php?email='.$email.'"><input type="button" value="Pàgina Principal"></a>';
        ?>

</body>
</html>
