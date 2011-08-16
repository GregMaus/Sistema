<section id="main" class="column">
   
  <?php echo $this->message->display();   ?>
       

    
    <article class="module width_3_quarter">
		<header>
                    <h3 class="tabs_involved">Usuarios</h3>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table cellpadding="0" cellspacing="0" border="0" class="display tablesorter" >
                                    <thead>
                                            <tr>
                                                    <th>Código</th>
                                                    <th>Nome</th>
                                                    <th>Login</th>
                                                    <th>Tipo</th>
                                                    <th>Criado em</th>
                                                    <th>Editar</th>
                                                    <th>Excluir</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($usuarios as $usuario) {  ?>

                                            <tr >
                                                    <td><?php echo $usuario->id_usuario ?></td>
                                                    <td><?php echo $usuario->nome ?></td>
                                                    <td><?php echo $usuario->login ?></td>
                                                    <td><?php echo $usuario->tipo ?></td>
                                                    <td><?php echo $usuario->created_at ?></td>                                                   
                                                    <td class="center">
                                                        <a href="Usuario/usuario_edit/<?php echo $usuario->id_usuario ?>">
                                                            <input type="image" src="assets/images/icn_edit.png" title="Edit"/>
                                                        </a>
                                                    </td>
                                                    <td class="center">
                                                        <a href="Usuario/usuario_delete/<?php echo $usuario->id_usuario ?>">
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