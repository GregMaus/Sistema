<section id="main" class="column">
   
  <?php echo $this->message->display();   ?>
       
		<article class="module width_full">
                     <form action="Menu/novo_menu" method="post">
			<header><h3>Cadastrar Novo Menu</h3></header>
				<div class="module_content">
						<fieldset>
                                                        
							<label>Nome do Menu</label>
							<input type="text" name="menu" value="<?php $menu ?>">
                                                  
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
                    <h3 class="tabs_involved">Menus do Site</h3>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table cellpadding="0" cellspacing="0" border="0" class="display tablesorter" >
                                    <thead>
                                            <tr>
                                                    <th>Código</th>
                                                    <th>Nome</th>
                                                    <th>Criado em</th>
                                                    <th>Links</th>
                                                    <th>Editar</th>
                                                    <th>Excluir</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($menus as $menu) {  ?>

                                            <tr >
                                                    <td><?php echo $menu->id_adm_menu ?></td>
                                                    <td><?php echo $menu->nome ?></td>
                                                    <td><?php echo $menu->created_at ?></td>
                                                    <td>xx</td>
                                                    <td class="center">
                                                        <a href="Menu/menu_edit/<?php echo $menu->id_adm_menu ?>">
                                                            <input type="image" src="assets/images/icn_edit.png" title="Edit"/>
                                                        </a>
                                                    </td>
                                                    <td class="center">
                                                        <a href="Menu/menu_delete/<?php echo $menu->id_adm_menu ?>">
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