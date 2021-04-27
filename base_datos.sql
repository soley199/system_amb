CREATE DATABASE IF NOT EXISTS laravel_master;
USE laravel_master;

/**
 * Block material
 */

CREATE TABLE IF NOT EXISTS material(
	Id_Material    int(255) auto_increment not null,
	Material	   varchar(75),
CONSTRAINT pk_material PRIMARY KEY(Id_Material)
)ENGINE=InnoDb;

INSERT INTO material VALUES(null,'MATERIA PRIMA');
INSERT INTO material VALUES(null,'ZAPATA');
INSERT INTO material VALUES(null,'HARDWARE - ACCESORIOS');
INSERT INTO material VALUES(null,'COMPLEMENTIOS');
INSERT INTO material VALUES(null,'SHIM');
INSERT INTO material VALUES(null,'MOLDE');
INSERT INTO material VALUES(null,'TARJETA INGENIERÍA');

/**
 * END Block material
 */

 /**
 * Block apartado
 */

CREATE TABLE IF NOT EXISTS apartado(
	Id_Apartado    int(255) auto_increment not null,
	Apartado	   varchar(50),
CONSTRAINT pk_apartado PRIMARY KEY(Id_Apartado)
)ENGINE=InnoDb;

INSERT INTO apartado VALUES(null,'Operativos');
INSERT INTO apartado VALUES(null,'Administrativos');

/**
 * END Block material
 */

 /**
 * Block area
 */

CREATE TABLE IF NOT EXISTS area(
	Id_Area    int(255) auto_increment not null,
	Area	   varchar(75),
CONSTRAINT pk_area PRIMARY KEY(Id_Area)
)ENGINE=InnoDb;

INSERT INTO area VALUES(null,'FRENO DE DISCO');
INSERT INTO area VALUES(null,'ROLLO Y SEGMENTO');

/**
 * END Block area
 */

/**
 * Block dias_laborales
 */
CREATE TABLE IF NOT EXISTS dias_laborales(
	Id_Dias_Laborales    int(255) auto_increment not null,
	Dias_Laborales	   varchar(100),
CONSTRAINT pk_dias_laborales PRIMARY KEY(Id_Dias_Laborales)
)ENGINE=InnoDb;

INSERT INTO dias_laborales VALUES(null,'Lunes a Viernes');
INSERT INTO dias_laborales VALUES(null,'Lunes a Sabado');
 /**
 * END Block area
 */

/**
 * Block area
 */
CREATE TABLE IF NOT EXISTS formulaciones(
	Id_Formula     int(255) auto_increment not null,
	Formula	       varchar(255),
	G_Especifica   varchar(50),
	D_Gogan        varchar(50),
CONSTRAINT pk_dias_laborales PRIMARY KEY(Id_Formula)
)ENGINE=InnoDb;
/**
 * END Block dias_laborales
 */

 /**
 *  Block horario
 */
CREATE TABLE IF NOT EXISTS horario(
	Id_Horario      int(255) auto_increment not null,
	Hora_Entrada	time,
	Hora_Salida     time,
CONSTRAINT pk_horario PRIMARY KEY(Id_Horario)
)ENGINE=InnoDb;

INSERT INTO horario VALUES(null,'08:00:00','18:06:00');
INSERT INTO horario VALUES(null,'07:00:00','17:06:00');
INSERT INTO horario VALUES(null,'06:00:00','16:06:00');
INSERT INTO horario VALUES(null,'06:00:00','14:00:00');
INSERT INTO horario VALUES(null,'14:00:00','22:00:00');
INSERT INTO horario VALUES(null,'08:30:00','17:30:00');
INSERT INTO horario VALUES(null,'05:00:00','15:00:00');
INSERT INTO horario VALUES(null,'08:00:00','17:30:00');
INSERT INTO horario VALUES(null,'15:00:00','22:00:00');
/**
 * END Block horario
 */

/**
 * Block perfil_sistema
 */
CREATE TABLE IF NOT EXISTS perfil_sistema(
	Id_Perfil       int(255) auto_increment not null,
	Perfil	        varchar(100),
CONSTRAINT pk_perfil_sistema PRIMARY KEY(Id_Perfil)
)ENGINE=InnoDb;

