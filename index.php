<?php 
session_unset();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Iniciar</title>
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<style>
	body{
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	font-family: 'Jost', sans-serif;
	background-image: url("fondo_login1.jpg") ;
	background-repeat:no-repeat;
	background-position:center;
	background-color:#000619;
}


.main{
	width: 330px;
	height: 500px;
	background: red;
	overflow: hidden;
	background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
	border-radius: 10px;
	box-shadow: 5px 20px 50px #000;
}
#deslizar{
	display: none;
}
.Registro{
	position: relative;
	width:100%;
	height: 100%;
	top: -55px;
}
label{
	color: #fff;
	font-size: 2.3em;
	justify-content: center;
	display: flex;
	margin: 60px;
	font-weight: bold;
	cursor: pointer;
	transition: .5s ease-in-out;
}
input{
	width: 60%;
	height: 20px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 10px;
	border: none;
	outline: none;
	border-radius: 5px;
}
button{
	width: 60%;
	height: 40px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: #fff;
	background: #e925f0;
	font-size: 1em;
	font-weight: bold;
	margin-top: 20px;
	outline: none;
	border: none;
	border-radius: 5px;
	transition: .2s ease-in;
	cursor: pointer;
}
button:hover{
	background: #841a76;
}
.login{
	height: 460px;
	background: #eee;
	border-radius: 60% / 10%;
	transform: translateY(-180px);
	transition: .8s ease-in-out;
	
	
}
.login label{
	color: #020105;
	transform: scale(.6);
}

#deslizar:checked ~ .login{
	transform: translateY(-550px);
}

.fieldsetlogin{
	background-color: #fff;
	
}

</style>
</head>
<body>

	<div class="main"> 
		 	
		<input type="checkbox" id="deslizar" aria-hidden="true">
		<div class="Registro">
				<form method="POST" action="login.php">
					<label for="deslizar" aria-hidden="true">Login</label>
					<input type="text" name="usuari" value="usuari"  >
					<input type="text" name="email" value="email">
					<input type="password" name="passwd" value="passwd">
					<button>Iniciar</button>
				</form>
			
			</div>
			
			
			
			<div class="login">
				<form method="POST" action="index.php">
					<label for="deslizar" >Registre</label>
					<input type="text" name="usuari_registre" value="usuari"  >
					<input type="email" name="email_registre" value="email"  >
					<input type="password" name="passwd_registre" value="passwd" >
					<button name="enviar">Iniciar</button>
				</form>
				<fieldset>
				<?php
		
			$connexio = new mysqli("localhost", "root", "joan", "loginresgistre");
		
			
			if ($connexio->connect_errno) {
				echo "Connexió fallida: " . $connexio->connect_error." - ".$connexio->connect_errno;
			} 
		
			else {
			
			
			if(!empty($_POST["usuari_registre"]) && !empty($_POST["email_registre"]) && !empty($_POST["passwd_registre"]) ){
				$usuari=$connexio->real_escape_string($_POST["usuari_registre"]);
				$email=$connexio->real_escape_string($_POST["email_registre"]);
				$passwd=$connexio->real_escape_string($_POST["passwd_registre"]);

				
				$hash=password_hash("$passwd",PASSWORD_DEFAULT);
				
				$sentenciaSql =  "SELECT email FROM registre WHERE email='$email' ";
				$consulta = $connexio->query($sentenciaSql);

				if($consulta && $rowcount=mysqli_num_rows($consulta) <= 0){

					if (!$connexio->query("INSERT INTO registre(usuari,email,passwd) 
							VALUES ('$usuari','$email','$hash')")){
							echo "Registre ja existeix ";
							
					} 
					else {
					
							echo "Registro insertado con exito.";
						   
					}  
				}
				else{
					echo "Registre ja existeix ";
					
				}
			   
			
			}
			else{
				echo "Falten registres per inserir";
			   
			}
		}

		?>

				</fieldset>
			</div>
	</div>
	
</body>
</html>