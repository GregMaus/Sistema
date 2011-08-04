<section id="main" class="column">
   
  <?php echo $this->message->display();   ?>
       
		<article class="module width_full">
                     <form action="Menu/novo_menu" method="post">
			<header><h3>Cadastrar Sub Links Menus</h3></header>
				<div class="module_content">
						<fieldset>
                                                        <label>Link:</label>
                                                            <select name="menu">
                                                                <?php foreach ($links as $link) { ?>
                                                                <option value="<?php echo $link->id_adm_links_menu ?>"><?php echo $link->label ?></option>
                                                                <?php }?>
                                                            </select>
                                                        <br></br>
                                                        <label>Label:</label>
                                                            <input type="text" name="label">
                                                        <br></br><br></br>
                                                        <label>Link:</label>
                                                            <input type="text" name="link">
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
                                    <?php foreach ($sublinks as $sublink) {  ?>

                                             <tr >
                                                    <td><?php echo $sublink->linklabel ?></td>
                                                    <td><?php echo $sublink->id_sublink_menu ?></td>
                                                    <td><?php echo $sublink->label ?></td>                                                    
                                                    <td><?php echo $sublink->anchor ?></td>
                                                    <td class="center">
                                                        <a href="Linksmenu/link_edit/<?php echo $sublink->id_sublink_menu ?>">
                                                            <input type="image" src="assets/images/icn_edit.png" title="Edit"/>
                                                        </a>
                                                    </td>
                                                    <td class="center">
                                                        <a href="Linksmenu/link_delete/<?php echo $sublink->id_sublink_menu ?>">
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