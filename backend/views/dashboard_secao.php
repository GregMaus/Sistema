<section id="main" class="column">
   
  <?php echo $this->message->display();   ?>
       
		<article class="module width_full">
                     <form action="Secao/nova_secao" method="post">
			<header><h3>Cadastrar Nova Seção</h3></header>
				<div class="module_content">
						<fieldset>
                                                   
							<label>Nome da Seção</label>
							<input type="text" name="secao">
                                                  
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
                    <h3 class="tabs_involved">Seções do Site</h3>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table cellpadding="0" cellspacing="0" border="0" class="display tablesorter" >
                                    <thead>
                                            <tr>
                                                    <th>Código</th>
                                                    <th>Nome</th>
                                                    <th>Criado em</th>
                                                    <th>Subseções</th>
                                                    <th>Editar</th>
                                                    <th>Excluir</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($secoes as $secao) {  ?>

                                            <tr >
                                                    <td><?php echo $secao->id_sys_secao ?></td>
                                                    <td><?php echo $secao->nome ?></td>
                                                    <td><?php echo $secao->created_at ?></td>
                                                    <td>xx</td>
                                                    <td class="center">
                                                        <a href="Secao/secao_edit/<?php echo $secao->id_sys_secao ?>">
                                                            <input type="image" src="assets/images/icn_edit.png" title="Edit"/>
                                                        </a>
                                                    </td>
                                                    <td class="center">
                                                        <a href="Secao/secao_delete/<?php echo $secao->id_sys_secao ?>">
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