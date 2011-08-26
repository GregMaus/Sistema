<section id="main" class="column">
		
    <article class="module width_full" id="novo_dir" style="display:none">
        <form action="media/create_dir" method="post">
			<header><h3>Novo Diretório</h3></header>
				<div class="module_content">
                
                    <fieldset>
                    
                    
                    <label>Nome do diretório:</label>
                    <input type="text" name="dirname" />
                    
                    
                    </fieldset>
                
                
                    <div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Cadastrar" class="alt_btn" />
				</div>
			</footer>
                          </form>
	</article><!-- end of post new article -->
    
    		
                
                
		<article class="module width_full ">
			<header><h3>Diretórios</h3>
                
                <a href="#" id="novo" onclick="Novo_dir()">Novo</a>
                
            </header>
           
			<div class="module_content">
            
            
            <?php foreach ($dirs as $value) { ?>
            
                <div class="file">
                
                <a href="media/delete_dir/<?php echo $value ?>"><img  src="<?php echo base_url()?>assets/images/icons/delete.png" /></a>
                
                <br />    
                
                <?php  if(count(get_filenames('./upload/'.$value))>=1){ ?>  
                
                <a href="#" ondblclick="Open_dir('<?php echo $value ?>')">                            
                    <img  src="<?php echo base_url()?>assets/images/icons/32/folder_documents.png" />
                </a>
                
                <?php }else { ?>
                
                    <img  src="<?php echo base_url()?>assets/images/icons/32/folder.png" />
                
                <?php } ?>
                
                </br>
                <span><?php  echo $value ?></span>
                
                </div>
                
                <?php } ?>
                
             

				<div class="clear"></div>
			</div>
           
		</article><!-- end of stats article -->
                
            
                

                
		<div class="spacer"></div>
	</section>