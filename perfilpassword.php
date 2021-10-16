<!DOCTYPE html>
<?php include "ligacao.php"; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

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
                        <h2 class="form-title">Editar Perfil</h2>
<?php
	if(isset($_POST['atualizar'])){
		
		$flag=false;
		$flag_email=false;
		$flag_pass=false;
	
		$pass_antiga=$_POST['pass_antiga'];
		$pass_nova=$_POST['pass_nova'];
		$re_pass=$_POST['re_pass'];
		
		


		/* Verificar se a Password existe no Utilizador  */
		$query="select password_utilizador from utilizador where email_utilizador='".$_SESSION['email_utilizador']."'";
		
		$result=mysqli_query($ligax,$query);
		while($registo=mysqli_fetch_assoc($result)){
			$passBD=$registo['password_utilizador'];	
		}
		
		/* Validações */		
		if ($pass_nova!=$re_pass || $pass_antiga!=$passBD || $pass_nova=="") {$flag=true; $flag_pass=true;}
		
		/* Existiu um erro */
		if($flag==true){ 
		
		?>
			Erro na password!<br>
			
			<form method="POST" class="register-form" id="register-form">
                           
						   <div class="form-group">
                                <label for="pass"><img src="images/lock.png"/></label>
                                <input type="password" name="pass_antiga" id="pass_antiga" value="" placeholder="Password Atual" required="required" />
                            </div>
							
                            <div class="form-group">
                                <label for="re-pass"><img src="images/lock.png"/></label>
                                <input type="password" name="pass_nova" id="pass_nova" placeholder="Nova Password" />
                            </div>
							
							<div class="form-group">
                                <label for="re-pass"><img src="images/lock.png"/></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Confirmar Password" />
							</div>
							
                            <div class="form-group form-button">
                                <input type="submit" name="atualizar" id="signup" class="form-submit" value="Guardar"/>
                            </div>
                        </form>
			
		<?php } else { 
		
		$alterar="update utilizador set password_utilizador='".$pass_nova."'
		
		where email_utilizador='".$_SESSION['email_utilizador']."'";
		//echo $alterar;
			$result=mysqli_query($ligax,$alterar);
		
			if($result==1){

				echo "<p>Parabéns mudou a sua Password!</p>";
	
			} else {
				echo "<p>Dados n&atilde;o inseridos!</p>";
			}
		}
	} else {
			$procura="select * from utilizador where email_utilizador='".$_SESSION['email_utilizador']."'";
			//echo $procura;
			$result=mysqli_query($ligax,$procura);
			$nregistos=mysqli_num_rows($result);
			$registo=mysqli_fetch_assoc($result);
			if($nregistos==1){
				$pass=$registo['password_utilizador'];
				
				
				
			}

		?>
			
	
						<form method="POST" class="register-form" id="register-form" action="">

                            <div class="form-group">
                                <label for="pass"><img src="images/lock.png"/></label>
                                <input type="password" name="pass_antiga" id="pass_antiga" value="" placeholder="Password Atual" required="required" />
                            </div>
							
                            <div class="form-group">
                                <label for="re-pass"><img src="images/lock.png"/></label>
                                <input type="password" name="pass_nova" id="pass_nova" placeholder="Nova Password" />
                            </div>
							
							<div class="form-group">
                                <label for="re-pass"><img src="images/lock.png"/></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Confirmar Password" />
							</div>

                            <div class="form-group form-button">
                                <input type="submit" name="atualizar" id="signup" class="form-submit" value="Guardar Password"/>
                            </div>
                        </form>
						
	<?php } ?>					
						
						
						
						
						
                    </div>
                    <div class="signup-image">
                        <a href="" class="image"><img src="images/gatoregisto.png" alt="sing up image"></a>
                        <label for="agree-term" class="label-agree-term"><a href="login.php" class="signup-image-link"></a></label>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>