<section id="main" class="column">
   
  <?php echo $this->message->display();  ?>   
      
    
             
		<article class="module width_full">
                     <form action="../usuario/add_usuario" method="post">
			<header><h3>Novo Usuário</h3></header>
				<div class="module_content">
                
						<fieldset>                                                        
							<label>Nome do Usuario</label>
							<input type="text" name="nome" value=""> 
                                                        <br></br><br></br>
                            <label>Email</label>
							<input type="text" name="email" value=""> 
                                                        <br></br><br></br>
							<label>Login</label>
							<input type="text" name="login" value=""> 
                                                        <br></br><br></br>
							<label>Senha</label>
							<input type="password" name="senha" value="">
                                                        <br></br>
							<label>Repetir Senha</label>
							<input type="password" name="rsenha" value="">
                                                        <br></br>
                                                   <label>Tipo:</label>
                                                            <select name="tipo">
                                                                <?php foreach ($tipos as $tipo) { ?>
                                                                <option value="<?php echo $tipo->id_tipo_usuario ?>"><?php echo $tipo->tipo ?></option>
                                                                <?php }?>
                                                            </select>
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
    
    
                
		<div class="clear"></div>
		

</section>        