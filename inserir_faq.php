			<header class="major">
										<h1>Inserir FAQ</h1>
			
</header>
<?php
	if(isset($_POST['anunciar'])){
		$flag=false;
		

		$pergunta_faq=$_POST['pergunta_faq'];
		$resposta_faq=$_POST['resposta_faq'];
	
		/* Existiu um erro */
		if($flag==true){ 
		
		?>
		<form method="post" action="" enctype="multipart/form-data">
			<div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall">
									<input type="text" name="pergunta_faq" id="pergunta_faq" value="" placeholder="Pergunta" required="required" />
								</div>
			</div><br>
			<div class="row gtr-uniform">				
							<div class="col-6 col-12-xsmall">
									<textarea type="text" name="resposta_faq" id="resposta_faq" value="" placeholder="Resposta" required="required">  </textarea>
							</div>
														
							
			</div><br>
			<div class="row gtr-uniform">
							<div class="col-12">
									<ul class="actions">
										<li><input type="submit" name="anunciar" value="Inserir FAQ" class="primary" /></li>
										<li><input type="reset" value="Apagar dados" /></li>
									</ul>
							</div>
				</div>			
		</form>
						<?php } else { 
		
		$insere="INSERT INTO faq (pergunta_faq, resposta_faq) 
		VALUES ('".$pergunta_faq."','".$resposta_faq."')";
			
			$result=mysqli_query($ligax,$insere);

			
			
			$cod_faq=mysqli_insert_id($ligax);  
				
			if($result==1){
		
				echo"<p>Anúncio inserido com sucesso.</p>";
			?>	
				
			<br>
			 
			<a href="index.php?pagina=faq" class="button primary large">Voltar a Inserir FAQ</a>
			
			
			<?php
			} else {
				echo "<p>Dados não inseridos!</p>";?>
				<br>
			
			<a href="index.php?pagina=faq" class="button primary large">Voltar a Inserir FAQ</a>
			
				<?php
			}
		}
	} else {
		?>
		<form method="post" action="" enctype="multipart/form-data">
			<div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall"><br>
									<input type="text" name="pergunta_faq" id="pergunta_faq" value="" placeholder="Pergunta" required="required"/>
								</div>
			</div><br>
			<div class="row gtr-uniform">				
							<div class="col-6 col-12-xsmall">
									<textarea type="text" name="resposta_faq" id="resposta_faq" value="" placeholder="Resposta" required="required"></textarea>
							</div>
														
							
			</div><br><br>
			<div class="row gtr-uniform">
							<div class="col-12">
									<ul class="actions">
										<li><input type="submit" name="anunciar" value="Inserir FAQ" class="primary" /></li>
										<li><input type="reset" value="Apagar dados" /></li>
									</ul>
							</div>
				</div>			
		</form>
<?php } ?>	