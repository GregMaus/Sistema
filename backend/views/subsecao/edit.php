<section id="main" class="column">
   
  <?php echo $this->message->display();   ?>
       
		<article class="module width_full">
                     <form action="../subsecao_update/<?php echo $subsecao->id_sys_subsecao ?>" method="post">
			<header><h3>Editando Subseção</h3></header>
				<div class="module_content">
						<fieldset>
                                <label>Seção:</label>
                                    <select name="secao">
                                        <?php foreach ($secoes as $secao) { ?>
                                        <option value="<?php echo $secao->id_sys_secao ?>"><?php echo $secao->nome ?></option>
                                        <?php }?>
                                    </select>
                                <br></br>
                                                   
							<label>Nome da Subseção</label>
							<input type="text" name="subsecao" value="<?php echo $subsecao->nome ?>">
                                                  
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