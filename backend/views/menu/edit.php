<section id="main" class="column">
   
  <?php echo $this->message->display();  ?>    
    
       
		<article class="module width_full">
                     <form action="../menu_update/<?php echo $menu->id_adm_menu ?>" method="post">
			<header><h3>Cadastrar Novo Menu</h3></header>
				<div class="module_content">
						<fieldset>
                                                        <input type="hidden" name="id" value="<?php echo $menu->id_adm_menu ?>">
							<label>Nome do Menu</label>
							<input type="text" name="menu" value="<?php echo $menu->nome ?>">
                                                  
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