<?php include "ligacao.php"; ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="images/logomini.png" type="image/png">
    <title>Editar Perfil</title>

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
                        <h1 class="form-title">Editar Perfil</h1>
<?php
	if(isset($_POST['atualizar'])){
		
		$flag=false;
		$flag_email=false;
	
		$nome=$_POST['nome'];
		$datanasc=$_POST['datanasc'];
		$morada=$_POST['morada'];
		$telemovel=$_POST['telemovel'];
		$genero=$_POST['genero'];
		$codpost=$_POST['codpost'];

		$alterar="update utilizador set nome_utilizador = '".$nome."',
		datanasc_utilizador='".$datanasc."',
		morada_utilizador='".$morada."',
		genero_utilizador='".$genero."',
		codpost_utilizador='".$codpost."',
		telemovel_utilizador='".$telemovel."'
		
		where email_utilizador='".$_SESSION['email_utilizador']."'";
		//echo $alterar;
			$result=mysqli_query($ligax,$alterar);
		
			if($result==1){
				
				
				
				
				echo"<p>Dados Enviados</p>";
				echo "<p>Nome: $nome</p>";
				echo "<p>Data de Nascimento: $datanasc</p>";
				echo "<p>Morada: $morada</p>";
				echo "<p>Telemóvel: $telemovel</p>";
				echo "<p>Género: $genero</p>";
				echo "<p>Código-Postal: $codpost</p>";
				echo "<div class='form-group form-button' align='center'>
						<center> <a href='index.php'><input class='form-submit' value='Voltar ao Menu Principal'/></a></center>
					  </div>";
				
				if($_FILES['foto']['error']==0){
				$file_id=mysqli_insert_id($ligax);//ultimo registo inserido na base de dados
				$file_name=$_FILES['foto']['name'];
				$file_type=$_FILES['foto']['type'];
				$file_size=$_FILES['foto']['size'];
				$file_tmp=$_FILES['foto']['tmp_name'];
				$data=base64_encode(file_get_contents($file_tmp));
				$query="update utilizador set nome_foto='".$file_name."',tipo_foto='".$file_type."',
		tamanho_foto=$file_size,dados_foto='".$data."' where email_utilizador='".$_SESSION['email_utilizador']."'";	
				$result_up=mysqli_query($ligax,$query);
			}
				
				
				
				
			} 
		
	}
	if(isset($_POST['atualizar_password'])){	
		
		$flag=false;
		$flag_email=false;
		$flag_pass=false;
	
		$pass_antiga=$_POST['pass_antiga'];
		$pass_nova=$_POST['pass_nova'];
		$re_pass=$_POST['re_pass'];
		
		


		/* Verificar se a Password existe no Utilizador  */
		$query="select * from utilizador where email_utilizador='".$_SESSION['email_utilizador']."'";
		
		$result=mysqli_query($ligax,$query);
		while($registo=mysqli_fetch_assoc($result)){
			$passBD=$registo['password_utilizador'];
$cod_utilizador=$registo["cod_utilizador"];
				$nome=$registo["nome_utilizador"];
				$email=$registo['email_utilizador'];
				$datanasc=$registo['datanasc_utilizador'];
				$morada=$registo['morada_utilizador'];
				$telemovel=$registo['telemovel_utilizador'];
				$genero=$registo['genero_utilizador'];
				$codpost=$registo['codpost_utilizador'];			
		}
		
		/* Validações */		
		if ($pass_nova!=$re_pass || $pass_antiga!=$passBD || $pass_nova=="") {$flag=true; $flag_pass=true;}
		
		
		
		
		/* Existiu um erro */
		if($flag==true){ 
		
		?>
			Erro!<br>
			
			<form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                           <div class="form-group">
                                <label for="name"><img src="images/userb.png"/></label>
                                <input type="text" name="nome" value="<?php echo $nome;?>" id="nome" placeholder="Escreva o Nome" maxlength="50" required="required" />
                            </div>
							
                            <div class="form-group">
                                <label for="email"><img src="images/email.png"/></label>
                                <input type="email" name="email" id="email" value="<?php echo $_SESSION['email_utilizador'];?>" disabled placeholder="Email" required="required" />
                            </div>
							
							<div class="form-group">
                                <label for="date"><img src="images/calendar.png"/></label>
                                <input type="date" name="datanasc" id="datanasc" value="<?php echo $datanasc;?>" placeholder="Data de Nascimento" required="required" />
                            </div>

							<div class="form-group">
                                <label for="text"><img src="images/house.png"/></label>
                                <input type="text" name="morada" id="morada" value="<?php echo $morada;?>" placeholder="Morada" />
                            </div>
							
							<div class="form-group">
                                <label for="text"><img src="images/phone.png"/></label>
                                <input type="text" name="telemovel" id="telemovel" value="<?php echo $telemovel;?>" placeholder="Telemóvel" maxlength="12" />
                            </div>
							
							<div class="form-group">
                                <label for="text"><img src="images/gender.png"/></label>
                                <input type="text" name="genero" id="genero" value="<?php echo $genero;?>" placeholder="Género" maxlength="1" />
                            </div>
							
							<div class="form-group">
                                <label for="text"><img src="images/mailbox.png"/></label>
                                <input type="text" name="codpost" id="codpost" value="<?php echo $codpost;?>" placeholder="Código Postal" maxlength="8" />
                            </div>
							 
								<div class="form-group">
                                <label for="text"><img src=""/></label>
                                <input type="file" name="foto" id="foto"  />
                            </div>
                            <div class="form-group form-button" align="center">
                                <input type="submit" name="atualizar" id="signup" class="form-submit" value="Guardar"/>
                            </div>
                        </form>
						<br>
						
						<br>
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

                            <div class="form-group form-button" align="center">
                                <input type="submit" name="atualizar_password" id="signup" class="form-submit" value="Guardar Password"/>
                            </div>
                        </form>
			
		<?php } else { 
		
		$alterar_password="update utilizador set password_utilizador='".$pass_nova."'
		
		where email_utilizador='".$_SESSION['email_utilizador']."'";
		//echo $alterar;
			$result=mysqli_query($ligax,$alterar_password);
		
			if($result==1){

				echo "<p>Parabéns mudou a sua Password!</p>";
	
			} else {
				echo "<p>Dados n&atilde;o inseridos!</p>";
			}
		}
	} 

