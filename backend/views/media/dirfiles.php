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
			<header>
                <h3>Conteúdo do diretório "<?php echo $dir ?>"</h3>
                
                <a href="<?php echo base_url()?>Media">
               <img  src="<?php echo base_url()?>assets/images/icons/back.png" />
               </a>
                
            </header>
           
			<div class="module_content">
            
            
            <?php foreach ($files as $value) { ?>   
                      
                <div class="file" >                
 
                     <a href="../../media/delete_file/<?php echo $dir.'/'.$value['name'] ?>"><img  src="<?php echo base_url()?>assets/images/icons/delete.png" /></a>
                     
                     <br />

                            <?php echo  loadImageForExtension($value['name'])?>
       
                
                    </br>
                    <span style="font-size:10px;">
                            <?php  echo $value['name'] ?>
                    </span>
                
                </div>             

                
              <?php  } ?>
                

				<div class="clear"></div>
			</div>
           
		</article><!-- end of stats article -->
                
            
                

                
		<div class="spacer"></div>
	</section>