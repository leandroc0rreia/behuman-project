
			
			<h1>Inserir Anúncio de Adoção</h1><br>
<?php
	if(isset($_POST['anunciar'])){
		$flag=false;

		
		$localidade=$_POST['localidade'];
		$contacto=$_POST['contacto'];
		$tipo_adocao=$_POST['tipo_adocao'];
		$descricao=$_POST['descricao'];
		$dataini=$_POST['dataini'];
		$datafin=$_POST['datafin'];
		$nome_animal=$_POST['nome_animal'];
		$idade_animal=$_POST['idade_animal'];
		$tipo_animal=$_POST['tipo_animal'];
		$raca_animal=$_POST['raca_animal'];
		$genero_animal=$_POST['genero_animal'];
	

		/* Existiu um erro */
		if($flag==true){ 
		
		?>
													<form method="post" action="" enctype="multipart/form-data">
														<div class="row gtr-uniform">
															<div class="col-6 col-12-xsmall">
																<input type="text" name="localidade" id="localidade" value="" placeholder="Localidade, Distrito" maxlength="50" required="required"/>
															</div>
															
															<div class="col-6 col-12-xsmall">
																<input type="text" name="contacto" id="contacto" value="" placeholder="Contacto" maxlength="9" required="required"/>
															</div>
															
															<!-- Break -->
															<div class="col-12">
																<select name="tipo_adocao" id="tipo_adocao">
																	<option value="">Tipo de Adoção</option>
																	<option value="Temporária">Temporária</option>
																	<option value="Definitiva">Definitiva</option>
																</select>
															</div>
															<!-- Break -->
															<div class="col-6 col-12-xsmall">
																<input type="text" name="nome_animal" id="nome_animal" value="" placeholder="Nome do Animal" />
															</div>
															<div class="col-6 col-12-xsmall">
																<input type="text" name="idade_animal" id="idade_animal" value="" placeholder="Idade do Animal" />
															</div>
															<div class="col-6 col-12-xsmall">
																<input type="text" name="tipo_animal" id="tipo_animal" value="" placeholder="Tipo de Animal" />
															</div>
															<div class="col-6 col-12-xsmall">
																<input type="text" name="raca_animal" id="raca_animal" value="" placeholder="Raça de Animal" />
															</div>
															<!-- Break -->
															<div class="col-12">
																<select name="genero_animal" id="genero_animal">
																	<option value="">Género do Animal</option>
																	<option value="M">Masculino</option>
																	<option value="F">Feminino</option>
																	<option value="N">Não atribuir</option>
																</select><br>
															</div>
															<!-- Break -->
															<h3>De:</h3>
									
																<div class="col-6 col-12-xsmall">
																	<input type="date" name="dataini" id="dataini" value="" placeholder="Data Inicial" />
																</div>

															</div>
															
															<br>
															<div class="row gtr-uniform">
																<h3>Até:</h3>
																<div class="col-6 col-12-xsmall">
																	<input type="date" name="datafin" id="datafin" value="" placeholder="Data Final" />
																</div>
															</div>	
																<br>
															<!-- Break -->
															<div class="row gtr-uniform">
																<label for="text"><img src="images/photo.png"/></label>
																<div class="col-6 col-12-xsmall">
																	<input type="file" name="foto" id="foto"  />
																</div>
															</div><br>
															<!-- Break -->
															<h3>Descrição</h3><br>
															<div class="col-12">
																<textarea name="descricao" id="descricao" placeholder="Insira dados que os Utilizadores necessitem saber sobre o seu Animal." rows="6"></textarea>
															</div>
															<!-- Break -->
															<br><br>
															<div class="col-12">
																<ul class="actions">
																	<li><input type="submit" name="anunciar" value="Enviar Anúncio" class="primary" /></li>
																	<li><input type="reset" value="Apagar dados" /></li>
																</ul>
															</div>
														
													</form>
													<?php } else { 
		
		$insere="INSERT INTO anuncioadoc (localidade_anuncio, contacto_anuncio,tipo_adocao,descricao_anuncio,dataini_anuncio,datafin_anuncio,nome_animal,idade_animal,tipo_animal,raca_animal,genero_animal,email_utilizador, data_post) 
		VALUES ('".$localidade."','".$contacto."','".$tipo_adocao."','".$descricao."','".$dataini."','".$datafin."','".$nome_animal."','".$idade_animal."','".$tipo_animal."','".$raca_animal."','".$genero_animal."','".$_SESSION['email_utilizador']."',now())";

			$result=mysqli_query($ligax,$insere);
		
			if($result==1){
					
		
				$cod_anuncioadoc=mysqli_insert_id($ligax);  
				if($_FILES['foto']['error']==0){
				$file_id=mysqli_insert_id($ligax);//ultimo registo inserido na base de dados
				$file_name=$_FILES['foto']['name'];
				$file_type=$_FILES['foto']['type'];
				$file_size=$_FILES['foto']['size'];
				$file_tmp=$_FILES['foto']['tmp_name'];
				$data=base64_encode(file_get_contents($file_tmp));
				$query="UPDATE anuncioadoc set nome_foto='".$file_name."', tipo_foto='".$file_type."',
		tamanho_foto=$file_size, dados_foto='".$data."' where cod_anuncio='".$cod_anuncioadoc."'";	
				$result_up=mysqli_query($ligax,$query);
			}
				
				echo"<p>Anúncio inserido com sucesso.</p>";
			?>	
				
			<br>
			 
			<a href="index.php" class="button primary large">Voltar ao Menu Principal</a>
			
			
			<?php
			} else {
				echo "<p>Dados não inseridos!</p>";?>
				<br>
			
			<a href="index.php" class="button primary large">Voltar ao Menu Principal</a>
			
				<?php
			}
		}
	} else {
		?>
		<form method="post" action="" enctype="multipart/form-data">
														<div class="row gtr-uniform">
															<div class="col-6 col-12-xsmall">
																<input type="text" name="localidade" id="localidade" value="" placeholder="Localidade, Distrito" maxlength="50" required="required"/>
															</div>
															
															<div class="col-6 col-12-xsmall">
																<input type="text" name="contacto" id="contacto" value="" placeholder="Contacto" maxlength="9" required="required"/>
															</div>
															
															<!-- Break -->
															<div class="col-12">
																<select name="tipo_adocao" id="tipo_adocao">
																	<option value="">Tipo de Adoção</option>
																	<option value="Temporária">Temporária</option>
																	<option value="Definitiva">Definitiva</option>
																</select>
															</div>
															<!-- Break -->
															<div class="col-6 col-12-xsmall">
																<input type="text" name="nome_animal" id="nome_animal" value="" placeholder="Nome do Animal" />
															</div>
															<div class="col-6 col-12-xsmall">
																<input type="text" name="idade_animal" id="idade_animal" value="" placeholder="Idade do Animal" />
															</div>
															<div class="col-6 col-12-xsmall">
																<input type="text" name="tipo_animal" id="tipo_animal" value="" placeholder="Tipo de Animal" />
															</div>
															<div class="col-6 col-12-xsmall">
																<input type="text" name="raca_animal" id="raca_animal" value="" placeholder="Raça de Animal" />
															</div>
															<!-- Break -->
															<div class="col-12">
																<select name="genero_animal" id="genero_animal">
																	<option value="">Género do Animal</option>
																	<option value="M">Masculino</option>
																	<option value="F">Feminino</option>
																	<option value="N">Não atribuir</option>
																</select><br>
															</div>
															<!-- Break -->
															<h3>De:</h3>
									
																<div class="col-6 col-12-xsmall">
																	<input type="date" name="dataini" id="dataini" value="" placeholder="Data Inicial" />
																</div>

															</div>
															
															<br>
															<div class="row gtr-uniform">
																<h3>Até:</h3>
																<div class="col-6 col-12-xsmall">
																	<input type="date" name="datafin" id="datafin" value="" placeholder="Data Final" />
																</div>
															</div>	
																<br>
															<!-- Break -->
															<div class="row gtr-uniform">
																<label for="text"><img src="images/photo.png"/></label>
																<div class="col-6 col-12-xsmall">
																	<input type="file" name="foto" id="foto"  />
																</div>
															</div><br>
															<!-- Break -->
															<h3>Descrição</h3><br>
															<div class="col-12">
																<textarea name="descricao" id="descricao" placeholder="Insira dados que os Utilizadores necessitem saber sobre o seu Animal." rows="6"></textarea>
															</div>
															<!-- Break -->
															<br><br>
															<div class="col-12">
																<ul class="actions">
																	<li><input type="submit" name="anunciar" value="Enviar Anúncio" class="primary" /></li>
																	<li><input type="reset" value="Apagar dados" /></li>
																</ul>
															</div>
														
													</form>
			<?php } ?>	