if(!isset($_POST['atualizar_password']) && !isset($_POST['atualizar']))	{
			$procura="select * from utilizador where email_utilizador='".$_SESSION['email_utilizador']."'";
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
				$_SESSION['tamanho_foto']=$registo['tamanho_foto'];
				
				
			}

		?>
			
	
						<form method="POST" class="register-form" id="register-form" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><img src="images/userb.png"/></label>
                                <input type="text" name="nome" value="<?php echo $nome;?>" id="nome" placeholder="Escreva o Nome" maxlength="50" required="required" />
                            </div>
							
                            <div class="form-group">
                                <label for="email"><img src="images/email.png"/></label>
                                <input type="email" name="email" id="email" value="<?php echo $_SESSION['email_utilizador'];?>" disabled placeholder="Email" required="required" />
                            </div>
							
							<div class="form-group">
                                <label for="date"><img src="images/calendar.png"/></label>
                                <input type="date" name="datanasc" id="datanasc" value="<?php echo $datanasc;?>" placeholder="Data de Nascimento" required="required" />
                            </div>

							<div class="form-group">
                                <label for="text"><img src="images/house.png"/></label>
                                <input type="text" name="morada" id="morada" value="<?php echo $morada;?>" placeholder="Morada" />
                            </div>
							
							<div class="form-group">
                                <label for="text"><img src="images/phone.png"/></label>
                                <input type="text" name="telemovel" id="telemovel" value="<?php echo $telemovel;?>" placeholder="Telemóvel" maxlength="12" />
                            </div>
							
							<div class="form-group">
                                <label for="text"><img src="images/gender.png"/></label>
                                <input type="text" name="genero" id="genero" value="<?php echo $genero;?>" placeholder="Género" maxlength="1" />
                            </div>
							
							<div class="form-group">
                                <label for="text"><img src="images/mailbox.png"/></label>
                                <input type="text" name="codpost" id="codpost" value="<?php echo $codpost;?>" placeholder="Código Postal" maxlength="8" />
                            </div>
							<div class="form-group">
                                <label for="text"><img src="images/photo.png"/></label>
                                <input type="file" name="foto" id="foto"  />
                            </div>
                            <div class="form-group form-button" align="center">
                                <input type="submit" name="atualizar" id="signup" class="form-submit" value="Guardar"/>
                            </div>
                        </form>
						<br>
						
						<br>
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

                            <div class="form-group form-button" align="center">
                                <input type="submit" name="atualizar_password" id="signup" class="form-submit" value="Guardar Password"/>
                            </div>
							
							<div class="form-group form-button" align="center">
								 <center> <a href="index.php"><input class="form-submit" value="Voltar ao Menu Principal"/></a></center>
							</div>
                        </form>
						
						
						
	<?php } ?>					
						
                    </div>
                   <div class="signup-image">
						<?php if($_SESSION['tamanho_foto']==0){ ?>
											<a href="#" class="image"><img src="semfoto.png" alt="" /></a>
										<?php } else { ?>
                        <a href="" class="image"><img src="showfile_fotoperfil.php?cod_utilizador=<?php echo $_SESSION['cod_utilizador'];?>" alt="sing up image"></a>
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