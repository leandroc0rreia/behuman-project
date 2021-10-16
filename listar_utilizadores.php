<?php 

if(isset($_GET['ativo'])){
	
	if(($_GET['ativo'])==1) {
		if(isset($_GET['cod_utilizador'])) { 
			$cod_utilizador=$_GET['cod_utilizador'];
			$queryativo="update utilizador set ativo=1 where cod_utilizador='".$_GET['cod_utilizador']."'";	
			$resultativo=mysqli_query($ligax,$queryativo);
		}
	}
	
	if(($_GET['ativo'])==0) {
		if(isset($_GET['cod_utilizador'])) {
			$cod_utilizador=$_GET['cod_utilizador'];
			$queryativo="update utilizador set ativo=0 where cod_utilizador='".$_GET['cod_utilizador']."'";	
			$resultativo=mysqli_query($ligax,$queryativo);
		}
	}

} ?>
<section id="page-breadcrumb">
        <header class="major">

                            <h1 class="title">Listagem de Utilizador</h1>

        </header>
   </section>


		<?php
		if (isset ($_POST['pesquisa'])){ 
			$nome=$_POST['nome'];
		
			//echo "o campo2 é $campo";
		?>
		<form name="ordena" method="POST" action="index.php?pagina=listar_utilizadores">
		<!-- Search -->
		<table class="contentor" align="center" border="0">
		<tr>
			<td>
				<section id="search" class="alt">
					<form method="post" action="#">
						
						<input type="text" name="nome" placeholder="Pesquisa"/><br>
						<center><input align='center' class='button primary' type='submit' name='pesquisa' value='Ok'><img src="magnifer.png" alt="" /></input></center>
					</form>
					
				</section>

			</td>
			
		</tr>
		
		</table>
		
		</form>
		
		<table class="alt" width="90%" align="center" border="0">
		<tr>
			<td class="td_titulo" width="30%" align="center">Nome</td>
			<td class="td_titulo" width="25%" align="center">Email</td>
			<td class="td_titulo" width="25%" align="center">Telem&oacute;vel</td>
			<td class="td_titulo" width="25%" align="center">Estado</td>
			<td class="td_titulo" width="25%" align="center">Ativo/Desativado</td>
		</tr>
		
		
		<?php
		$consulta="select * from utilizador where nome_utilizador like '$nome%' order by nome_utilizador";
		//echo $consulta;
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
			while($registo = mysqli_fetch_assoc($result)) {
				$cod_utilizador=$registo['cod_utilizador'];
				$nome_utilizador=$registo['nome_utilizador'];
				$email_utilizador=$registo['email_utilizador'];
				$telemovel_utilizador=$registo['telemovel_utilizador'];
				$ativo=$registo['ativo'];
				if($ativo==0) $a="ativo";
				if($ativo==1) $a="n&atilde;o ativo"; ?>
	
			<tr bgcolor='#FFFFFF'>
				<td class='td_lista' align='center'><?php echo $nome_utilizador; ?></td>
				<td class='td_lista' align='center'><a href="visualizar_perfil_utilizador.php?email_utilizador=<?php echo $email_utilizador; ?>"><?php echo $email_utilizador; ?></a></td>
				<td class='td_lista' align='center'><?php echo $telemovel_utilizador; ?></td>
				<td class='td_lista' align='center'>
				<?php if($ativo==0)  { ?> <img src="images/success.png" alt="ativo"> <?php } ?>
				<?php if($ativo==1)  { ?> <img src="images/x-button.png" alt="n&atilde;o ativo"> <?php } ?>
				</td>
				<td class='td_lista' colspan='2' align='center'><a href='index.php?pagina=listar_utilizadores&cod_utilizador=<?php echo $cod_utilizador;?>#popup1' class='button primary fit'>Mudar</a></td>
				</tr>
			<input type="hidden" name="cod_utilizador" value="<?php echo $cod_utilizador; ?>"/>
			<div id="popup1" class="overlay">
				<div class="popup">
				<h2>Tem a certeza que quer mudar o estado do Utilizador?</h2>
				<a class="close" href="index.php?pagina=listar_utilizadores">&times;</a>
				<p>Aviso! A decis&atilde;o que tomar pode ser alterada!</p>
					<div class="content">
						<center><a href="index.php?pagina=listar_destaque&ativo=0&cod_utilizador=<?php echo $_GET['cod_utilizador']; ?>" class="button primary">Colocar o Utilizador Ativo</a>
						<br><br><a href="index.php?pagina=listar_destaque&ativo=1&cod_utilizador=<?php echo $_GET['cod_utilizador']; ?>" class="button primary">Desativar Utilizador</a>
						</center>
					</div>
				</div>
			</div>
		</tr>
		<?php
			}
			echo "<tr><td colspan=4 align=\"right\">";
			echo "<p> p&aacuteg. ";
			if(($pag_ant)&&($pag>1)){
				echo "<a href=\"index.php?pagina=listar_utilizadores&pag=$pag_ant\">Anterior</a> |";
			}
			for ($i=1;$i<=$num_pag;$i++) {
				if($i!=$pag) {
					echo " <a href=\"index.php?pagina=listar_utilizadores&pag=$i\">$i</a> |";
				} else {
					echo "$i | ";
				}	
			}	
			if ($pag+1<=$num_pag) {
				echo " <a href=\"index.php?pagina=listar_utilizadores&pag=$pag_seg\">Seguinte</a>";
			}
			echo "</td></tr>";
		}
		echo "</table>";?>
	<?php 
	} else {
				//echo "Não foi feita pesquisa - aparece tudo";
		?>
		<form name="ordena" method="POST" action="index.php?pagina=listar_utilizadores">
		<!-- Search -->
		<table class="contentor" align="center" border="0">
		<tr>
			<td>
				<section id="search" class="alt">
					<form method="post" action="#">
						
						<input type="text" name="nome" placeholder="Pesquisa"/><br>
						<center><input align='center' class='button primary' type='submit' name='pesquisa' value='Ok'><img src="magnifer.png" alt="" /></input></center>
					</form>
					
				</section>

			</td>
			
		</tr>
		
		</table>
		
		</form>
		
		<table class="alt" width="90%" align="center" border="0">
		<tr>
			<td class="td_titulo" width="30%" align="center">Nome</td>
			<td class="td_titulo" width="25%" align="center">Email</td>
			<td class="td_titulo" width="25%" align="center">Telem&oacute;vel</td>
			<td class="td_titulo" width="25%" align="center">Estado</td>
			<td class="td_titulo" width="25%" align="center">Ativo/Desativado</td>
		</tr>
		
		<?php
		$consulta="select * from utilizador order by nome_utilizador asc";
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
			while($registo = mysqli_fetch_assoc($result)) {
				$cod_utilizador=$registo['cod_utilizador'];
				$nome_utilizador=$registo['nome_utilizador'];
				
				$email_utilizador=$registo['email_utilizador'];
				$telemovel_utilizador=$registo['telemovel_utilizador'];
				
				$ativo=$registo['ativo'];
				if($ativo==0) $a="ativo";
				if($ativo==1) $a="não ativo"; ?>
				<tr bgcolor='#FFFFFF'>
				<td class='td_lista' align='center'><?php echo $nome_utilizador; ?></td>
				<td class='td_lista' align='center'><a href="visualizar_perfil_utilizador.php?email_utilizador=<?php echo $email_utilizador; ?>"><?php echo $email_utilizador; ?></a></td>
				<td class='td_lista' align='center'><?php echo $telemovel_utilizador; ?></td>
				<td class='td_lista' align='center'>
				<?php if($ativo==0)  { ?> <img src="images/success.png" alt="ativo"> <?php } ?>
				<?php if($ativo==1)  { ?> <img src="images/x-button.png" alt="n&atilde;o ativo"> <?php } ?>
				</td>
				<td class='td_lista' colspan='2' align='center'><a href='index.php?pagina=listar_utilizadores&cod_utilizador=<?php echo $cod_utilizador;?>#popup1' class='button primary fit'>Mudar</a></td>
				</tr>
			<input type="hidden" name="cod_utilizador" value="<?php echo $cod_utilizador; ?>"/>
			<div id="popup1" class="overlay">
				<div class="popup">
				<h2>Tem a certeza que quer mudar o estado do Utilizador?</h2>
				<a class="close" href="index.php?pagina=listar_utilizadores">&times;</a>
				<p>Aviso! A decis&atilde;o que tomar pode ser alterada!</p>
					<div class="content">
						<center><a href="index.php?pagina=listar_utilizadores&ativo=0&cod_utilizador=<?php echo $_GET['cod_utilizador']; ?>" class="button primary">Colocar o Utilizador Ativo</a>
						<br><br><a href="index.php?pagina=listar_utilizadores&ativo=1&cod_utilizador=<?php echo $_GET['cod_utilizador']; ?>" class="button primary">Desativar Utilizador</a>
						</center>
					</div>
				</div>
			</div>
		</tr>
			<?php
				
			}
			echo "<tr><td colspan=5 align=\"right\">";
			
			echo "<p> p&aacuteg. ";
			
			if(($pag_ant)&&($pag>1)){
				echo "<a href=\"index.php?pagina=listar_utilizadores&pag=$pag_ant\">Anterior</a> |";
			}
			for ($i=1;$i<=$num_pag;$i++) {
				if($i!=$pag) {
					echo " <a href=\"index.php?pagina=listar_utilizadores&pag=$i\">$i</a> |";
				} else {
					echo "$i | ";
				}	
			}	
			if ($pag+1<=$num_pag) {
				echo " <a href=\"index.php?pagina=listar_utilizadores&pag=$pag_seg\">Seguinte</a>";
				
			}
			echo "</td></tr>";
			
		}
		echo "</table>";
		?>
	
		<?php } ?>