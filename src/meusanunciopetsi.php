<?php if(isset($_GET['ativo'])){
	$queryativo="update anunciopetsi set ativo=1 where cod_anunciopetsi='".$_GET['cod_anunciopetsi']."'";	
	$resultativo=mysqli_query($ligax,$queryativo);
} ?>
<header class="major">
										<h1>Meus Anúncios de Pet-Sitting</h1>
									</header>
									<div class="posts">
										<?php $listar="select * from anunciopetsi where email_utilizador='".$_SESSION["email_utilizador"]."' and ativo=0 order by data_post desc;";
			
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										
										if($result){
											while ($registo=mysqli_fetch_assoc($result)){
											$localidade=$registo['localidade_anunciopetsi'];
											$descricao=$registo['informacao_anunciopetsi'];
											$cod_anunciopetsi=$registo['cod_anunciopetsi'];
											$tamanho_foto=$registo['tamanho_foto'];
									?>
										<article>
										<?php if($tamanho_foto==0){ ?>
										<a href="index.php?pagina=sabermaispetsi&cod_anunciopetsi=<?php echo $cod_anunciopetsi ?>" class="image"><img src="semfoto.png" alt="" /></a>
										<?php } else { ?>
											<a href="index.php?pagina=sabermaispetsi&cod_anunciopetsi=<?php echo $cod_anunciopetsi ?>" class="image"><img src="showfile_fotoanunciopetsi.php?cod_anunciopetsi=<?php echo $cod_anunciopetsi;?>" alt="" /></a>
											<?php }  ?>
											<h3><?php echo $localidade; ?></h3>
											<p><?php echo substr($descricao,0,99)."..." ;?></p>
											<ul class="actions">
												<li><a href="index.php?pagina=sabermaispetsi&cod_anunciopetsi=<?php echo $cod_anunciopetsi ?>" class="button primary fit">Saber Mais</a></li>
												<li><a href="index.php?pagina=editar_anunciopetsi&cod_anunciopetsi=<?php echo $cod_anunciopetsi ?>" class="button primary fit">Editar Anúncio</a></li>
											</ul>
										</article>
										
										<?php } } ?>
										
										
										
									</div>