<header class="major">
	<h1>Histórico de Anúncios</h1>	
</header>

<?php $listar="select * from anuncioadoc where email_utilizador='".$_SESSION["email_utilizador"]."' and ativo=1 order by data_post desc;";
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										if($nregistos>0) {
										?>
										<header class="major">
											<h2>Histórico de Anúncios de Adoção</h2>
										</header>
										<?php
										} ?>
<div class="posts">

										<?php
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
											</ul>
										</article>
										
										<?php } } ?>
										
										
										
									</div>
<?php $listar="select * from anunciopetsi where email_utilizador='".$_SESSION["email_utilizador"]."' and ativo=1 order by data_post desc;";
			
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										if($nregistos>0) {
										?>
										<header class="major">									
										<h2>Histórico de anúncios de petsitting</h2>
										</header>
										<?php 
										} ?>
<div class="posts">
										<?php
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
											</ul>
										</article>
										
										<?php } } ?>
										
										
										
									</div>
									<?php $listar="select * from anuncioaband where email_utilizador='".$_SESSION["email_utilizador"]."' and ativo=1 order by data_post desc;";
			
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										if($nregistos>0) {
										?>
										<header class="major">	
										<h2>Histórico de anúncios de abandono</h2>
										</header>
										<?php
										} ?>
									
									

<div class="posts">
										
										<?php if($result){
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
													
											</ul>
										</article>
										
										<?php } } ?>
										
										
										
									</div>										