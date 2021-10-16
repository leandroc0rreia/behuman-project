<header class="major">
										<h1>Anúncio de Pet-Sitting</h1>
									</header>
									<div class="posts">
										<?php $listar="select * from anunciopetsi where cod_anunciopetsi='".$_GET['cod_anunciopetsi']."'";
			
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										
										if($result){
											while ($registo=mysqli_fetch_assoc($result)){
											$localidade_anunciopetsi=$registo['localidade_anunciopetsi'];
											$informacao_anunciopetsi=$registo['informacao_anunciopetsi'];
											$cod_anunciopetsi=$registo['cod_anunciopetsi'];
											$tamanho_foto=$registo['tamanho_foto'];
											$contacto_anunciopetsi=$registo['contacto_anunciopetsi'];
											$quantidade_anunciopetsi=$registo['quantidade_anunciopetsi'];
											$preferencia_anunciopetsi=$registo['preferencia_anunciopetsi'];
											$disponibilidade_anunciopetsi=$registo['disponibilidade_anunciopetsi'];
											$dataini_anunciopetsi=$registo['dataini_anunciopetsi'];
											$datafin_anunciopetsi=$registo['datafin_anunciopetsi'];
											$data_post=$registo['data_post'];
											$email_utilizador=$registo['email_utilizador'];
									?>
											<div id="main">
										<div class="inner">
									
											<section>

											
										<?php if($tamanho_foto==0){ ?>
											<center><span class="image main"><img src="semfoto.png" alt="" /></span></center>
										<?php } else { ?>
											<center><span class="image main"><img src="showfile_fotoanunciopetsi.php?cod_anunciopetsi=<?php echo $cod_anunciopetsi;?>" alt="" /></span></center>
											<?php }  ?>
											<div class="row">
												<div class="col-6 col-12-small">
													<font size="4"><b>Quantidade de Animais:  </b></font><?php echo $quantidade_anunciopetsi; ?><br>
													<font size="4"><b>Preferência de Animais: </b></font><?php echo $preferencia_anunciopetsi; ?><br>
													
												</div>
												
												<div class="col-6 col-12-small">
													<font size="4"><b>Contacto:  </b></font><?php echo $contacto_anunciopetsi; ?><br>
													<font size="4"><b>Localidade:  </b></font><?php echo $localidade_anunciopetsi; ?><br>
													<font size="4"><b>Disponibilidade: </b></font><?php echo $disponibilidade_anunciopetsi; ?><br>
												</div>
											</div>
											<hr class="major" />

											<h2>Descrição</h2>
											<p><?php echo $informacao_anunciopetsi; ?></p>

											<hr class="major" />

											<h2>Tempo de Adoção</h2>
											<p><?php echo $dataini_anunciopetsi; ?> <b>até</b> <?php echo $datafin_anunciopetsi; ?></p>
											
											<hr class="major" />
											
												<p ><b>Anúncio inserido: </b><?php echo $data_post; ?></p>
											
											<hr class="major" />
											<?php if (isset($_SESSION["login_status"])){
												if($_SESSION["login_status"]==1) { ?>
												<center><a href="index.php?pagina=anunciopetsi"><button href="" class="button primary ">Voltar ao Anúncio de Pet-Sitting</button></a>
												<a href="visualizar_perfil_utilizador.php?email_utilizador=<?php echo $email_utilizador; ?>"><button class="button primary ">Perfil do Utilizador</button></a></center>
											<?php } } ?>
											</section>
										</div>
									</div>	
										<?php } } ?>
										
										
										
									</div>