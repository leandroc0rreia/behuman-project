<?php if(isset($_GET['ativo'])){
	$queryativo="update anuncioaband set ativo=1 where cod_anuncioaband='".$_GET['cod_anuncioaband']."'";	
	$resultativo=mysqli_query($ligax,$queryativo);
}
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
}  ?>
<header class="major">
										<h1>Anúncios de Abandono</h1>
									</header>
									<div class="posts">
										<?php $listar="select * from anuncioaband where ativo=0 order by cod_anuncioaband desc;";
			
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										
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
													<div>
														<a class="button primary fit" href="index.php?pagina=anuncioaband&like_postaband=<?php echo $cod_anuncioaband; ?>&cod_anuncioaband=<?php echo $cod_anuncioaband; ?>"><i class="fa fa-heart"></i>&nbsp;<?php echo $gostos;?> Gostos</a>
													</div>
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