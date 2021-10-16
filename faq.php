<header class="major">
										<h1>FAQ</h1>
										


</header>
<?php $listar="select * from faq;";
			
										$result=mysqli_query($ligax,$listar);
										$nregistos=mysqli_num_rows($result);
										
										if($result){
											while ($registo=mysqli_fetch_assoc($result)){
											$pergunta_faq=$registo['pergunta_faq'];
											$resposta_faq=$registo['resposta_faq'];
											
									?>
<center><button class="accordion"><?php echo $pergunta_faq; ?></button>
<div class="panel">
  <p><?php echo $resposta_faq; ?></p>
</div></center>
										<?php } }  ?>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}
</script>