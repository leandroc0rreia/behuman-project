
<?php
	
	 // validar_user é o nome do butão Entrar do formulário Login
		
				$email_utilizador=$_POST["email_utilizador"]; // Recebe o username ou email do formulário Login
				$password_utilizador=$_POST["password_utilizador"];  // Recebe a password do formulário Login
				
				$procura="select * from utilizador where email_utilizador='".$email_utilizador."' and password_utilizador='".$password_utilizador."' ;";
				
				$result=mysqli_query($ligax,$procura);
				
				$nregistos=mysqli_num_rows($result);
				
				$registo=mysqli_fetch_assoc($result);
				
				if($nregistos==1){
					
					//echo "Login e password correcto!";
				$ativo=$registo["ativo"]; 
				
				if($ativo==1){
					?>
					
					<div id="popup1" class="overlay">
						<div class="popup">
						<h2>Foste banido permanentemente!</h2>
						<a class="close" href="index.php">&times;</a>
						<p>Razão: Conteúdo Impróprio.</p>
							<div class="content">
								
								 <center> <a href="index.php"><input class="form-submit" value="Voltar ao Menu Principal"/></a></center>
								
							</div>
						</div>
					</div>
					
					<?php
					echo $ativo;
				} else {
				
					$_SESSION["cod_utilizador"]=$registo["cod_utilizador"]; //guarda a chave primária
					
					
					$_SESSION["login_status"]=1; // está logado com sucesso
					
					
					$_SESSION["email_utilizador"]=$registo["email_utilizador"]; //guarda o username
					
				
					$_SESSION["perfil_utilizador"]=$registo["perfil_utilizador"]; // guarda o tipo de perfil: administrador ou utilizador
				}
						
				}
				else { 
					
					
					$_SESSION["login_status"]=0; // não realizou login com sucesso - Falhou!
					//echo "Login ou password incorrecto!";
				
			
				}
				
	?>

