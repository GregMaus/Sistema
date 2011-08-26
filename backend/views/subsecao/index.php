<section id="main" class="column">
   
  <?php echo $this->message->display();   ?>
       
		<article class="module width_full">
                     <form action="Subsecao/nova_subsecao" method="post">
			<header><h3>Cadastrar Nova Subseção</h3></header>
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
							<input type="text" name="subsecao">
                                                  
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
    
    <article class="module width_3_quarter">
		<header>
                    <h3 class="tabs_involved">Subseções do Site</h3>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table cellpadding="0" cellspacing="0" border="0" class="display tablesorter" >
                                    <thead>
                                            <tr>
                                                    <th>Secão</th>
                                                    <th>Código</th>
                                                    <th>Nome</th>
                                                    <th>Criado em</th>                                                    
                                                    <th>Editar</th>
                                                    <th>Excluir</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($subsecoes as $subsecao) {  ?>

                                            <tr >
                                                    <td><?php echo $subsecao->secanome ?></td>
                                                    <td><?php echo $subsecao->id_sys_subsecao ?></td>
                                                    <td><?php echo $subsecao->nome ?></td>
                                                    <td><?php echo $subsecao->created_at ?></td>
                                                    <td class="center">
                                                        <a href="Subsecao/subsecao_edit/<?php echo $subsecao->id_sys_subsecao ?>">
                                                            <input type="image" src="assets/images/icn_edit.png" title="Edit"/>
                                                        </a>
                                                    </td>
                                                    <td class="center">
                                                        <a href="Subsecao/subsecao_delete/<?php echo $subsecao->id_sys_subsecao ?>">
                                                            <input type="image" src="assets/images/icn_trash.png" title="Trash">
                                                        </a>
                                                    </td>
                                            </tr>
                                    <?php } ?>

                                    </tbody>
                            </table>

			</div><!-- end of #tab2 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
                
		<div class="clear"></div>
		

</section>        