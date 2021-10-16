<div id="contents">
		<div id="contact" class="body">
			
			 <header class="major">
             
                
                   
                        
                            <h1 class="title">Editar Anúncio de Abandono</h1>
                        
                     
                
            
        </header>


<div class="box">
<?php

				
	
	if(isset($_POST['validar'])){
		
		$localidade_anuncioaband=$_POST['localidade_anuncioaband'];
		$contacto_anuncioaband=$_POST['contacto_anuncioaband'];
		$tipo_animal=$_POST['tipo_animal'];
		$raca_animal=$_POST['raca_animal'];
		$genero_animal=$_POST['genero_animal'];
		$descricao_anuncioaband=$_POST['descricao_anuncioaband'];
		
		
		$query1="UPDATE anuncioaband SET
		localidade_anuncioaband='".$localidade_anuncioaband."',
		contacto_anuncioaband='".$contacto_anuncioaband."',
		tipo_animal='".$tipo_animal."',
		raca_animal='".$raca_animal."',
		genero_animal='".$genero_animal."',
		descricao_anuncioaband='".$descricao_anuncioaband."'
		
		where cod_anuncioaband='".$_GET['cod_anuncioaband']."'";
			$result=mysqli_query($ligax,$query1);
		if($_FILES['foto']['error']==0){
				$file_id=mysqli_insert_id($ligax);//ultimo registo inserido na base de dados
				$file_name=$_FILES['foto']['name'];
				$file_type=$_FILES['foto']['type'];
				$file_size=$_FILES['foto']['size'];
				$file_tmp=$_FILES['foto']['tmp_name'];
				$data=base64_encode(file_get_contents($file_tmp));
				$query2="update anuncioaband set nome_foto='".$file_name."',tipo_foto='".$file_type."',
		tamanho_foto=$file_size,dados_foto='".$data."' where cod_anuncioaband='".$_GET['cod_anuncioaband']."'";	
				$result_up=mysqli_query($ligax,$query2);
			}

		
		
			if($result==1){
				echo "<p><center>Dados inseridos corretamente!</center></p>";
				?>
				<a href="index.php"><button href="" class="button primary fit">Voltar aos Menu Principal</button></a>
				<?php
			} else {
				echo "<p>Dados n&atilde;o inseridos!</p>";
			}
		} else {	
			$procura="select * from anuncioaband where cod_anuncioaband='".$_GET['cod_anuncioaband']."'";
			$result=mysqli_query($ligax,$procura);
			$nregistos=mysqli_num_rows($result);
			$registo=mysqli_fetch_assoc($result);
			if($nregistos==1){
				$cod_anuncioaband=$registo['cod_anuncioaband'];
				$email_utilizador=$registo['email_utilizador'];
				$localidade_anuncioaband=$registo['localidade_anuncioaband'];
				$contacto_anuncioaband=$registo['contacto_anuncioaband'];
				$raca_animal=$registo['raca_animal'];
				$genero_animal=$registo['genero_animal'];
				$descricao_anuncioaband=$registo['descricao_anuncioaband'];
				$tipo_animal=$registo['tipo_animal'];
				$tamanho_foto=$registo['tamanho_foto'];
			}
		?>
		
		<?php if($tamanho_foto==0){ ?>
											<span class="image main"><img src="semfoto.png" alt="" /></span>
										<?php } else { ?>
											<center><span class="image main"><img src="showfile_fotoanuncioaband.php?cod_anuncioaband=<?php echo $cod_anuncioaband;?>" alt="" /></span></center>
											<?php }  ?>
		<form name="" action="" method="post" enctype="multipart/form-data">
		
		<table align="center">
		<tr>
			<td class="td_form">Localidade:</td>
			<td class="td_input_form"><input  type="text" name="localidade_anuncioaband" size="40" value="<?php echo $localidade_anuncioaband ?>" required="required"/></td>
		</tr>
		<tr>
			<td class="td_form">Contacto:</td>
			<td class="td_input_form"><input  type="text" name="contacto_anuncioaband" size="40" maxlength="12" value="<?php echo $contacto_anuncioaband?>" required="required"/></td>
		</tr>
		<tr>
			<td class="td_form">Tipo de Animal:</td>
			<td class="td_input_form"><input  type="text" name="tipo_animal" size="40" value="<?php echo $tipo_animal?>" required="required"/></td>
		</tr>
		<tr>
			<td class="td_form">Raça do Animal:</td>
			<td class="td_input_form"><input  type="text" name="raca_animal" size="40" value="<?php echo $raca_animal?>" required="required"/></td>
		</tr>
		<tr>
			<td class="td_form">Sexo:</td>
			<td class="td_input_form"><div class="col-12">
								<select name="genero_animal" id="genero_animal">
									<option value="N/A">Género do Animal</option>
									<option value="M">Masculino</option>
									<option value="F">Feminino</option>
									<option value="N">Não atribuir</option>
								</select>
							</div></td>
		</tr>
		<tr>
			
				<td class="td_form">Foto</td>
                <td class="td_input_form"><input type="file" name="foto" id="foto"  /></td>
			
        </tr>
		<tr>
			<td class="td_form">Descrição:</td>
			<td class="td_input_form"><textarea  cols="50" type="text" name="descricao_anuncioaband"><?php echo $descricao_anuncioaband ?></textarea></td>
		</tr>
		
		<tr>
			<td colspan="2" align="center"><input class="button primary fit" type="submit" name="validar" value="Alterar"/></td>
		</tr>
		
		<tr>
			<td colspan="2" align="center"><a href="#popup1" class="button primary fit">Eliminar Anúncio</a></td>
			<div id="popup1" class="overlay">
				<div class="popup">
				<h2>Tem a certeza que quer eliminar o Anúncio?</h2>
				<a class="close" href="">&times;</a>
				<p>Aviso! A decisão que tomar é irreversível.</p>
					<div class="content">
						<center><a href="index.php?pagina=meusanuncioaband&ativo=1&cod_anuncioaband=<?php echo $cod_anuncioaband ?>" class="button primary">Sim</a>
						<a href="index.php?pagina=editar_anuncioaband&cod_anuncioaband=<?php echo $cod_anuncioaband ?>" class="button primary">Não</a></center>
						
					</div>
				</div>
			</div>
		</tr>
		
		</table>
		
		</form>
		<a href="index.php?pagina=meusanuncioaband"><button href="" class="button primary fit">Voltar aos Meus Anúncios de Adoção</button></a>
		<?php
		}
?>
		</div>
</div>

</div>
		
			<?php
			
			