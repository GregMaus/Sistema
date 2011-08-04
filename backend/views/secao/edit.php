<section id="main" class="column">
   
  <?php echo $this->message->display();   ?>
       
		<article class="module width_full">
                     <form action="../secao_update/<?php echo $secao->id_sys_secao ?>" method="post">
			<header><h3>Editando Seção</h3></header>
				<div class="module_content">
						<fieldset>
                                                   
							<label>Nome da Seção</label>
							<input type="text" name="secao" value="<?php echo $secao->nome ?>">
                                                  
						</fieldset>
						
                                    <div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Cadastrar" class="alt_btn">
				</div>
			</footer>
                          </form>
		</article><!-- end of post new article -->
    
    
                
		<div class="clear"></div>
		

</section>        