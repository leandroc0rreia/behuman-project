<div id="contents">
		<div id="contact" class="body">
			
			 <header class="major">
             
                
                   
                        
                            <h1 class="title">Editar Utilizador</h1>
                        
                     
                
            
        </header>


<div class="box">
<?php
	if(isset($_POST['validar'])){
		
		$ativo=$_POST['ativo'];
		
		

			
			$alterar="UPDATE utilizador SET ativo='".$ativo."' where email_utilizador='".$_GET['email_utilizador']."'";
			$result=mysqli_query($ligax,$alterar);
		
			if($result==1){
				echo "<p><center>Ativo: $ativo</center></p>";
				?>
				<a href="index.php?pagina=listar_utilizadores"><button href="" class="button primary fit">Voltar ao Listar Utilizadores</button></a>
				<?php
			} else {
				echo "<p>Dados n&atilde;o inseridos!</p>";
			}
		} else {	
			$procura="select * from utilizador where email_utilizador='".$_GET['email_utilizador']."'";
			$result=mysqli_query($ligax,$procura);
			$nregistos=mysqli_num_rows($result);
			$registo=mysqli_fetch_assoc($result);
			if($nregistos==1){
				$ativo=$registo["ativo"];
				$cod_utilizador=$registo["cod_utilizador"];
				$nome_utilizador=$registo["nome_utilizador"];
				$email_utilizador=$registo['email_utilizador'];
				$datanasc_utilizador=$registo['datanasc_utilizador'];
				$morada_utilizador=$registo['morada_utilizador'];
				$telemovel_utilizador=$registo['telemovel_utilizador'];
				$genero_utilizador=$registo['genero_utilizador'];
				$codpost_utilizador=$registo['codpost_utilizador'];
			}
		?>
		<form name="" action="" method="post" enctype="multipart/form-data">
		
		<table align="center">
		<tr>
			<td class="td_form">Ativo:</td>
			<td class="td_input_form"><input  type="text" name="ativo" size="40" maxlength="1" value="<?php echo $ativo ?>"/></td>
		</tr>
		<tr>
			<td class="td_form">Nome:</td>
			<td class="td_input_form"><input  type="text" name="nome_utilizador" size="40" value=" <?php echo $nome_utilizador?>" disabled /></td>
		</tr>   
		<tr>
			<td class="td_form">E-mail:</td>
			<td class="td_input_form"><input type="text" name="email_utilizador" size="40"  value="<?php echo $_GET['email_utilizador'];?>" disabled /></td>
		</tr>
		<tr>
			<td class="td_form">Telem&oacute;vel:</td>
			<td class="td_input_form"><input  type="text" name="telemovel_utilizador" size="40" value=" <?php echo $telemovel_utilizador?>"  disabled /></td>
		</tr>
		<tr>
			<td class="td_form">Data de Nascimento:</td>
			<td class="td_input_form"><input type="text" name="datanasc_utilizador" size="40"  value="<?php echo $datanasc_utilizador ?>" disabled /></td>
		</tr>
		<tr>
			<td class="td_form">Morada:</td>
			<td class="td_input_form"><input  type="text" name="morada_utilizador" size="40" value=" <?php echo $morada_utilizador?>" disabled  /></td>
		</tr>
		<tr>
			<td class="td_form">G&eacute;nero:</td>
			<td class="td_input_form"><input  type="text" name="genero_utilizador" size="40" value=" <?php echo $genero_utilizador?>" disabled /></td>
		</tr>
		<tr>
			<td class="td_form">C&oacute;digo-Postal:</td>
			<td class="td_input_form"><input  type="text" name="codpost_utilizador" size="40" value=" <?php echo $codpost_utilizador?>" disabled /></td>
		</tr>
		
			
		

		<tr>
			
			<td colspan="2" align="center"><input class="button primary fit" type="submit" name="validar" value="Alterar"/></td>
		</tr>
		</table>
		</form>
		<a href="index.php?pagina=listar_utilizadores"><button href="" class="button primary fit">Voltar ao Listar Utilizadores</button></a>
		<?php
		}
?>
		</div>
</div>

</div>
		
			<?php
			
			