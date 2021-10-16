<?php if(isset($_GET['ativo'])){
	$queryativo="update anuncioadoc set ativo=1 where cod_anuncio='".$_GET['cod_anuncio']."'";	
	
	$resultativo=mysqli_query($ligax,$queryativo);
} ?>
<header class="major">
										<h1>Meus Anúncios de Adoção</h1>
									</header>
									<div class="posts">
										<?php $listar="select * from anuncioadoc where email_utilizador='".$_SESSION["email_utilizador"]."' and ativo=0 order by data_post desc;";
			
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										
										if($result){
											while ($registo=mysqli_fetch_assoc($result)){
											$localidade=$registo['localidade_anuncio'];
											$descricao=$registo['descricao_anuncio'];
											$cod_anuncio=$registo['cod_anuncio'];
											$tamanho_foto=$registo['tamanho_foto'];
									?>
										<article>
										<?php if($tamanho_foto==0){ ?>
											<a href="index.php?pagina=sabermaisadoc&cod_anuncio=<?php echo $cod_anuncio ?>" class="image"><img src="semfoto.png" alt="" /></a>
										<?php } else { ?>
											<a href="index.php?pagina=sabermaisadoc&cod_anuncio=<?php echo $cod_anuncio ?>" class="image"><img src="showfile_fotoanuncioadoc.php?cod_anuncio=<?php echo $cod_anuncio;?>" alt="" /></a>
											<?php }  ?>
											<h3><?php echo $localidade; ?></h3>
											<p><?php echo substr($descricao,0,99)."..." ;?></p>
											<ul class="actions">
												<li><a href="index.php?pagina=sabermaisadoc&cod_anuncio=<?php echo $cod_anuncio ?>" class="button primary fit">Saber Mais</a></li>
												<li><a href="index.php?pagina=editar_anuncioadoc&cod_anuncio=<?php echo $cod_anuncio ?>" class="button primary fit">Editar Anúncio</a></li>
											</ul>
										</article>
										
										<?php } } ?>
										
										
										
									</div>