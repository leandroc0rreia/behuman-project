<div id="contents">
		<div id="contact" class="body">
			
			 <header class="major">
             
                
                   
                        
                            <h1 class="title">Editar Anúncio de Adoção</h1>
                        
                     
                
            
        </header>


<div class="box">
<?php
	if(isset($_POST['validar'])){
		
		$localidade_anuncio=$_POST['localidade_anuncio'];
		$contacto_anuncio=$_POST['contacto_anuncio'];
		$tipo_adocao=$_POST['tipo_adocao'];
		$nome_animal=$_POST['nome_animal'];
		$idade_animal=$_POST['idade_animal'];
		$tipo_animal=$_POST['tipo_animal'];
		$raca_animal=$_POST['raca_animal'];
		$genero_animal=$_POST['genero_animal'];
		$dataini_anuncio=$_POST['dataini_anuncio'];
		$datafin_anuncio=$_POST['datafin_anuncio'];
		$descricao_anuncio=$_POST['descricao_anuncio'];
		
		
		$query="UPDATE anuncioadoc SET
		localidade_anuncio='".$localidade_anuncio."',
		contacto_anuncio='".$contacto_anuncio."',
		tipo_adocao='".$tipo_adocao."',
		nome_animal='".$nome_animal."',
		idade_animal='".$idade_animal."',
		tipo_animal='".$tipo_animal."',
		raca_animal='".$raca_animal."',
		genero_animal='".$genero_animal."',
		dataini_anuncio='".$dataini_anuncio."',
		datafin_anuncio='".$datafin_anuncio."',
		descricao_anuncio='".$descricao_anuncio."'
		
		where cod_anuncio='".$_GET['cod_anuncio']."'";
		
		if($_FILES['foto']['error']==0){
				$file_id=mysqli_insert_id($ligax);//ultimo registo inserido na base de dados
				$file_name=$_FILES['foto']['name'];
				$file_type=$_FILES['foto']['type'];
				$file_size=$_FILES['foto']['size'];
				$file_tmp=$_FILES['foto']['tmp_name'];
				$data=base64_encode(file_get_contents($file_tmp));
				$query="update anuncioadoc set nome_foto='".$file_name."',tipo_foto='".$file_type."',
		tamanho_foto=$file_size,dados_foto='".$data."' where cod_anuncio='".$_GET['cod_anuncio']."'";	
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
			$procura="select * from anuncioadoc where cod_anuncio='".$_GET['cod_anuncio']."'";
			$result=mysqli_query($ligax,$procura);
			$nregistos=mysqli_num_rows($result);
			$registo=mysqli_fetch_assoc($result);
			if($nregistos==1){
				$cod_anuncio=$registo['cod_anuncio'];
				$email_utilizador=$registo['email_utilizador'];
				$localidade_anuncio=$registo['localidade_anuncio'];
				$contacto_anuncio=$registo['contacto_anuncio'];
				$tipo_adocao=$registo['tipo_adocao'];
				$nome_animal=$registo['nome_animal'];
				$idade_animal=$registo['idade_animal'];
				$tipo_animal=$registo['tipo_animal'];
				$raca_animal=$registo['raca_animal'];
				$genero_animal=$registo['genero_animal'];
				$dataini_anuncio=$registo['dataini_anuncio'];
				$datafin_anuncio=$registo['datafin_anuncio'];
				$descricao_anuncio=$registo['descricao_anuncio'];
				$tamanho_foto=$registo['tamanho_foto'];
			}
		?>
		
		<?php if($tamanho_foto==0){ ?>
											<span class="image main"><img src="semfoto.png" alt="" /></span>
										<?php } else { ?>
											<center><span class="image main"><img src="showfile_fotoanuncioadoc.php?cod_anuncio=<?php echo $cod_anuncio;?>" alt="" /></span></center>
											<?php }  ?>
		<form name="" action="" method="post" enctype="multipart/form-data">
		
		<table align="center">
		<tr>
			<td class="td_form">Localidade:</td>
			<td class="td_input_form"><input  type="text" name="localidade_anuncio" size="40" value="<?php echo $localidade_anuncio ?>" required="required"/></td>
		</tr>
		<tr>
			<td class="td_form">Contacto:</td>
			<td class="td_input_form"><input  type="text" name="contacto_anuncio" size="40" maxlength="12" value="<?php echo $contacto_anuncio?>" required="required"/></td>
		</tr>   
		<tr>
			<td class="td_form">Tipo de Adoção:</td>
			<td class="td_input_form"><div class="col-12">
																<select name="tipo_adocao" id="tipo_adocao">
																	<option value="N/A">Tipo de Adoção</option>
																	<option value="Temporária">Temporária</option>
																	<option value="Definitiva">Definitiva</option>
																</select></td>
		</tr>
		<tr>
			<td class="td_form">Nome do Animal:</td>
			<td class="td_input_form"><input  type="text" name="nome_animal" size="40" value="<?php echo $nome_animal ?>" required="required"/></td>
		</tr>
		<tr>
			<td class="td_form">Idade do Animal:</td>
			<td class="td_input_form"><input type="text" name="idade_animal" size="40" maxlength="2" value="<?php echo $idade_animal ?>"/></td>
		</tr>
		<tr>
			<td class="td_form">Tipo de Animal:</td>
			<td class="td_input_form"><input  type="text" name="tipo_animal" size="40" value="<?php echo $tipo_animal ?>"/></td>
		</tr>
		<tr>
			<td class="td_form">Raça:</td>
			<td class="td_input_form"><input  type="text" name="raca_animal" size="40" value="<?php echo $raca_animal?>"/></td>
		</tr>
		<tr>
			<td class="td_form">Sexo:</td>
			<td class="td_input_form"><div class="col-12">
																<select name="genero_animal" id="genero_animal">
																	<option value="N">Género do Animal</option>
																	<option value="M">Masculino</option>
																	<option value="F">Feminino</option>
																	<option value="N">Não atribuir</option>
																</select>
															</div></td>
		</tr>
		<tr>
			<td class="td_form">De:</td>
			<td class="td_input_form"><input  type="date" name="dataini_anuncio" size="40" maxlength="10" value="<?php echo $dataini_anuncio ?>"/></td>
		</tr>
		<tr>
			<td class="td_form">Até:</td>
			<td class="td_input_form"><input  type="date" name="datafin_anuncio" size="40" maxlength="10" value="<?php echo $datafin_anuncio ?>"/></td>
		</tr>
		<tr>
			
				<td class="td_form">Foto</td>
                <td class="td_input_form"><input type="file" name="foto" id="foto"  /></td>
			
        </tr>
		
		<tr>
			<td class="td_form">Descrição:</td>
			<td class="td_input_form"><textarea  cols="50" type="text" name="descricao_anuncio"><?php echo $descricao_anuncio ?></textarea></td>
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
						<center><a href="index.php?pagina=meusanuncioadoc&ativo=1&cod_anuncio=<?php echo $cod_anuncio ?>" class="button primary">Sim</a>
						<a href="index.php?pagina=editar_anuncioadoc&cod_anuncio=<?php echo $cod_anuncio ?>" class="button primary">Não</a></center>
						
					</div>
				</div>
			</div>
		</tr>
		</table>
		</form>
		<a href="index.php?pagina=meusanuncioadoc"><button href="" class="button primary fit">Voltar aos Meus Anúncios de Adoção</button></a>
		<?php
		}
?>
		</div>
</div>

</div>
		
			<?php
			
			