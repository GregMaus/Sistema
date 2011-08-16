<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Painel de Administração</title>
	
	
        <?php echo link_tag(base_url() .'assets/css/layout.css') . "\n"; ?>
        <?php echo link_tag(base_url() .'assets/css/datatables/demo_page.css') . "\n"; ?>
        <?php echo link_tag(base_url() .'assets/css/datatables/demo_table.css') . "\n"; ?>
        <?php echo link_tag(base_url() .'assets/css/datatables/demo_table_jui.css') . "\n"; ?>
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
        <script src="assets/js/jquery.js" type="text/javascript"></script>
        <script src="assets/js/jquery.dataTables.js" type="text/javascript"></script>	
	<script src="assets/js/hideshow.js" type="text/javascript"></script>
	<script src="assets/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="assets/js/jquery.equalHeight.js"></script>
	<script type="text/javascript">

	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
        
        $('.display').dataTable( {
                "bJQueryUI": true,
                "oLanguage": {
                                "sLengthMenu": "Mostrar _MENU_ regitros por página",
                                "sZeroRecords": "Nada encontrado - desculpe",
                                "sInfo": "Mostrando _START_ de _END_ de _TOTAL_ registros",
                                "sInfoEmpty": "Mostrando 0 de 0 de 0 registros",
                                "sInfoFiltered": "(filtrado de um total de _MAX_ registros)" 
                            },
		"sPaginationType": "full_numbers"
	} );

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>
<body>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="Dashboard">Administração</a></h1>
			<h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a href="#">Ir para o Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
<!--			<p>John Doe (<a href="#">3 Messages</a>)</p>-->
                        <p><?php echo $this->session->userdata('login')?> (<a href="Dashboard/logout">Sair</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs">
                            <a href="Dashboard">Administração</a> 
                            <?php foreach ($grao as $value) {?> 
                            <div class="breadcrumb_divider"></div> 
                            <a class="current"><?php echo $value ?></a>
                            <?php  }?>
                        </article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Busca Rápida" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Conteúdo</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="<?php echo base_url() ?>Mensagens">Mensagens</a></li>
<!--			<li class="icn_edit_article"><a href="#">Visitantes</a></li>-->
                        <li class="icn_view_users"><a href="<?php echo base_url() ?>Visitantes">Visitantes</a></li>
			<li class="icn_categories"><a href="<?php echo base_url() ?>Secao">Seções</a></li>
			<li class="icn_tags"><a href="<?php echo base_url() ?>Menu">Menus</a>
                            <ul>                                
                                <li><a href="<?php echo base_url() ?>Linksmenu">Links do Menu</a></li>
                                <li><a href="<?php echo base_url() ?>Sublinksmenu">Sub Links menu</a></li>
                            </ul>
                        </li>
		</ul>
		<h3>Usuários</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="<?php echo base_url() ?>Usuario/novo_usuario">Novo Usuário</a></li>
			<li class="icn_view_users"><a href="<?php echo base_url() ?>Usuario">Ver Usuários</a></li>
			<li class="icn_profile"><a href="#">Your Profile</a></li>
		</ul>
		<h3>Midia</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo base_url() ?>Midia">File Manager</a></li>
			<li class="icn_photo"><a href="#">Gallery</a></li>
			<li class="icn_audio"><a href="#">Audio</a></li>
			<li class="icn_video"><a href="#">Video</a></li>
		</ul>
		<h3>Administração</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Options</a></li>
			<li class="icn_security"><a href="#">Security</a></li>
			<li class="icn_jump_back"><a href="#">Logout</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2011 </strong></p>
			
		</footer>
	</aside><!-- end of sidebar -->

</body>

</html>