INSERT INTO perfil_sistema VALUES(null,'Administrador');
INSERT INTO perfil_sistema VALUES(null,'Jefe Compras');
INSERT INTO perfil_sistema VALUES(null,'Recursos Humanos');
INSERT INTO perfil_sistema VALUES(null,'Jefe Producción');
INSERT INTO perfil_sistema VALUES(null,'Auxiliar Produccion');
INSERT INTO perfil_sistema VALUES(null,'Ingenieria de Producto');
INSERT INTO perfil_sistema VALUES(null,'Gestión Laboral y Medio Ambiente');
INSERT INTO perfil_sistema VALUES(null,'Comodin');
INSERT INTO perfil_sistema VALUES(null,'Laboratorio');
INSERT INTO perfil_sistema VALUES(null,'Auxiliar Ingeniería Producto');
INSERT INTO perfil_sistema VALUES(null,'Sistema Calidad');
INSERT INTO perfil_sistema VALUES(null,'Planeación');
INSERT INTO perfil_sistema VALUES(null,'Encargado Almacén Materia Prima');
INSERT INTO perfil_sistema VALUES(null,'Coordinador de Costos');
 /**
 *  END Block perfil_sistema
 */

/**
 * Block puesto
 */
CREATE TABLE IF NOT EXISTS puesto(
	Id_puesto       int(255) auto_increment not null,
	Puesto	        varchar(100),
CONSTRAINT pk_puesto PRIMARY KEY(Id_puesto)
)ENGINE=InnoDb;
/**
 * END Block puesto
 */

 /**
 *  Block tipo_prensado
 */
 CREATE TABLE IF NOT EXISTS tipo_prensado(
	Id_Tipo_Prensado       int(255) auto_increment not null,
	Tipo_Prensado	       varchar(50),
CONSTRAINT pk_tipo_prensado PRIMARY KEY(Id_Tipo_Prensado)
)ENGINE=InnoDb;

INSERT INTO perfil_sistema VALUES(null,'FLASH');
INSERT INTO perfil_sistema VALUES(null,'MOLDEO POSITIVO');
INSERT INTO perfil_sistema VALUES(null, 'N/A');
/**
 * END  Block tipo_prensado
 */

 /**
 *  Block unidad_medida
 */
 CREATE TABLE IF NOT EXISTS unidad_medida(
	Unidad_Medida       int(255) auto_increment not null,
	Tipo_Prensado	    varchar(100),
	Simbolo			    varchar(15),
CONSTRAINT pk_unidad_medida PRIMARY KEY(Id_Unidad_Medida)
)ENGINE=InnoDb;

INSERT INTO perfil_sistema VALUES(null,'FLASH');
INSERT INTO perfil_sistema VALUES(null,'MOLDEO POSITIVO');
INSERT INTO perfil_sistema VALUES(null, 'N/A');
/**
 * END  Block unidad_medida
 */

 /**
 *  Block unidad_medida
 */
CREATE TABLE IF NOT EXISTS estatus_global(
	Id_Estatus    int(255) auto_increment not null,
	Tabla	      varchar(75),
	Estatus       varchar(75),
	Descripcion   text
CONSTRAINT pk_estatus_global PRIMARY KEY(Id_Estatus)
)ENGINE=InnoDb;

INSERT INTO area VALUES(null,'FRENO DE DISCO');
INSERT INTO area VALUES(null,'ROLLO Y SEGMENTO');
/**
 * END Block unidad_medida
 */

 /**
 *  Block categoria_material
 */
CREATE TABLE IF NOT EXISTS categoria_material(
	Id_Categoria_Material  int(255) auto_increment not null,
	Categoria			   varchar(100),
	Id_Material		       int(255),
	Id_Estatus		       int(255),
CONSTRAINT pk_images PRIMARY KEY(Id_Categoria_Material),
CONSTRAINT fk_images_material FOREIGN KEY (Id_Material) REFERENCES users(Id_Categoria_Material),
CONSTRAINT fk_images_estatus_global FOREIGN KEY (Id_Estatus) REFERENCES estatus_global(Id_Categoria_Material)
)ENGINE=InnoDb;
/**
 * END Block categoria_material
 */

 /**
 *  Block cliente
 */
