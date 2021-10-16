<?php include "ligacao.php"; ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BeHuman</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
	<link rel="shortcut icon" href="images/logomini.png" type="image/png">
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
                        <h2 class="form-title">Perfil</h2>
<?php
	
			$procura="select * from utilizador where email_utilizador='".$_GET['email_utilizador']."'";
			//echo $procura;
			$result=mysqli_query($ligax,$procura);
			$nregistos=mysqli_num_rows($result);
			$registo=mysqli_fetch_assoc($result);
			if($nregistos==1){
				$cod_utilizador=$registo["cod_utilizador"];
				$nome=$registo["nome_utilizador"];
				$email=$registo['email_utilizador'];
				$datanasc=$registo['datanasc_utilizador'];
				$morada=$registo['morada_utilizador'];
				$telemovel=$registo['telemovel_utilizador'];
				$genero=$registo['genero_utilizador'];
				$codpost=$registo['codpost_utilizador'];
				$tamanho_foto=$registo['tamanho_foto'];
				
			}

		?>
			
	
						<form method="POST" class="register-form" id="register-form" action="editar_perfil.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><img src="images/userb.png"/></label>
                                <input type="text" name="nome" value="<?php echo $nome;?>" id="nome" disabled />
                            </div>
							
                            <div class="form-group">
                                <label for="email"><img src="images/email.png"/></label>
                                <input type="email" name="email" id="email" value="<?php echo $email;?>" disabled />
                            </div>

							<div class="form-group">
                                <label for="text"><img src="images/phone.png"/></label>
                                <input type="text" name="telemovel" id="telemovel" value="<?php echo $telemovel;?>" disabled placeholder="Sem Informações"/>
                            </div>
							
							<div class="form-group">
                                <label for="text"><img src="images/gender.png"/></label>
                                <input type="text" name="genero" id="genero" value="<?php echo $genero;?>" disabled placeholder="Sem Informações"/>
                            </div>
							
							<div class="form-group">
                                <label for="text"><img src="images/mailbox.png"/></label>
                                <input type="text" name="codpost" id="codpost" value="<?php echo $codpost;?>" disabled placeholder="Sem Informações"/>
							</div>
							<div class="form-group form-button" align="center">
								 <center> <a href="index.php"><input class="form-submit" value="Voltar ao Menu Principal"/></a></center>
							</div>
                        </form>
						
				
					
					</div>
					
                    <div class="signup-image">
						<?php if($tamanho_foto==0){ ?>
											<a class="image"><img src="semfoto.png" alt="" /></a>
										<?php } else { ?>
                        <a class="image"><img src="showfile_fotoperfil.php?cod_utilizador=<?php echo $cod_utilizador;?>" alt="sing up image"></a>
						<?php }  ?>
                        <label for="agree-term" class="label-agree-term">
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