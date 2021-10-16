<header class="major">
										<h1>Anúncio de Abandono</h1>
									</header>
									<div class="posts">
										<?php $listar="select * from anuncioaband where cod_anuncioaband='".$_GET['cod_anuncioaband']."'";
			
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										
										if($result){
											while ($registo=mysqli_fetch_assoc($result)){
											$cod_anuncioaband=$registo['cod_anuncioaband'];
											$localidade_anuncioaband=$registo['localidade_anuncioaband'];
											$contacto_anuncioaband=$registo['contacto_anuncioaband'];
											$tipo_animal=$registo['tipo_animal'];
											$raca_animal=$registo['raca_animal'];
											$genero_animal=$registo['genero_animal'];
											$descricao_anuncioaband=$registo['descricao_anuncioaband'];
											$email_utilizador=$registo['email_utilizador'];
											$data_post=$registo['data_post'];
											$tamanho_foto=$registo['tamanho_foto'];
									?>
										<div id="main">
										<div class="inner">
									
											<section>

											
										<?php if($tamanho_foto==0){ ?>
											<center><span class="image main"><img src="semfoto.png" alt="" /></span></center>
										<?php } else { ?>
											<center><span class="image main"><img src="showfile_fotoanuncioaband.php?cod_anuncioaband=<?php echo $cod_anuncioaband;?>" alt="" /></span></center>
											<?php }  ?>
										
											<div class="row">
												<div class="col-6 col-12-small">
												<font size="4"><b>Tipo de Animal:  </b></font><?php echo $tipo_animal; ?><br>
												<font size="4"><b>Raça:  </b></font><?php echo $raca_animal; ?><br>
												<font size="4"><b>Sexo:  </b></font><?php echo $genero_animal; ?><br>
												
												</div>
												
												<div class="col-6 col-12-small">
													<font size="4"><b>Contacto:  </b></font><?php echo $contacto_anuncioaband; ?><br>
													<font size="4"><b>Localidade:  </b></font><?php echo $localidade_anuncioaband; ?><br>
												</div>
											</div>
											<hr class="major" />

											<h2>Descrição</h2>
											<p><?php echo $descricao_anuncioaband; ?></p>

											<hr class="major" />
											
												<p ><b>Anúncio inserido: </b><?php echo $data_post; ?></p>
											
											<hr class="major" />
											<?php if (isset($_SESSION["login_status"])){
												if($_SESSION["login_status"]==1) { ?>
												<center><a href="index.php?pagina=anuncioaband"><button href="" class="button primary ">Voltar ao Anúncio de Abandono</button></a>
												<a href="visualizar_perfil_utilizador.php?email_utilizador=<?php echo $email_utilizador; ?>"><button class="button primary ">Perfil do Utilizador</button></a></center>
											<?php } } ?>
											</section>
										</div>
									</div>	
										<?php } } ?>
										
										
										
									</div>