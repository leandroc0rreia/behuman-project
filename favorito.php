<?php if(isset($_GET['ativo'])){
	$queryativo="update anuncioadoc set ativo=1 where cod_anuncio='".$_GET['cod_anuncio']."'";	
	
	$resultativo=mysqli_query($ligax,$queryativo);
}
	if(isset($_GET['like_postadoc'])) {
$id=$_GET['cod_anuncio'];
$like="select * from likes where cod_utilizador='".$_SESSION['cod_utilizador']."' and cod_anuncio=$id";   

$result_id=mysqli_query($ligax,$like);
$num_rows=mysqli_num_rows($result_id);
if($num_rows>0){
  while($registo=mysqli_fetch_assoc($result_id)){
     $value_like=$registo['like_postadoc'];
     if ($value_like==0) {$value_like=1;} else $value_like=0;
     $alterar="update likes set like_postadoc=$value_like where cod_utilizador='".$_SESSION['cod_utilizador']."' and cod_anuncio=$id";
	
     $result_ALT=mysqli_query($ligax,$alterar);

}
} 

else { //não encontrou na BD
$insere="INSERT INTO likes (cod_anuncio,like_postadoc,cod_utilizador) VALUES('".$id."',1,'".$_SESSION["cod_utilizador"]."')";
        //echo $insere;
		$result=mysqli_query($ligax,$insere);


}
}
?>
<header class="major">
										<h1>Favoritos</h1>
									</header>
									<?php $listar="select * from anuncioadoc,likes where cod_utilizador='".$_SESSION["cod_utilizador"]."' and likes.cod_anuncio=anuncioadoc.cod_anuncio and like_postadoc=1 order by anuncioadoc.cod_anuncio desc;";
			
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										if($nregistos>0) { ?>
<header class="major">
										<h2>Anúncios de Adoção</h2>
									</header>
									<?php } ?>
									<div class="posts">
										<?php 
										if($result){
											while ($registo=mysqli_fetch_assoc($result)){
											$localidade=$registo['localidade_anuncio'];
											$descricao=$registo['descricao_anuncio'];
											$cod_anuncio=$registo['cod_anuncio'];
											$tamanho_foto=$registo['tamanho_foto'];
											
											$query4="select count(*) as gostos from likes where cod_anuncio=$cod_anuncio and like_postadoc=1";
											//echo $query4;
											$result4=mysqli_query($ligax,$query4);
											if($result4){
											while($registo4=mysqli_fetch_assoc($result4)){
											$gostos=$registo4['gostos'];
									?>
										<article>
										<?php if($tamanho_foto==0){ ?>
											<a href="index.php?pagina=sabermaisadoc&cod_anuncio=<?php echo $cod_anuncio ?>" class="image"><img src="semfoto.png" alt="" /></a>
										<?php } else { ?>
											<a href="index.php?pagina=sabermaisadoc&cod_anuncio=<?php echo $cod_anuncio ?>" class="image"><img src="showfile_fotoanuncioadoc.php?cod_anuncio=<?php echo $cod_anuncio;?>" alt="" /></a>
											<?php }  ?>
											<h3><?php echo $localidade; ?></h3>
											<p><?php echo substr($descricao,0,99)."..." ;?></p>
											
										<div align="center">
											<ul class="actions">
												<li><a href="index.php?pagina=sabermaisadoc&cod_anuncio=<?php echo $cod_anuncio ?>" class="button primary fit">Saber Mais</a></li>
												<?php if (isset($_SESSION["login_status"])){
												if($_SESSION["login_status"]==1) { ?>
												<li>
													<div>
														<a class="button primary fit" href="index.php?like_postadoc=<?php echo $cod_anuncio; ?>&cod_anuncio=<?php echo $cod_anuncio; ?>"><i class="fa fa-heart"></i>&nbsp;<?php echo $gostos;?> Gostos</a>
													</div>
												</li>
												<?php } } ?>
											</ul>
										
										
											
										
										</div>
										</article>
										
										<?php } } } } ?>
										
										
										
									</div>
									
