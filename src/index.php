<?php include "ligacao.php"; ?>
<!DOCTYPE HTML>

<html >
	<head>
		<title>BeHuman</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="shortcut icon" href="images/logomini.png" type="image/png">
		
	</head>
	<body class="is-preload">
	
<?php  
	
if(isset($_GET['pagina'])){

$pagina=$_GET['pagina'];
	
if($pagina=="validar_login") include("validar_login.php");	
}
		
?>
	
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

								
							<!-- Banner -->

							<?php if(isset($_SESSION['perfil_utilizador'])){ // Tentou fazer login
		
			
			
			if($_SESSION["login_status"]==0) include("banner_visitante.php"); //mostra o menu do visitante
										
			
}else include("banner_visitante.php"); //mostra o menu do visitante caso ainda não tenha tentado fazer login
    			
?>
								
							<!-- Section -->
								<section>
									
									<?php if(isset($_GET['pagina'])) {
										$pag=$_GET['pagina'];
										if($pag=="inserir_anuncio") include "inserir_anuncioadoc.php";
										if($pag=="inserir_anunciopetsi") include "inserir_anunciopetsi.php";
										if($pag=="inserir_anuncioaband") include "inserir_anuncioaband.php";
										if($pag=="inserir_faq") include "inserir_faq.php";
										if($pag=="validar_login") include "home.php";
										if($pag=="anuncioadoc") include "anuncioadoc.php";
										if($pag=="anunciopetsi") include "anunciopetsi.php";
										if($pag=="anuncioaband") include "anuncioaband.php";
										if($pag=="hoteis") include "hoteis.php";
										if($pag=="meusanuncioadoc") include "meusanuncioadoc.php";
										if($pag=="meusanunciopetsi") include "meusanunciopetsi.php";
										if($pag=="meusanuncioaband") include "meusanuncioaband.php";
										if($pag=="meusanuncio") include "meusanuncio.php";
										if($pag=="listar_utilizadores") include "listar_utilizadores.php";
										if($pag=="editar_util_admin") include "editar_util_admin.php";
										if($pag=="faq") include "faq.php";
										if($pag=="acerca") include "acerca.php";
										if($pag=="sabermaisadoc") include "sabermaisadoc.php";
										if($pag=="sabermaisaband") include "sabermaisaband.php";
										if($pag=="sabermaispetsi") include "sabermaispetsi.php";
										if($pag=="editar_anuncioadoc") include "editar_anuncioadoc.php";
										if($pag=="editar_anuncioaband") include "editar_anuncioaband.php";
										if($pag=="editar_anunciopetsi") include "editar_anunciopetsi.php";
										if($pag=="listar_anuncioadoc") include "listar_anuncioadoc.php";
										if($pag=="listar_anunciopetsi") include "listar_anunciopetsi.php";
										if($pag=="listar_anuncioaband") include "listar_anuncioaband.php";
										if($pag=="sucesso") include "sucesso.php";
										if($pag=="favorito") include "favorito.php";
										if($pag=="listar_destaque") include "listar_destaque.php";
										if($pag=="listar_destaquepetsi") include "listar_destaquepetsi.php";
										if($pag=="listar_destaqueaband") include "listar_destaqueaband.php";
										if($pag=="destaque") include "destaque.php";
									} else include "home.php";
									
									?>
									
									
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

<!-- Menu -->
							<?php if(isset($_SESSION['perfil_utilizador'])){ // Tentou fazer login
		
			if($_SESSION['perfil_utilizador']==1) include("menu_admin.php"); //mostra o menu do administrador

							
			if($_SESSION['perfil_utilizador']==0) include("menu_utilizador.php"); //mostra o menu do utilizador
			
			
			if($_SESSION["login_status"]==0) include("menu_visitante.php"); //mostra o menu do visitante
										
			
}else include("menu_visitante.php"); //mostra o menu do visitante caso ainda não tenha tentado fazer login
    			
?>
							<!-- Section -->
								<section>
									<header class="major">
										<h2>Animais Abandonados</h2>
									</header>
									<div class="mini-posts">
									<?php $listar="select * from anuncioaband where ativo=0 order by cod_anuncioaband desc limit 3;";
			
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										
										if($result){
											while ($registo=mysqli_fetch_assoc($result)){
											$localidade=$registo['localidade_anuncioaband'];
											$descricao=$registo['descricao_anuncioaband'];
											$cod_anuncioaband=$registo['cod_anuncioaband'];
											$tamanho_foto=$registo['tamanho_foto'];
											$data_post=$registo['data_post'];
									?>
										<article>
										<?php if($tamanho_foto==0){ ?>
											<a href="index.php?pagina=sabermaisaband&cod_anuncioaband=<?php echo $cod_anuncioaband ?>" class="image"><img src="semfoto.png" alt="" /></a>
										<?php } else { ?>
											<a href="index.php?pagina=sabermaisaband&cod_anuncioaband=<?php echo $cod_anuncioaband ?>" class="image"><img src="showfile_fotoanuncioaband.php?cod_anuncioaband=<?php echo $cod_anuncioaband;?>" alt="" /></a>
											<?php }  ?>
											<h3><?php echo $localidade; ?></h3>
											<h5> <?php echo substr($data_post,0,10);?></h5>
										</article>
										<?php } } ?>
									</div>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Mantem-te atento!</h2>
									</header>
									<p>O Website foi realizado no âmbito da Prova de Aptidão Profissional.<br>Projeto sem fins lucrativos e fiável aos utilizadores. O Conteúdo colocado no Website é fictício.<br></p>
									<ul class="contact">
										<li class="fa-github">leandroc0rreia</li>
										<li class="fa-link">leandroc0rreia</li>
										<li class="fa-home">Portugal</li>
									</ul>
								</section>
								<footer id="footer">
									<p class="copyright">&copy; BeHuman</a></p>
								</footer>
						</div>
					</div>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>