<header class="main-header">
	<!--=====================================
	=           Logotipo          =
	======================================-->
	<a href="inicio" class="logo">
		<!-- logo min -->
		<span class="logo-mini">
			<img src="views/img/plantilla/Logo.png" class="img-responsive"  style="padding: 10px">
		</span>
		<!-- logo normal -->
		<span class="logo-lg">
		  <!-- <img src="views/img/plantilla/Logo.png" class="img-responsive" style="padding: 10px 0px"> -->
		  <h2>System AMB</h2>
		</span>
	</a>
	<!--=====================================
	=           Barra de Navegacion         =
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botton de Navegacion -->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle Navigation</span>
			<!-- <span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span> -->
		</a>
		<!-- Perfil de Usuario -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- <li class="dropdwon user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="views/img/usuarios/default/anonimus.svg" class="user-image">

						<span class="hidden-xs">Usuario Administrador</span>
					</a>  -->
					<!-- dropdown-toggle-->
					<!-- <ul class="dropdown-menu">
						<li class="user-body">
							<div class="pull-right">
								<a href="salir" class="btn btn-default btn-flat" >Salir</a>
							</div>
						</li>
					</ul>
				</li> -->
				<li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php echo $_SESSION["usuario"] ["Nombre"];?>
						<img src="<?php echo ($_SESSION["usuario"] ["Foto"] == "") ? 'views/img/usuarios/default/anonimus.svg': $_SESSION["usuario"] ["Foto"];?>" class="user-image">
					</a>
          <ul class="dropdown-menu">
              <!-- User image -->
            <li class="user-header">
              <img src="<?php echo ($_SESSION["usuario"] ["Foto"] == "") ? 'views/img/usuarios/default/anonimus.svg': $_SESSION["usuario"] ["Foto"];?>" class="img-circle" alt="User Image">
                <p>
                	<p style="font-size: 16px">
                  	 <?php echo $_SESSION["usuario"] ["Puesto"];?><br>
                  	 Numero Tarjeta 
                  	<?php echo $_SESSION["usuario"] ["Num_Tarjeta"];?>
                	</p>
                </p>
            </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a  class="btn btn-default btn-flat" data-toggle="modal" data-target="#modalGestionPerfilUsuario">Perfil</a>
              </div>
              <div class="pull-right">
                <a href="salir" class="btn btn-default btn-flat">Salir</a>
              </div>
            </li>
          </ul>
        </li>
		  </ul>
		</div>
	</nav>	
</header>
<!--=====================================
=            VENTANA MODAL           =
======================================-->
<!--=====================================
= ADMINTRACION PERFIL USUARIO           =
======================================-->
<div id="modalGestionPerfilUsuario" class="modal"  role="dialog">
  <div class="modal-dialog" >
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center"><?php echo $_SESSION["usuario"] ["Nombre"];?> - <?php echo $_SESSION["usuario"] ["Puesto"];?>
          </h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
            	<div class="col-md-6">
            		<div class="form-group">
                  <label for="editarFoto">Subir Foto</label>
                  <input type="file" class="nuevaFoto" name="editarFotoPerfilUsuario">
                  <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                  <img src="views/img/usuarios/default/anonimus.svg" class="img-thumbnail previsualizar previsualizareditar" width="100px">
                  <input type="hidden" name="fotoActualPerfilUsuario" id="fotoActualPerfilUsuario" value="<?php echo ($_SESSION["usuario"] ["Foto"] == "") ? 'views/img/usuarios/default/anonimus.svg': $_SESSION["usuario"] ["Foto"];?>">
                  <input type="hidden" name="NumTarjetaPerfilUsuario" id="NumTarjetaPerfilUsuario" value="<?php echo $_SESSION["usuario"] ["Num_Tarjeta"];?>">
                </div>
            	</div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="panel">Foto Usuario</div>
                  <img src="<?php echo $_SESSION["usuario"] ["Foto"] ?>" class="img-thumbnail previsualizarimgProducto" width="200px">
                  <input type="hidden" name="editaProductoImagen" id="editaProductoImagen">
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Cambios</button>
        </div>
        <?php 
         $editarFotoPerfilUsuario = new ControlleUsuarios();
         $editarFotoPerfilUsuario -> ctrCambiarFotoPerfil();
          ?> 
      </form>
    </div>
  </div>
</div>