<?php
if(isset($_GET['like_postpetsi'])) {
$id=$_GET['cod_anunciopetsi'];
$like="select * from likespetsi where cod_utilizador='".$_SESSION['cod_utilizador']."' and cod_anunciopetsi=$id";   

$result_id=mysqli_query($ligax,$like);
$num_rows=mysqli_num_rows($result_id);
if($num_rows>0){
  while($registo=mysqli_fetch_assoc($result_id)){
     $value_like=$registo['like_postpetsi'];
     if ($value_like==0) {$value_like=1;} else $value_like=0;
     $alterar="update likespetsi set like_postpetsi=$value_like where cod_utilizador='".$_SESSION['cod_utilizador']."' and cod_anunciopetsi=$id";
	 
     $result_ALT=mysqli_query($ligax,$alterar);

}
} 

else { //não encontrou na BD
$insere="INSERT INTO likespetsi (cod_anunciopetsi,like_postpetsi,cod_utilizador) VALUES('".$id."',1,'".$_SESSION["cod_utilizador"]."')";
        //echo $insere;
		$result=mysqli_query($ligax,$insere);


}
} 
$listar="select * from anunciopetsi,likespetsi where cod_utilizador='".$_SESSION["cod_utilizador"]."' and likespetsi.cod_anunciopetsi=anunciopetsi.cod_anunciopetsi and like_postpetsi=1  order by anunciopetsi.cod_anunciopetsi desc;";
$result=mysqli_query($ligax,$listar);
$nregistos=mysqli_num_rows($result);
if($nregistos>0) {
?>
<header class="major">
										<h2>Anúncios de Pet-Sitting</h2>
									</header>
									<?php } ?>
									<div class="posts">
										<?php 
										
										
										
										if($result){
											while ($registo=mysqli_fetch_assoc($result)){
											$localidade=$registo['localidade_anunciopetsi'];
											$descricao=$registo['informacao_anunciopetsi'];
											$cod_anunciopetsi=$registo['cod_anunciopetsi'];
											$tamanho_foto=$registo['tamanho_foto'];
											
											$query4="select count(*) as gostos from likespetsi where cod_anunciopetsi=$cod_anunciopetsi and like_postpetsi=1";
											//echo $query4;
											$result4=mysqli_query($ligax,$query4);
											if($result4){
											while($registo4=mysqli_fetch_assoc($result4)){
											$gostos=$registo4['gostos'];
									?>
										<article>
										<?php if($tamanho_foto==0){ ?>
										<a href="index.php?pagina=sabermaispetsi&cod_anunciopetsi=<?php echo $cod_anunciopetsi ?>" class="image"><img src="semfoto.png" alt="" /></a>
										<?php } else { ?>
											<a href="index.php?pagina=sabermaispetsi&cod_anunciopetsi=<?php echo $cod_anunciopetsi ?>" class="image"><img src="showfile_fotoanunciopetsi.php?cod_anunciopetsi=<?php echo $cod_anunciopetsi;?>" alt="" /></a>
											<?php }  ?>
											<h3><?php echo $localidade; ?></h3>
											<p><?php echo substr($descricao,0,99)."..." ;?></p>
											<div align="center">
													<ul class="actions">
														<li><a href="index.php?pagina=sabermaispetsi&cod_anunciopetsi=<?php echo $cod_anunciopetsi ?>" class="button primary fit">Saber Mais</a></li>
													<?php if (isset($_SESSION["login_status"])){
												if($_SESSION["login_status"]==1) { ?>
												<li>
													<div>
													<a class="button primary fit" href="index.php?like_postpetsi=<?php echo $cod_anunciopetsi; ?>&cod_anunciopetsi=<?php echo $cod_anunciopetsi; ?>"><i class="fa fa-heart"></i>&nbsp;<?php echo $gostos;?> Gostos</a>
													</div>
												</li>
												<?php } } ?>
											</ul>
										
										
											
										
										</div>
										</article>
										
										<?php } } } } ?>
										
										
										
									</div>
									
