<?php if(isset($_GET['ativo'])){
	$queryativo="update anuncioaband set ativo=1 where cod_anuncioaband='".$_GET['cod_anuncioaband']."'";	
	$resultativo=mysqli_query($ligax,$queryativo);
} ?>
<header class="major">
										<h1>Meus Anúncios de Abandono</h1>
									</header>
									<div class="posts">
										<?php $listar="select * from anuncioaband where email_utilizador='".$_SESSION["email_utilizador"]."' and ativo=0 order by data_post desc;";
			
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										
										if($result){
											while ($registo=mysqli_fetch_assoc($result)){
											$localidade=$registo['localidade_anuncioaband'];
											$descricao=$registo['descricao_anuncioaband'];
											$cod_anuncioaband=$registo['cod_anuncioaband'];
											$tamanho_foto=$registo['tamanho_foto'];
									?>
										<article>
										<?php if($tamanho_foto==0){ ?>
											<a href="index.php?pagina=sabermaisaband&cod_anuncioaband=<?php echo $cod_anuncioaband ?>" class="image"><img src="semfoto.png" alt="" /></a>
										<?php } else { ?>
											<a href="index.php?pagina=sabermaisaband&cod_anuncioaband=<?php echo $cod_anuncioaband ?>" class="image"><img src="showfile_fotoanuncioaband.php?cod_anuncioaband=<?php echo $cod_anuncioaband;?>" alt="" /></a>
											<?php }  ?>
											<h3><?php echo $localidade; ?></h3>
											<p><?php echo substr($descricao,0,99)."..." ;?></p>
											<ul class="actions">
												<li><a href="index.php?pagina=sabermaisaband&cod_anuncioaband=<?php echo $cod_anuncioaband ?>" class="button primary fit">Saber Mais</a></li>
												<li><a href="index.php?pagina=editar_anuncioaband&cod_anuncioaband=<?php echo $cod_anuncioaband ?>" class="button primary fit">Editar Anúncio</a></li>	
											</ul>
										</article>
										
										<?php } } ?>
										
										
										
									</div>