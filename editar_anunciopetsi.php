<div id="contents">
		<div id="contact" class="body">
			
			 <header class="major">
             
                
                   
                        
                            <h1 class="title">Editar Anúncio de Pet-Sitting</h1>
                        
                     
                
            
        </header>


<div class="box">
<?php
	if(isset($_POST['validar'])){
		
		$localidade_anunciopetsi=$_POST['localidade_anunciopetsi'];
		$contacto_anunciopetsi=$_POST['contacto_anunciopetsi'];
		$quantidade_anunciopetsi=$_POST['quantidade_anunciopetsi'];
		$preferencia_anunciopetsi=$_POST['preferencia_anunciopetsi'];
		$disponibilidade_anunciopetsi=$_POST['disponibilidade_anunciopetsi'];
		$dataini_anunciopetsi=$_POST['dataini_anunciopetsi'];
		$datafin_anunciopetsi=$_POST['datafin_anunciopetsi'];
		$informacao_anunciopetsi=$_POST['informacao_anunciopetsi'];
		
		
		$query="UPDATE anunciopetsi SET
		localidade_anunciopetsi='".$localidade_anunciopetsi."',
		contacto_anunciopetsi='".$contacto_anunciopetsi."',
		quantidade_anunciopetsi='".$quantidade_anunciopetsi."',
		preferencia_anunciopetsi='".$preferencia_anunciopetsi."',
		disponibilidade_anunciopetsi='".$disponibilidade_anunciopetsi."',
		dataini_anunciopetsi='".$dataini_anunciopetsi."',
		datafin_anunciopetsi='".$datafin_anunciopetsi."',
		informacao_anunciopetsi='".$informacao_anunciopetsi."'
		
		where cod_anunciopetsi='".$_GET['cod_anunciopetsi']."'";
		
		if($_FILES['foto']['error']==0){
				$file_id=mysqli_insert_id($ligax);//ultimo registo inserido na base de dados
				$file_name=$_FILES['foto']['name'];
				$file_type=$_FILES['foto']['type'];
				$file_size=$_FILES['foto']['size'];
				$file_tmp=$_FILES['foto']['tmp_name'];
				$data=base64_encode(file_get_contents($file_tmp));
				$query="update anunciopetsi set nome_foto='".$file_name."',tipo_foto='".$file_type."',
		tamanho_foto=$file_size,dados_foto='".$data."' where cod_anunciopetsi='".$_GET['cod_anunciopetsi']."'";	
				$result_up=mysqli_query($ligax,$query);
			}

			$result=mysqli_query($ligax,$query);
		
			if($result==1){
				echo "<p><center>Dados inseridos corretamente!</center></p>";
				?>
				<a href="index.php"><button href="" class="button primary fit">Voltar aos Menu Principal</button></a>
				<?php
			} else {
				echo "<p>Dados n&atilde;o inseridos!</p>";
			}
		} else {	
			$procura="select * from anunciopetsi where cod_anunciopetsi='".$_GET['cod_anunciopetsi']."'";
			$result=mysqli_query($ligax,$procura);
			$nregistos=mysqli_num_rows($result);
			$registo=mysqli_fetch_assoc($result);
			if($nregistos==1){
				$cod_anunciopetsi=$registo['cod_anunciopetsi'];
				$email_utilizador=$registo['email_utilizador'];
				$localidade_anunciopetsi=$registo['localidade_anunciopetsi'];
				$contacto_anunciopetsi=$registo['contacto_anunciopetsi'];
				$quantidade_anunciopetsi=$registo['quantidade_anunciopetsi'];
				$preferencia_anunciopetsi=$registo['preferencia_anunciopetsi'];
				$disponibilidade_anunciopetsi=$registo['disponibilidade_anunciopetsi'];
				$dataini_anunciopetsi=$registo['dataini_anunciopetsi'];
				$datafin_anunciopetsi=$registo['datafin_anunciopetsi'];
				$informacao_anunciopetsi=$registo['informacao_anunciopetsi'];
				$tamanho_foto=$registo['tamanho_foto'];
			}
		?>
		
		<?php if($tamanho_foto==0){ ?>
											<span class="image main"><img src="semfoto.png" alt="" /></span>
										<?php } else { ?>
											<center><span class="image main"><img src="showfile_fotoanunciopetsi.php?cod_anuncio=<?php echo $cod_anunciopetsi;?>" alt="" /></span></center>
											<?php }  ?>
		<form name="" action="" method="post" enctype="multipart/form-data">
		
		<table align="center">
		<tr>
			<td class="td_form">Localidade:</td>
			<td class="td_input_form"><input  type="text" name="localidade_anunciopetsi" size="40" value="<?php echo $localidade_anunciopetsi ?>" required="required"/></td>
		</tr>
		<tr>
			<td class="td_form">Contacto:</td>
			<td class="td_input_form"><input  type="text" name="contacto_anunciopetsi" size="40" maxlength="12" value="<?php echo $contacto_anunciopetsi?>" required="required"/></td>
		</tr>   
		<tr>
			<td class="td_form">Quantidade:</td>
			<td class="td_input_form"><input  type="text" name="quantidade_anunciopetsi" size="40" maxlength="2" value="<?php echo $quantidade_anunciopetsi?>" required="required"/></td>
		</tr>
		<tr>
			<td class="td_form">Preferência de Animal:</td>
			<td class="td_input_form"><input  type="text" name="preferencia_anunciopetsi" size="40" value="<?php echo $preferencia_anunciopetsi ?>" required="required"/></td>
		</tr>
		<tr>
			<td class="td_form">Disponibilidade:</td>
			<td class="td_input_form"><div class="col-12">
										<select name="disponibilidade_anunciopetsi" id="disponibilidade_anunciopetsi">
											<option value="">Disponibilidade</option>
											<option value="Temporária">Temporária</option>
											<option value="Definitiva">Definitiva</option>
											<option value="Temporária/Definitiva">Temporária/Definitiva</option>
										</select>
									</div></td>
		</tr>
		
		<tr>
			<td class="td_form">De:</td>
			<td class="td_input_form"><input  type="date" name="dataini_anunciopetsi" size="40" maxlength="10" value="<?php echo $dataini_anunciopetsi ?>"/></td>
		</tr>
		<tr>
			<td class="td_form">Até:</td>
			<td class="td_input_form"><input  type="date" name="datafin_anunciopetsi" size="40" maxlength="10" value="<?php echo $datafin_anunciopetsi ?>"/></td>
		</tr>
		<tr>
			
				<td class="td_form">Foto</td>
                <td class="td_input_form"><input type="file" name="foto" id="foto"  /></td>
			
        </tr>
		
		<tr>
			<td class="td_form">Descrição:</td>
			<td class="td_input_form"><textarea  cols="50" type="text" name="informacao_anunciopetsi"><?php echo $informacao_anunciopetsi ?></textarea></td>
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
						<center><a href="index.php?pagina=meusanunciopetsi&ativo=1&cod_anunciopetsi=<?php echo $cod_anunciopetsi ?>" class="button primary">Sim</a>
						<a href="index.php?pagina=editar_anunciopetsi&cod_anunciopetsi=<?php echo $cod_anunciopetsi ?>" class="button primary">Não</a></center>
						
					</div>
				</div>
			</div>
		</tr>
		</table>
		</form>
		<a href="index.php?pagina=meusanunciopetsi"><button href="" class="button primary fit">Voltar aos Meus Anúncios de Adoção</button></a>
		<?php
		}
?>
		</div>
</div>

</div>
		
			<?php
			
			