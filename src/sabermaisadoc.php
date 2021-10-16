<header class="major">
										<h1>Anúncio de Adoção</h1>
									</header>
									<div class="posts">
										<?php $listar="select * from anuncioadoc where cod_anuncio='".$_GET['cod_anuncio']."'";
			
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										
										if($result){
											while ($registo=mysqli_fetch_assoc($result)){
											$cod_anuncio=$registo['cod_anuncio'];
											$localidade_anuncio=$registo['localidade_anuncio'];
											$contacto_anuncio=$registo['contacto_anuncio'];
											$tipo_adocao=$registo['tipo_adocao'];
											$nome_animal=$registo['nome_animal'];
											$idade_animal=$registo['idade_animal'];
											$tipo_animal=$registo['tipo_animal'];
											$raca_animal=$registo['raca_animal'];
											$genero_animal=$registo['genero_animal'];
											$dataini_anuncio=$registo['dataini_anuncio'];
											$datafin_anuncio=$registo['datafin_anuncio'];
											$descricao_anuncio=$registo['descricao_anuncio'];
											$data_post=$registo['data_post'];
											$email_utilizador=$registo['email_utilizador'];
											$tamanho_foto=$registo['tamanho_foto'];
									?>
									<div id="main">
										<div class="inner">
									
											<section>

											
										<?php if($tamanho_foto==0){ ?>
											<center><span class="image main"><img src="semfoto.png" alt="" /></span></center>
										<?php } else { ?>
											<center><span class="image main"><img src="showfile_fotoanuncioadoc.php?cod_anuncio=<?php echo $cod_anuncio;?>" alt="" /></span></center>
											<?php }  ?>
											<div class="row">
												<div class="col-6 col-12-small">
												<font size="4"><b>Nome:  </b></font><?php echo $nome_animal; ?><br>
												<font size="4"><b>Idade: </b></font><?php echo $idade_animal; ?><br>
												<font size="4"><b>Tipo de Animal: </b></font><?php echo $tipo_animal; ?><br>
												<font size="4"><b>Raça: </b></font><?php echo $raca_animal; ?><br>
												<font size="4"><b>Sexo: </b></font><?php echo $genero_animal; ?><br>
												</div>
												
												<div class="col-6 col-12-small">
													<font size="4"><b>Contacto:  </b></font><?php echo $contacto_anuncio; ?><br>
													<font size="4"><b>Localidade:  </b></font><?php echo $localidade_anuncio; ?><br>
													<font size="4"><b>Tipo de Adoção:  </b></font><?php echo $tipo_adocao ?><br>
												</div>
											</div>
											<hr class="major" />

											<h2>Descrição</h2>
											<p><?php echo $descricao_anuncio; ?></p>

											<hr class="major" />

											<h2>Tempo de Adoção</h2>
											<p><?php echo $dataini_anuncio; ?> <b>até</b> <?php echo $datafin_anuncio; ?></p>
											
											<hr class="major" />
											
												<p ><b>Anúncio inserido: </b><?php echo $data_post; ?></p>
											
											<hr class="major" />
											<?php if (isset($_SESSION["login_status"])){
												if($_SESSION["login_status"]==1) { ?>
												<center><a href="index.php?pagina=anuncioadoc"><button href="" class="button primary ">Voltar ao Anúncio de Adoção</button></a>
												<a href="visualizar_perfil_utilizador.php?email_utilizador=<?php echo $email_utilizador; ?>"><button class="button primary ">Perfil do Utilizador</button></a></center>
											<?php } } ?>
											</section>
										</div>
									</div>	
										<?php } } ?>
										
										
										
									</div>