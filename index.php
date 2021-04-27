<?php 	

	// require_once "models/";
	require_once "models/categorias.modelo.php";
	require_once "models/clientes.modelo.php";
	// require_once "models/productos.modelo.php";
	require_once "models/usuarios.modelo.php";
	require_once "models/ventas.modelo.php";
	require_once "models/rhcategorias.modelo.php";
	require_once "models/trabajador.modelo.php";
	require_once "models/tablacompartida.modelo.php";
	require_once "models/hojaingenieria.modelo.php";
	require_once "models/proveedor.modelo.php";
	require_once "models/encuesta.modelo.php";
	require_once "models/materialRuta.modelo.php";
	require_once "models/inventarioMateriaprima.modelo.php";
	require_once "models/estandarAMB.modelo.php";
	require_once "models/laboratorio.modelo.php";
	require_once "models/RecepcionMaterial.modelo.php";
	require_once "models/numeroParteCliente.modelo.php";
	require_once "models/Formulaciones.modelo.php";
	require_once "models/backlog.modelo.php";

	require_once "controllers/plantilla.controlador.php";
	require_once "controllers/usuarios.controlador.php";
	require_once "controllers/categorias.controlador.php";
	require_once "controllers/clientes.controlador.php";
	// require_once "controllers/productos.controlador.php";
	require_once "controllers/ventas.controlador.php";
	require_once "controllers/rhcategorias.controlador.php";
	require_once "controllers/trabajador.controlador.php";
	require_once "controllers/tablacompartida.controlador.php";
	require_once "controllers/hojaingenieria.controlador.php";
	require_once "controllers/proveedores.controlador.php";
	require_once "controllers/encuesta.controlador.php";
	require_once "controllers/materialRuta.controlador.php";
	require_once "controllers/inventarioMateriaprima.controlador.php";
	require_once "controllers/estandarAMB.controlador.php";
	require_once "controllers/laboratorio.controlador.php";
	require_once "controllers/RecepcionMaterial.controlador.php";
	require_once "controllers/numeroParteCliente.controlador.php";
	require_once "controllers/Formulaciones.controlador.php";
	require_once "controllers/backlog.controlador.php";
	


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