<?php
if(isset($_GET['like_postaband'])) {
$id=$_GET['cod_anuncioaband'];
$like="select * from likesaband where cod_utilizador='".$_SESSION['cod_utilizador']."' and cod_anuncioaband=$id";   

$result_id=mysqli_query($ligax,$like);
$num_rows=mysqli_num_rows($result_id);
if($num_rows>0){
  while($registo=mysqli_fetch_assoc($result_id)){
     $value_like=$registo['like_postaband'];
     if ($value_like==0) {$value_like=1;} else $value_like=0;
     $alterar="update likesaband set like_postaband=$value_like where cod_utilizador='".$_SESSION['cod_utilizador']."' and cod_anuncioaband=$id";
	 
     $result_ALT=mysqli_query($ligax,$alterar);

}
} 

else { //não encontrou na BD
$insere="INSERT INTO likesaband (cod_anuncioaband,like_postaband,cod_utilizador) VALUES('".$id."',1,'".$_SESSION["cod_utilizador"]."')";
        //echo $insere;
		$result=mysqli_query($ligax,$insere);


}
}  
$listar="select * from anuncioaband,likesaband where cod_utilizador='".$_SESSION["cod_utilizador"]."' and likesaband.cod_anuncioaband=anuncioaband.cod_anuncioaband and like_postaband=1 order by anuncioaband.cod_anuncioaband desc;";
			
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										if($nregistos>0) { ?>
								
<header class="major">
										<h2>Anúncios de Abandono</h2>
									</header>
									<?php } ?>
									<div class="posts">
										<?php 
										
										if($result){
											while ($registo=mysqli_fetch_assoc($result)){
											$localidade=$registo['localidade_anuncioaband'];
											$descricao=$registo['descricao_anuncioaband'];
											$cod_anuncioaband=$registo['cod_anuncioaband'];
											$tamanho_foto=$registo['tamanho_foto'];
											
											$query4="select count(*) as gostos from likesaband where cod_anuncioaband=$cod_anuncioaband and like_postaband=1";
											//echo $query4;
											$result4=mysqli_query($ligax,$query4);
											if($result4){
											while($registo4=mysqli_fetch_assoc($result4)){
											$gostos=$registo4['gostos'];
									?>
										<article>
										<?php if($tamanho_foto==0){ ?>
											<a href="index.php?pagina=sabermaisaband&cod_anuncioaband=<?php echo $cod_anuncioaband ?>" class="image"><img src="semfoto.png" alt="" /></a>
										<?php } else { ?>
											<a href="index.php?pagina=sabermaisaband&cod_anuncioaband=<?php echo $cod_anuncioaband ?>" class="image"><img src="showfile_fotoanuncioaband.php?cod_anuncioaband=<?php echo $cod_anuncioaband;?>" alt="" /></a>
											<?php }  ?>
											<h3><?php echo $localidade; ?></h3>
											<p><?php echo substr($descricao,0,99)."..." ;?></p>
											<div align="center">
													<ul class="actions">
														<li><a href="index.php?pagina=sabermaisaband&cod_anuncioaband=<?php echo $cod_anuncioaband ?>" class="button primary fit">Saber Mais</a></li>
													<?php if (isset($_SESSION["login_status"])){
												if($_SESSION["login_status"]==1) { ?>
												<li>
													<a class="button primary fit" href="index.php?like_postaband=<?php echo $cod_anuncioaband; ?>&cod_anuncioaband=<?php echo $cod_anuncioaband; ?>"><i class="fa fa-heart"></i>&nbsp;<?php echo $gostos;?> &nbsp; Gostos</a>
												</li>
												<?php } } ?>
											</ul>
										
										
											
										
										</div>
										</article>
										
										<?php } } } } ?>
										</div>
<script type="text/javascript" src="js/botaofav.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" href="assets/css/botaofav.css" />