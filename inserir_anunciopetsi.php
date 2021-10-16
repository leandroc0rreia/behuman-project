			<h1>Inserir Anúncio de Pet-Sitting</h1><br>
<?php
	if(isset($_POST['anunciar'])){
		$flag=false;
		

		$localidade=$_POST['localidade'];
		$contacto=$_POST['contacto'];
		$quantidade=$_POST['quantidade'];
		$preferencia=$_POST['preferencia'];
		$disponibilidade=$_POST['disponibilidade'];
		$dataini=$_POST['dataini'];
		$datafin=$_POST['datafin'];
		$informacao=$_POST['informacao'];		
		
		/* Existiu um erro */
		if($flag==true){ 
		
		?>
				<form method="post" action="" enctype="multipart/form-data">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
										<input type="text" name="localidade" id="localidade" value="" placeholder="Localidade, Distrito" maxlength="50" required="required" />
									</div>
									
									<div class="col-6 col-12-xsmall">
										<input type="text" name="contacto" id="contacto" value="" placeholder="Contacto" maxlength="9" required="required"/>
									</div>
									
									<!-- Break -->
									
									<div class="col-6 col-12-xsmall" >
										<input type="text" name="quantidade" id="quantidade" value="" placeholder="Quantidade de Animais que está disposto a adotar" required="required"/>
									</div>
									
									<div class="col-6 col-12-xsmall" >
										<input type="text" name="preferencia" id="preferencia" value="" placeholder="Preferências de Animais" />
									</div>
									
									<div class="col-12">
										<select name="disponibilidade" id="disponibilidade">
											<option value="">Disponibilidade</option>
											<option value="Temporária">Temporária</option>
											<option value="Definitiva">Definitiva</option>
											<option value="Temporária/Definitiva">Temporária/Definitiva</option>
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
								<div class="row gtr-uniform">
									<h3>Informações Importantes</h3>
									<div class="col-12">
										<textarea name="informacao" id="informacao" placeholder="Insira dados que os Utilizadores necessitem saber." rows="6"></textarea>
									</div>
									<!-- Break -->
									<br><div class="col-12">
										<ul class="actions">
											<li><input type="submit" name="anunciar" value="Enviar Anúncio" class="primary" /></li>
											<li><input type="reset" value="Apagar dados" /></li>
										</ul>
									</div>
								</div>
</form>
<?php } else { 
		
		$insere="INSERT INTO anunciopetsi (localidade_anunciopetsi, contacto_anunciopetsi,quantidade_anunciopetsi,preferencia_anunciopetsi,disponibilidade_anunciopetsi,dataini_anunciopetsi,datafin_anunciopetsi,informacao_anunciopetsi,email_utilizador,data_post) 
		VALUES ('".$localidade."','".$contacto."','".$quantidade."','".$preferencia."','".$disponibilidade."','".$dataini."','".$datafin."','".$informacao."','".$_SESSION['email_utilizador']."',now())";

			$result=mysqli_query($ligax,$insere);

			
				
			if($result==1){
				if($_FILES['foto']['error']==0){
				$cod_anunciopetsi=mysqli_insert_id($ligax);//ultimo registo inserido na base de dados
				$file_name=$_FILES['foto']['name'];
				$file_type=$_FILES['foto']['type'];
				$file_size=$_FILES['foto']['size'];
				$file_tmp=$_FILES['foto']['tmp_name'];
				$data=base64_encode(file_get_contents($file_tmp));
				$query="UPDATE anunciopetsi set nome_foto='".$file_name."', tipo_foto='".$file_type."',
		tamanho_foto=$file_size, dados_foto='".$data."' where cod_anunciopetsi='".$cod_anunciopetsi."'";	
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
										<input type="text" name="localidade" id="localidade" value="" placeholder="Localidade, Distrito" maxlength="50" required="required" />
									</div>
									
									<div class="col-6 col-12-xsmall">
										<input type="text" name="contacto" id="contacto" value="" placeholder="Contacto" maxlength="9" required="required"/>
									</div>
									
									<!-- Break -->
									
									<div class="col-6 col-12-xsmall" >
										<input type="text" name="quantidade" id="quantidade" value="" placeholder="Quantidade de Animais que está disposto a adotar" required="required"/>
									</div>
									
									<div class="col-6 col-12-xsmall" >
										<input type="text" name="preferencia" id="preferencia" value="" placeholder="Preferências de Animais" />
									</div>
									
									<div class="col-12">
										<select name="disponibilidade" id="disponibilidade">
											<option value="">Disponibilidade</option>
											<option value="Temporária">Temporária</option>
											<option value="Definitiva">Definitiva</option>
											<option value="Temporária/Definitiva">Temporária/Definitiva</option>
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
								<div class="row gtr-uniform">
									<h3>Informações Importantes</h3>
									<div class="col-12">
										<textarea name="informacao" id="informacao" placeholder="Insira dados que os Utilizadores necessitem saber." rows="6"></textarea>
									</div>
									<!-- Break -->
									<br><div class="col-12">
										<ul class="actions">
											<li><input type="submit" name="anunciar" value="Enviar Anúncio" class="primary" /></li>
											<li><input type="reset" value="Apagar dados" /></li>
										</ul>
									</div>
								</div>
</form>
							
		<?php } ?>	