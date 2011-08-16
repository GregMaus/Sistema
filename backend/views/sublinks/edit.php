<section id="main" class="column">
   
  <?php echo $this->message->display();   ?>
       
		<article class="module width_full">
                     <form action="../sublink_update/<?php echo $sublink->id_sublink_menu ?>" method="post">
			<header><h3>Editar Sub Links Menus</h3></header>
				<div class="module_content">
						<fieldset>
                                                        <label>Link:</label>
                                                            <select name="links">
                                                                <?php foreach ($links as $link) { ?>
                                                                <option value="<?php echo $link->id_adm_links_menu ?>"><?php echo $link->label ?></option>
                                                                <?php }?>
                                                            </select>
                                                        <br></br>
                                                        <label>Label:</label>
                                                            <input type="text" name="label" value="<?php echo $sublink->label ?>">
                                                        <br></br><br></br>
                                                        <label>Referência:</label>
                                                            <input type="text" name="link" value="<?php echo $sublink->anchor ?>">
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