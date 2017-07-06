<!------------- Left side column. contains the logo and sidebar --------------------------------------->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				<li class="header">NAVEGACI&Oacute;N</li>
				<li class="active treeview">
					<a href="index_admin.php">
						<i class="fa fa-dashboard"></i> <span>Inicio</span>
						<span class="pull-right-container">
						</span>
					</a>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-book"></i> <span>Blog</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="#"><i class="fa fa-circle-o"></i>Entradas
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="admin_list.php?class=blog_posts&status=inicial"><i class="fa fa-circle-o"></i>Administrar</a></li>
								<li><a href="admin_add.php?class=blog_posts"><i class="fa fa-circle-o"></i>Agregar</a></li>
							</ul>
						</li>
						<li>
							<a href="#"><i class="fa fa-circle-o"></i>Categorias
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="admin_list.php?class=blog_cats&id=&status=inicial"><i class="fa fa-circle-o"></i>Administrar</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-cutlery"></i>
						<span>Recetas</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="admin_list.php?class=recetas&status=inicial"><i class="fa fa-circle-o"></i>Administrar</a></li>
						<li><a href="admin_add.php?class=recetas"><i class="fa fa-circle-o"></i>Agregar</a></li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-cutlery"></i>
								<span>Ingredientes</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="admin_list.php?class=ingredientes&id=&status=inicial"><i class="fa fa-circle-o"></i>Administrar</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-image"></i>
						<span>Galeria</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="admin_list.php?class=galeria&status=inicial"><i class="fa fa-circle-o"></i>Administrar</a></li>
						<li><a href="admin_add.php?class=galeria"><i class="fa fa-circle-o"></i>Agregar</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-navicon"></i> <span>Categoria</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="admin_list.php?class=categoria&id=&status=inicial"><i class="fa fa-circle-o"></i>Administrar</a></li>
					</ul>
				</li>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>
<!--------------------------------------------- End Sidebar --------------------------------------------->
