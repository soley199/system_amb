<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu">
			<li class="active">
				<a href="inicio">
					<i class="fa fa-home"></i>
					<span>Inicio</span>
				</a>
			</li>
			<?php 
			if ($_SESSION["usuario"]["Id_Perfil"] == 3 || $_SESSION["usuario"]["Id_Perfil"] == 1) :
			?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-address-card-o"></i>
					<span>Recursos Humanos</span>
					<span class="]
					pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="trabajadores">
							<i class="fa fa-id-badge"></i>
							<span>Trabajadores</span>
						</a>
					</li>
					<li>
						<a href="RHCategorias">
							<i class="fa fa-th"></i>
							<span>Categorias</span>
						</a>
					</li>
					<li>
						<a href="RHencuesta">
							<i class="fa fa-file-pdf-o"></i>
							<span>Encuestas</span>
						</a>
					</li>
				</ul>
			</li>
			<?php endif ?>

			<?php 
			if ($_SESSION["usuario"]["Id_Perfil"] == 13 || $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 14) :
			?>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-star"></i>
					<span>ModuloExpres</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>

					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="moduloEmbarque">
							<i class="fa fa-circle-o"></i>
							<span>Embarque</span>
						</a>
					</li>
					<li>
						<a href="moduloCalidad">
							<i class="fa fa-circle-o"></i>
							<span>Calidad</span>
						</a>
					</li>
				</ul>
			</li>

			<?php endif ?>

			<?php 
			if ( $_SESSION["usuario"]["Id_Perfil"] == 1) :
			?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-file-powerpoint-o"></i>
					<span>Ing. Producto</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>

					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="simulador">
							<i class="fa fa-circle-o"></i>
							<span>Simulador AMB</span>
						</a>
					</li>
					<li>
						<a href="estandarAMB">
							<i class="fa fa-circle-o"></i>
							<span>Estandar AMB</span>
						</a>
					</li>
					<li>
						<a href="clientes">
							<i class="fa fa-circle-o"></i>
							<span>Clientes</span>
						</a>
					</li>
					<li>
						<a href="hojaIngenieria">
							<i class="fa fa-circle-o"></i>
							<span>Tarjetas de Ing.</span>
						</a>
					</li>
					<li>
						<a href="numero_Parte_Clinente">
							<i class="fa fa-circle-o"></i>
							<span>Numeros de Parte</span>
						</a>
					</li>
					<li>
						<a href="formula">
							<i class="fa fa-circle-o"></i>
							<span>Formulaciones</span>
						</a>
					</li>
					<li>
						<a href="tablascompartidas">
							<i class="fa fa-circle-o"></i>
							<span>Tablas Compartidas</span>
						</a>
					</li>
				</ul>
			</li>
			<?php endif ?>

			<?php 
			if ( $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 11) :
			?>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-flask"></i>
					<span>Laboratorio</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>

					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="labLiberaciones">
							<i class="fa fa-circle-o"></i>
							<span>Liberaciones</span>
						</a>
					</li>
					<li>
						<a href="labListaMateriasPrimas">
							<i class="fa fa-circle-o"></i>
							<span>Materias Primas</span>
						</a>
					</li>
					
				</ul>
			</li>

			<?php endif ?>

			<?php 
			if ( $_SESSION["usuario"]["Id_Perfil"] == 1) :
			?>
			
			<li class="treeview">
	          <a href="#">
	            <i class="fa fa-creative-commons"></i> <span>DPTO. Compras</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li>
					<a href="proveedores">
						<i class="fa fa-circle-o"></i>
						<span>Proveedores</span>
					</a>
				</li>
	            <li>
					<a href="adminVentas">
						<i class="fa fa-circle-o"></i>
						<span>Crear Ventas</span>
					</a>
				</li>
				<li>
					<a href="reportes">
					<i class="fa fa-circle-o"></i>
					<span>Reporte de  Ventas</span>
					</a>
				</li>

	          </ul>
        	</li>
        	<?php endif ?>

        	<?php 
			if ( $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 13) :
			?>
        	<li class="treeview">
	          <a href="#">
	            <i class="fa  fa-trophy"></i> <span>DPTO. Calidad</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li>
					<a href="#">
						<i class="fa fa-circle-o"></i>
						<span>Rebicion Material</span>
					</a>
				</li>
	            <li>
					<a href="#">
						<i class="fa fa-circle-o"></i>
						<span>Mescalas</span>
					</a>
				</li>
	          </ul>
        	</li>
        	<?php endif ?>

        	<?php 
			if ( $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 14) :
			?>
        	<li class="treeview">
	          <a href="#">
	            <i class="fa fa-bar-chart-o"></i> <span>Produccion Disco</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li>
					<a href="backlog">
						<i class="fa fa-circle-o"></i>
						<span>Back Log</span>
					</a>
				</li>
	            <li>
					<a href="programacionDisco">
						<i class="fa fa-circle-o"></i>
						<span>Programaci??n</span>
					</a>
				</li>
				<li>
					<a href="reportes">
					<i class="fa fa-circle-o"></i>
					<span>Reporte de  Ventas</span>
					</a>
				</li>
				<li>
					<a href="segimientoOrden">
					<i class="fa fa-circle-o"></i>
					<span>Producci??n</span>
					</a>
				</li>
				<li>
					<a href="segimientoOrden">
					<i class="fa fa-circle-o"></i>
					<span>Embarque</span>
					</a>
				</li>
	          </ul>
        	</li>

        	<?php endif ?>
			<!-- <li class="">
				<a href="clientes">
					<i class="fa fa-user"></i>
					<span>Clientes</span>
				</a>
			</li> -->
			<!-- <li class="treeview">
				<a href="#">
					<i class="fa fa-list-ul"></i>
					<span>DPTO. Ventas</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>

					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="compCostoZapata">
							<i class="fa fa-circle-o"></i>
							<span>COMP. Costo Zapata</span>
						</a>
					</li>
					<li>
						<a href="adminVentas">
							<i class="fa fa-circle-o"></i>
							<span>Crear Ventas</span>
						</a>
					</li>
					<li>
						<a href="reportes">
							<i class="fa fa-circle-o"></i>
							<span>Reporte de  Ventas</span>
						</a>
					</li>
				</ul>
			</li> -->
			
			<!-- <li class="treeview">
				<a href="#">
					<i class="fa fa-sitemap"></i>
					<span>Gestion de Calidad</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>

					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="specCliente">
							<i class="fa fa-circle-o"></i>
							<span>Espec. Clientes</span>
						</a>
					</li>
					<li>
						<a href="adminVentas">
							<i class="fa fa-circle-o"></i>
							<span>Aseguramiento</span>
						</a>
					</li>
					<li>
						<a href="reportes">
							<i class="fa fa-circle-o"></i>
							<span>Atencion a Clientes</span>
						</a>
					</li>
					<li>
						<a href="reportes">
							<i class="fa fa-circle-o"></i>
							<span>Compras</span>
						</a>
					</li>
					<li>
						<a href="reportes">
							<i class="fa fa-circle-o"></i>
							<span>Coordinaci??n</span>
						</a>
					</li>
					<li>
						<a href="reportes">
							<i class="fa fa-circle-o"></i>
							<span>Dise??o y Desarrollo</span>
						</a>
					</li>
					<li>
						<a href="reportes">
							<i class="fa fa-circle-o"></i>
							<span>Gesti??n Laboral</span>
						</a>
					</li>
					<li>
						<a href="reportes">
							<i class="fa fa-circle-o"></i>
							<span>Mantenimiento</span>
						</a>
					</li>
					<li>
						<a href="reportes">
							<i class="fa fa-circle-o"></i>
							<span>Produccion</span>
						</a>
					</li>
					<li>
						<a href="reportes">
							<i class="fa fa-circle-o"></i>
							<span>Recursos Humanos</span>
						</a>
					</li>

				</ul>
			</li> -->
			<?php 
			if ( $_SESSION["usuario"]["Id_Perfil"] == 1) :
			?>
		
			<li class="">
				<a href="usuarios">
					<i class="fa fa-user"></i>
					<span>Usuarios</span>
				</a>
			</li>
			<?php endif ?>
		</ul>

	</section>


</aside>
