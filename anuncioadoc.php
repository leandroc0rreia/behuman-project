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
										<h1>Anúncios de Adoção</h1>
									</header>
									<div class="posts">
										<?php $listar="select * from anuncioadoc where ativo=0 order by cod_anuncio desc;";
			
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										
										if($result){
											while ($registo=mysqli_fetch_assoc($result)){
											$localidade=$registo['localidade_anuncio'];
											$descricao=$registo['descricao_anuncio'];
											$cod_anuncio=$registo['cod_anuncio'];
											$tamanho_foto=$registo['tamanho_foto'];
											//$likes=$registo['likes'];
											//$postid=$registo['postid'];
											
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
													<a class="button primary fit" href="index.php?pagina=anuncioadoc&like_postadoc=<?php echo $cod_anuncio; ?>&cod_anuncio=<?php echo $cod_anuncio; ?>"><i class="fa fa-heart"></i>&nbsp;<?php echo $gostos;?> Gostos</a>
													</div>
												</li>
												<?php }  } ?>
											</ul>
										
										
											
										
										</div>
										</article>
										
										<?php } } }}?>
										
										
										
									</div>

<script type="text/javascript" src="js/botaofav.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" href="assets/css/botaofav.css" />