CREATE TABLE IF NOT EXISTS cliente(
	Id_Cliente         int(255) auto_increment not null,
	Cliente			   text,
	Id_Estatus		   int(255),
CONSTRAINT pk_images PRIMARY KEY(Id_Cliente),
CONSTRAINT fk_images_estatus_global FOREIGN KEY (Id_Estatus) REFERENCES estatus_global(Id_Cliente)
)ENGINE=InnoDb;
/**
 * END Block cliente
 */

 /**
 *  Block empleado
 */
CREATE TABLE IF NOT EXISTS empleado(
	Id_Empleado         int(255) auto_increment not null,
	Num_Tarjeta			text,
	Nombre              varchar(75), 
	Apellido            varchar(75),
	Sexo			    varchar(15),
	Fecha_Alta		    date,
	Antiguedad          varchar(75),
	Vacaciones          varchar(75),
	Id_Area             int(255),
	Id_Puesto 		    int(255),
	Id_Apartado 		int(255),
	Id_Dias_Laborales 	int(255),
	Id_Horario 		    int(255),
	Foto			    varchar(2550); 
	Id_Estatus		    int(255),
CONSTRAINT pk_images PRIMARY KEY(Id_Cliente),
CONSTRAINT fk_images_estatus_global FOREIGN KEY (Id_Area) REFERENCES estatus_global(Id_Cliente),
CONSTRAINT fk_images_estatus_global FOREIGN KEY (Id_Puesto) REFERENCES estatus_global(Id_Cliente),
CONSTRAINT fk_images_estatus_global FOREIGN KEY (Id_Apartado) REFERENCES estatus_global(Id_Cliente),
CONSTRAINT fk_images_estatus_global FOREIGN KEY (Id_Dias_Laborales) REFERENCES estatus_global(Id_Cliente),
CONSTRAINT fk_images_estatus_global FOREIGN KEY (Id_Horario) REFERENCES estatus_global(Id_Cliente),
CONSTRAINT fk_images_estatus_global FOREIGN KEY (Id_Estatus) REFERENCES estatus_global(Id_Cliente)
)ENGINE=InnoDb;
/**
 * END Block empleado
 */

















CREATE TABLE IF NOT EXISTS cliente(
	Id_Cliente    int(255) auto_increment not null,
	Cliente	      varchar(50),
	Id_Estatus    int(11),
CONSTRAINT pk_images PRIMARY KEY(Id_Apartado)
)ENGINE=InnoDb;

INSERT INTO area VALUES(null,'FRENO DE DISCO');
INSERT INTO area VALUES(null,'ROLLO Y SEGMENTO');













CREATE TABLE IF NOT EXISTS explocionMaterialPedido(
	id_explocionItems  int(255) auto_increment not null,
	user_id			   int(255),
	image_id		   int(255),
	content		       text,
	created_at		   datetime,	
	updated_at		   datetime,
CONSTRAINT pk_images PRIMARY KEY(id),
CONSTRAINT fk_images_users FOREIGN KEY (user_id) REFERENCES users(id),
CONSTRAINT fk_images_images FOREIGN KEY (image_id) REFERENCES images(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS nomenclatura_amb(
	Id_AMB  		 int(255) auto_increment not null,
	N_parte_AMB		 varchar(255),
	N_parte_FMSI	 varchar(255),
	ITEM		       text,
	Id_Material		   datetime,
CONSTRAINT pk_images PRIMARY KEY(id),
CONSTRAINT fk_images_users FOREIGN KEY (user_id) REFERENCES users(id),
CONSTRAINT fk_images_images FOREIGN KEY (image_id) REFERENCES images(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS estandarZapata(
	idEstandarZapata
	item
	nParteFMSI
	nParteAMB
	proveedorAprovado
	idInterna_1
	idInterna_2
	idInterna_3
	idInterna_4
	descripcion
	tipoZapata
)ENGINE=InnoDb;


