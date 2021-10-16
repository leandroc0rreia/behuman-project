<?php 

if(isset($_GET['destaque'])){
	
	if(($_GET['destaque'])==1) {
		if(isset($_GET['cod_anuncio'])) { 
			$cod_anuncio=$_GET['cod_anuncio'];
			$queryativo="update anuncioadoc set destaque=1 where cod_anuncio='".$_GET['cod_anuncio']."'";	
			$resultativo=mysqli_query($ligax,$queryativo);
		}
	}
	
	if(($_GET['destaque'])==0) {
		if(isset($_GET['cod_anuncio'])) {
			$cod_anuncio=$_GET['cod_anuncio'];
			$queryativo="update anuncioadoc set destaque=0 where cod_anuncio='".$_GET['cod_anuncio']."'";	
			$resultativo=mysqli_query($ligax,$queryativo);
		}
	}

} ?>

<section id="page-breadcrumb">

        <header class="major">
			<h1 class="title">Listagem de Destaques</h1>
        </header>
		
   </section>
   
		<header class="major">
			<h2>An&uacute;ncios Ado&ccedil;&atilde;o</h2>
		</header>

		<?php
		if (isset ($_GET['campo'])){ 
			$campo=$_GET['campo'];
		} else { 
			$campo="data_post";
		}
		if (isset ($_GET['ordem'])){ 
			$ordem=$_GET['ordem'];
		} else { 
			$ordem="asc";
		}
		if (isset($_POST['ok'])){
			$campo=$_POST['campo'];
			$ordem=$_POST['ordem'];
			//echo "o campo2 é $campo";
		?>
		<form name="ordena" method="POST" action="index.php?pagina=listar_utilizador">
		
		<table class="contentor" align="center" border="0">
		<tr>
			<td><select name="campo">
				<option value="data_post"<?php if ($campo=="data_post") echo"selected";?>>Data</option>
				<option value="email_utilizador"<?php if ($campo=="email_utilizador") echo"selected";?>>E-mail</option>
			</select>
			</td>
			<td>
			<select name="ordem">
				<option value="asc" <?php if ($ordem=="asc") echo "selected";?>>Crescente</option>
				<option value="desc"<?php if ($ordem=="desc") echo "selected";?>>Decrescente</option>
				
			</select>
			
			</td>
			
		</tr>
		
		</table>
		
		</form>
		
		<table class="alt" width="90%" align="center" border="0">
		<tr>
			<td class="td_titulo" width="30%" align="center">C&oacute;digo de An&uacute;ncio</td>
			<td class="td_titulo" width="25%" align="center">Data de Envio</td>
			<td class="td_titulo" width="25%" align="center">Email</td>
			<td class="td_titulo" width="25%" align="center">Telem&oacute;vel</td>
			<td class="td_titulo" width="25%" align="center">Estado</td>
			<td class="td_titulo" width="25%" align="center">Destaque</td>
		</tr>
		
		<?php
		$consulta="select * from anuncioadoc order by $campo $ordem";
		$result = mysqli_query($ligax,$consulta);
		if ($result) {
			$reg_pag=10; // N.º de registos a apresentar por página
			if(isset($_GET['pag'])){$pag=$_GET['pag'];} else {$pag=1;}
			$pag_ant=$pag-1;
			$pag_seg=$pag+1;
			$pag_ini=($reg_pag*$pag)-$reg_pag;
			$num_reg=mysqli_num_rows($result);
			if($num_reg <=$reg_pag) {
				$num_pag=1; 
			} else if (($num_reg % $reg_pag)==0) { 
				$num_pag=$num_reg/$reg_pag; 
			} else {
				$num_pag=$num_reg/$reg_pag + 1;
			}
			$consulta=$consulta." limit $pag_ini,$reg_pag"; //Vai à base de dados seleccionar os registos entre dois limites
			$result=mysqli_query($ligax,$consulta);
			?>
				
			<?php
			while($registo = mysqli_fetch_assoc($result)) { ?>
			<tr bgcolor='#FFFFFF'>
			<?php
				$cod_anuncio=$registo['cod_anuncio'];
				$contacto_anuncio=$registo['contacto_anuncio'];
				$email_utilizador=$registo['email_utilizador'];
				$destaque=$registo['destaque'];
				$data_post=$registo['data_post'];
				
				$destaque=$registo['destaque'];
				if($destaque==0) $a="ativo";
				if($destaque==1) $a="nao ativo"; ?>
			
				<td class='td_lista' align='center'><a href="index.php?pagina=sabermaisadoc&cod_anuncio=<?php echo $cod_anuncio; ?>"><?php echo $cod_anuncio; ?></a></td>
				<td class='td_lista' align='center'><?php echo $data_post; ?></td>
				<td class='td_lista' align='center'><?php echo $email_utilizador; ?></td>
				<td class='td_lista' align='center'><?php echo $contacto_anuncio; ?></td>
				<td class='td_lista' align='center'>
				
				<?php if($destaque==0)  { ?> <img src="images/success.png" alt="ativo"> <?php } ?>
				<?php if($destaque==1)  { ?> <img src="images/x-button.png" alt="n&atilde;o ativo"> <?php } ?>
				
				</td> 
				<td class='td_lista' colspan='2' align='center'><a href="index.php?pagina=listar_destaque&cod_anuncio=<?php echo $cod_anuncio; ?>#popup1" class='button primary fit'>Mudar</a></td>
				
			<input type="hidden" name="cod_anuncio" value="<?php echo $cod_anuncio; ?>"/>
			<div id="popup1" class="overlay">
				<div class="popup">
				<h2>Tem a certeza que quer mudar o estado do An&uacute;ncio?</h2>
				<a class="close" href="index.php?pagina=listar_destaque">&times;</a>
				<p>Aviso! A decis&atilde;o que tomar pode ser alterada!</p>
					<div class="content">
						<center><a href="index.php?pagina=listar_destaque&destaque=1&cod_anuncio=<?php echo $_GET['cod_anuncio']; ?>" class="button primary">Colocar nos Destaques</a>
						<br><br><a href="index.php?pagina=listar_destaque&destaque=0&cod_anuncio=<?php echo $_GET['cod_anuncio']; ?>" class="button primary">Retirar dos Destaques</a></center>
						
					</div>
				</div>
			</div>
		</tr>
			<?php
			}
			
			echo "<tr><td colspan=6 align=\"right\">";
			echo "<p> p&aacuteg. ";
			if(($pag_ant)&&($pag>1)){
				echo "<a href=\"index.php?pagina=listar_utilizadores&pag=$pag_ant&campo=$campo&ordem=$ordem\">Anterior</a> |";
			}
			for ($i=1;$i<=$num_pag;$i++) {
				if($i!=$pag) {
					echo " <a href=\"index.php?pagina=listar_utilizadores&pag=$i&campo=$campo&ordem=$ordem\">$i</a> |";
				} else {
					echo "$i | ";
				}	
			}	
			if ($pag+1<=$num_pag) {
				echo " <a href=\"index.php?pagina=listar_utilizadores&pag=$pag_seg&campo=$campo&ordem=$ordem\">Seguinte</a>";
			}
			echo "</td></tr>";
		}
		echo "</table>";?>
	<?php 
	} else {
				//echo "O campo é nome_utilizador";
		?>
		<form name="ordena" method="POST" action="index.php?pagina=listar_utilizador">
		
		<table class="contentor" align="center" border="0">
		<tr>
			<td><select name="campo">
				<option value="data_post"<?php if ($campo=="data_post") echo"selected";?>>Data</option>
				<option value="email_utilizador"<?php if ($campo=="email_utilizador") echo"selected";?>>E-mail</option>
			</select>
			</td>
			<td>
			<select name="ordem">
				<option value="asc" <?php if ($ordem=="asc") echo "selected";?>>Crescente</option>
				<option value="desc"<?php if ($ordem=="desc") echo "selected";?>>Decrescente</option>
				
			</select>
			
			</td>
			
		</tr>
		
		</table>
		
		</form>
		
		<table class="alt" width="90%" align="center" border="0">
		<tr>
			<td class="td_titulo" width="30%" align="center">C&oacute;digo de An&uacute;ncio</td>
			<td class="td_titulo" width="25%" align="center">Data de Envio</td>
			<td class="td_titulo" width="25%" align="center">Email</td>
			<td class="td_titulo" width="25%" align="center">Telem&oacute;vel</td>
			<td class="td_titulo" width="25%" align="center">Estado</td>
			<td class="td_titulo" width="25%" align="center">Destaque</td>
		</tr>
		
		<?php
		$consulta="select * from anuncioadoc order by $campo $ordem";
		$result = mysqli_query($ligax,$consulta);
		if ($result) {
			$reg_pag=10; // N.º de registos a apresentar por página
			if(isset($_GET['pag'])){$pag=$_GET['pag'];} else {$pag=1;}
			$pag_ant=$pag-1;
			$pag_seg=$pag+1;
			$pag_ini=($reg_pag*$pag)-$reg_pag;
			$num_reg=mysqli_num_rows($result);
			if($num_reg <=$reg_pag) {
				$num_pag=1; 
			} else if (($num_reg % $reg_pag)==0) { 
				$num_pag=$num_reg/$reg_pag; 
			} else {
				$num_pag=$num_reg/$reg_pag + 1;
			}
			$consulta=$consulta." limit $pag_ini,$reg_pag"; //Vai à base de dados seleccionar os registos entre dois limites
			$result=mysqli_query($ligax,$consulta);
			?>
				
			<?php
			while($registo = mysqli_fetch_assoc($result)) { ?>
			<tr bgcolor='#FFFFFF'>
			<?php
				$cod_anuncio=$registo['cod_anuncio'];
				$contacto_anuncio=$registo['contacto_anuncio'];
				$email_utilizador=$registo['email_utilizador'];
				$destaque=$registo['destaque'];
				$data_post=$registo['data_post'];
				
				$destaque=$registo['destaque'];
				if($destaque==0) $a="ativo";
				if($destaque==1) $a="nao ativo"; ?>
			
				<td class='td_lista' align='center'><a href="index.php?pagina=sabermaisadoc&cod_anuncio=<?php echo $cod_anuncio; ?>"><?php echo $cod_anuncio; ?></a></td>
				<td class='td_lista' align='center'><?php echo $data_post; ?></td>
				<td class='td_lista' align='center'><?php echo $email_utilizador; ?></td>
				<td class='td_lista' align='center'><?php echo $contacto_anuncio; ?></td>
				<td class='td_lista' align='center'>
				
				<?php if($destaque==0)  { ?> <img src="images/success.png" alt="Nao Destacado"> <?php } ?>
				<?php if($destaque==1)  { ?> <img src="images/crowns.png" alt="Destacado"> <?php } ?>
				
				</td>
				<td class='td_lista' colspan='2' align='center'><a href="index.php?pagina=listar_destaque&cod_anuncio=<?php echo $cod_anuncio; ?>#popup1" class='button primary fit'>Mudar</a></td>
				
			<input type="hidden" name="cod_anuncio" value="<?php echo $cod_anuncio; ?>"/>
			<div id="popup1" class="overlay">
				<div class="popup">
				<h2>Tem a certeza que quer mudar o estado do An&uacute;ncio?</h2>
				<a class="close" href="index.php?pagina=listar_destaque">&times;</a>
				<p>Aviso! A decis&atilde;o que tomar pode ser alterada!</p>
					<div class="content">
						<center><a href="index.php?pagina=listar_destaque&destaque=1&cod_anuncio=<?php echo $_GET['cod_anuncio']; ?>" class="button primary">Colocar nos Destaques</a>
						<br><br><a href="index.php?pagina=listar_destaque&destaque=0&cod_anuncio=<?php echo $_GET['cod_anuncio']; ?>" class="button primary">Retirar dos Destaques</a></center>
						
					</div>
				</div>
			</div>
		</tr>
			<?php
			}
			
			echo "<tr><td colspan=6 align=\"right\">";
			echo "<p> p&aacuteg. ";
			if(($pag_ant)&&($pag>1)){
				echo "<a href=\"index.php?pagina=listar_destaque&pag=$pag_ant&campo=$campo&ordem=$ordem\">Anterior</a> |";
			}
			for ($i=1;$i<=$num_pag;$i++) {
				if($i!=$pag) {
					echo " <a href=\"index.php?pagina=listar_destaque&pag=$i&campo=$campo&ordem=$ordem\">$i</a> |";
				} else {
					echo "$i | ";
				}	
			}	
			if ($pag+1<=$num_pag) {
				echo " <a href=\"index.php?pagina=listar_destaque&pag=$pag_seg&campo=$campo&ordem=$ordem\">Seguinte</a>";
			}
			echo "</td></tr>";
		}
		echo "</table>";?>
		
		<center><input align='center' class='button primary' type='submit' name='ok' value='Ok'></center>
		<?php } ?>