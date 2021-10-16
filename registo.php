<?php include "ligacao.php"; ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="images/logomini.png" type="image/png">
    <title>BeHuman - Registo</title>

    <!-- Font Icon -->
    

    <!-- Main css -->
    <link rel="stylesheet" href="login_registo/css/style.css">
</head>
<body>

    <div class="main">
<figure><a href="index.php" ><img src="images/logo3.png" alt="sing up image"></a></figure>
        <!-- Registo -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Registo de Utilizador</h2>
<?php
	if(isset($_POST['registar'])){
		$flag=false;
		$flag_email=false;
		$flag_pass=false;

		$nome=$_POST['nome'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$re_pass=$_POST['re_pass'];

		/* Verificar se o login já existe */
		$query="select email_utilizador from utilizador";
		$result=mysqli_query($ligax,$query);
		while($registo=mysqli_fetch_assoc($result)){
			$emailBD=$registo['email_utilizador'];
			if($emailBD==$email){
				$flag=true;
				$flag_email=true;
			}		
		}
		/* Validações */		
		if ($pass!=$re_pass || $pass=="") {$flag=true; $flag_pass=true;}
		
		/* Existiu um erro */
		if($flag==true){ 
		
		?>
			
			Dados incorretos!
			
			<form method="POST" class="register-form" id="register-form" action="">
                            <br><div class="form-group">
                                <label for="name"><img src="images/userb.png"/></label>
                                <input type="text" name="nome" id="nome" placeholder="Nome" required=""/>
                            </div>
                            <div class="form-group">
                                <label for="email"><img src="images/email.png"/></label>
                                <input type="email" name="email" id="email" placeholder="Email" required=""/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><img src="images/lock.png"/></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required=""/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><img src="images/lock.png"/></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Confirmar Password" required=""/>
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="registar" id="signup" class="form-submit" value="Registar"/>
                            </div>
                        </form>
			
		<?php } else { 
		
		$insere="INSERT INTO utilizador
			(nome_utilizador, email_utilizador,password_utilizador) VALUES ('".$nome."','".$email."','".$pass."')";

			$result=mysqli_query($ligax,$insere);
		
			if($result==1){
				
			echo"<p>Parabéns $nome! Realizou o seu Login com sucesso.</p>";
			?>	
				
			<br><br>
			 <div class="form-group form-button">
			<a href="index.php" class="form-submit">Voltar ao Menu Principal</a>
			</div>
			
			<?php
			} else {
				echo "<p>Dados não inseridos!</p>";?><br><br>
				<a href="index.php" class="form-submit">Voltar ao Menu Principal</a><?php
			}
		}
	} else {
		?>
			
	
						<form method="POST" class="register-form" id="register-form" action="">
                            <div class="form-group">
                                <label for="name"><img src="images/userb.png"/></label>
                                <input type="text" name="nome" id="nome" placeholder="Nome" required=""/>
                            </div>
                            <div class="form-group">
                                <label for="email"><img src="images/email.png"/></label>
                                <input type="email" name="email" id="email" placeholder="Email" required=""/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><img src="images/lock.png"/></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required=""/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><img src="images/lock.png"/></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Confirmar Password" required=""/>
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="registar" id="signup" class="form-submit" value="Registar"/>
                            </div>
                        </form>
						
	<?php } ?>					
						
						
						
						
						
                    </div>
                    <div class="signup-image">
                        <a class="image"><img src="images/gatoregisto.png" alt="sing up image"></a>
                        <label for="agree-term" class="label-agree-term"><a href="login.php" class="signup-image-link">Já és membro? Faça login!</a></label>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="login_registo/vendor/jquery/jquery.min.js"></script>
    <script src="login_registo/js/main.js"></script>
	<link rel="stylesheet" href="login_registo/css/style.css" />
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>