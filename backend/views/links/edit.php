<section id="main" class="column">
   
  <?php echo $this->message->display();   ?>
       
		<article class="module width_full">
                    <?php echo validation_errors(); ?>
                     <form action="../link_update/<?php echo $link->id_adm_links_menu ?>" method="post">
			<header><h3>Editando Links dos Menus</h3></header>
				<div class="module_content">
						<fieldset>
                                                        <label>Menu:</label>
                                                            <select name="menu">
                                                                <?php foreach ($menus as $menu) { ?>
                                                                <option value="<?php echo $menu->id_adm_menu ?>"><?php echo $menu->nome ?></option>
                                                                <?php }?>
                                                            </select>
                                                        <br></br>
                                                        <label>Label:</label>
                                                            <input type="text" name="label" value="<?php echo $link->label ?>">
                                                        <br></br><br></br>
                                                        <label>Link:</label>
                                                            <input type="text" name="link" value="<?php echo $link->anchor ?>">
                                                        <br></br><br></br>
                                                        <label>Imagem:</label>
                                                            <input type="file" name="imagem">
                                                        <br></br><br></br>
                                                  
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