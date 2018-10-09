/*
SQLyog Community v11.1 (32 bit)
MySQL - 5.7.17-log : Database - ventas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ventas` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ventas`;

/*Table structure for table `access` */

CREATE TABLE `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_aplicacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=322 DEFAULT CHARSET=latin1;

/*Data for the table `access` */

insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (34,1,35);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (33,1,6);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (32,1,7);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (31,1,3);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (30,1,2);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (29,1,1);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (28,1,9);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (27,1,4);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (44,1,46);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (318,2,3);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (317,2,2);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (316,2,1);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (315,2,15);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (314,2,9);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (313,2,4);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (319,2,87);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (320,2,86);
insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (321,2,88);

/*Table structure for table `applications` */

CREATE TABLE `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `ruta` varchar(200) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

/*Data for the table `applications` */

insert  into `applications`(`id`,`nombre`,`ruta`,`estado`,`tipo`,`category`) values (1,'Mantenedor Menu','APP_ADM_MENU','ON','ADM',4);
insert  into `applications`(`id`,`nombre`,`ruta`,`estado`,`tipo`,`category`) values (2,'Mantenedor Usuarios','APP_ADM_USERS','ON','ADM',3);
insert  into `applications`(`id`,`nombre`,`ruta`,`estado`,`tipo`,`category`) values (3,'Mantenedor de Permisos User/Aplicacion','APP_ADM_USER_APPLICATION','ON','ADM',4);
insert  into `applications`(`id`,`nombre`,`ruta`,`estado`,`tipo`,`category`) values (4,'Mantenedor Aplicaciones','APP_ADM_APPLICATIONS','ON','ADM',4);
insert  into `applications`(`id`,`nombre`,`ruta`,`estado`,`tipo`,`category`) values (6,'Perfil ','APP_USER_PROFILE','ON','ALL',4);
insert  into `applications`(`id`,`nombre`,`ruta`,`estado`,`tipo`,`category`) values (7,'Configuracion','APP_USER_CONFIGURATION','ON','ALL',4);
insert  into `applications`(`id`,`nombre`,`ruta`,`estado`,`tipo`,`category`) values (9,'Mantenedor de Permisos Aplicacion/User','APP_ADM_APPLICATION_USER','ON','ADM',4);
insert  into `applications`(`id`,`nombre`,`ruta`,`estado`,`tipo`,`category`) values (15,'Categorias','APP_ADM_CATEGORY','ON','ADM',4);
insert  into `applications`(`id`,`nombre`,`ruta`,`estado`,`tipo`,`category`) values (35,'Proyectos','APP_USER_PROYECTOS','ON','USER',5);
insert  into `applications`(`id`,`nombre`,`ruta`,`estado`,`tipo`,`category`) values (46,'Estado de Resultado (EERR)','APP_USER_EERR','ON','USER',5);
insert  into `applications`(`id`,`nombre`,`ruta`,`estado`,`tipo`,`category`) values (86,'Lineas','APP_USER_LINEAS','ON','USER',3);
insert  into `applications`(`id`,`nombre`,`ruta`,`estado`,`tipo`,`category`) values (87,'Departamentos','APP_USER_DEPARTAMENTOS','ON','USER',3);
insert  into `applications`(`id`,`nombre`,`ruta`,`estado`,`tipo`,`category`) values (88,'Sucursales','APP_USER_SUCURSALES','ON','USER',3);

/*Table structure for table `category` */

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id`,`nombre`,`estado`) values (1,'Reportes Vendedores',1);
insert  into `category`(`id`,`nombre`,`estado`) values (2,'Reportes Funcionarios',1);
insert  into `category`(`id`,`nombre`,`estado`) values (3,'Mantenedores',1);
insert  into `category`(`id`,`nombre`,`estado`) values (4,'Plataforma ',1);
insert  into `category`(`id`,`nombre`,`estado`) values (6,'Pizarra',1);

/*Table structure for table `departamentos` */

CREATE TABLE `departamentos` (
  `cod_depto` varchar(20) NOT NULL,
  `depto` varchar(100) NOT NULL,
  `linea` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod_depto`),
  KEY `cod_linea` (`linea`),
  CONSTRAINT `cod_linea` FOREIGN KEY (`linea`) REFERENCES `lineas` (`cod_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `departamentos` */

insert  into `departamentos`(`cod_depto`,`depto`,`linea`) values ('D101','TV Video','503474');
insert  into `departamentos`(`cod_depto`,`depto`,`linea`) values ('D102','Audio','503474');
insert  into `departamentos`(`cod_depto`,`depto`,`linea`) values ('D103','Celulares','503474');
insert  into `departamentos`(`cod_depto`,`depto`,`linea`) values ('D104','Ropa Deportiva','500788');
insert  into `departamentos`(`cod_depto`,`depto`,`linea`) values ('D108','Blusas','500788');
insert  into `departamentos`(`cod_depto`,`depto`,`linea`) values ('D109','Jeans','500788');

/*Table structure for table `lineas` */

CREATE TABLE `lineas` (
  `cod_linea` varchar(20) NOT NULL,
  `linea` varchar(100) NOT NULL,
  `sucursal` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod_linea`),
  KEY `cod_susursal` (`sucursal`),
  CONSTRAINT `cod_susursal` FOREIGN KEY (`sucursal`) REFERENCES `sucursales` (`cod_sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `lineas` */

insert  into `lineas`(`cod_linea`,`linea`,`sucursal`) values ('500788','Mujer','100');
insert  into `lineas`(`cod_linea`,`linea`,`sucursal`) values ('503474','Electro','104');

/*Table structure for table `menu` */

CREATE TABLE `menu` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `idpadre` int(4) DEFAULT NULL,
  `permisos` int(4) DEFAULT NULL,
  `aplicacion` varchar(30) DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  `ubicacion` int(10) NOT NULL,
  `posicion` int(10) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=348 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (322,'Categorías',9,3,'15','ON',2,0,'Categorías');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (43,'Permisos Aplicación/Users',9,3,'9','ON',2,0,'Permisos Aplicación/Users');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (9,'Plataforma',0,3,'0','ON',2,0,'Plataforma');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (129,'Menú',9,3,'1','ON',2,0,'Menú');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (14,'Permisos User/Aplicación',9,1,'3','ON',2,0,'Permisos User/Aplicación');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (37,'Mantenedores',0,3,'0','ON',2,0,'Mantenedores');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (147,'Cuenta de Usuario',0,1,'0','ON',3,0,'Cuenta de Usuario');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (148,'Perfil',147,1,'6','ON',3,0,'Perfil');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (149,'Configuración',147,1,'7','ON',3,0,'Configuración');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (319,'Aplicaciones',9,3,'4','ON',2,0,'Aplicaciones');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (320,'Estado de Resultado',0,1,'46','ON',1,0,'Estado de Resultado');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (323,'Cotizador',0,1,'0','ON',1,0,'Cotizador');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (344,'Usuarios',9,3,'2','ON',1,0,'Usuarios');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (345,'Sucursales',37,3,'88','ON',1,0,'Sucursales');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (346,'Línea',37,3,'86','ON',1,0,'Línea');
insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (347,'Departamentos',37,3,'87','ON',1,0,'Departamentos');

/*Table structure for table `productos` */

CREATE TABLE `productos` (
  `cod_producto` varchar(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `ordenado` int(11) DEFAULT NULL,
  `sucursal` varchar(20) DEFAULT NULL,
  `linea` varchar(20) DEFAULT NULL,
  `depto` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod_producto`),
  KEY `prod_linea` (`linea`),
  KEY `prod_depto` (`depto`),
  KEY `prod_sucursal` (`sucursal`),
  CONSTRAINT `prod_depto` FOREIGN KEY (`depto`) REFERENCES `departamentos` (`cod_depto`),
  CONSTRAINT `prod_linea` FOREIGN KEY (`linea`) REFERENCES `lineas` (`cod_linea`),
  CONSTRAINT `prod_sucursal` FOREIGN KEY (`sucursal`) REFERENCES `sucursales` (`cod_sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `productos` */

/*Table structure for table `sucursales` */

CREATE TABLE `sucursales` (
  `cod_sucursal` varchar(20) NOT NULL,
  `sucursal` varchar(255) NOT NULL,
  PRIMARY KEY (`cod_sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sucursales` */

insert  into `sucursales`(`cod_sucursal`,`sucursal`) values ('100','Huerfanos');
insert  into `sucursales`(`cod_sucursal`,`sucursal`) values ('104','Temuco');
insert  into `sucursales`(`cod_sucursal`,`sucursal`) values ('107','Los Dominicos');
insert  into `sucursales`(`cod_sucursal`,`sucursal`) values ('109','Concepcion');
insert  into `sucursales`(`cod_sucursal`,`sucursal`) values ('110','Los Andes');
insert  into `sucursales`(`cod_sucursal`,`sucursal`) values ('111','Concepcion 2');
insert  into `sucursales`(`cod_sucursal`,`sucursal`) values ('112','Parque Arauco');
insert  into `sucursales`(`cod_sucursal`,`sucursal`) values ('114','Puerto Montt');
insert  into `sucursales`(`cod_sucursal`,`sucursal`) values ('116','Plaza Vespucio');
insert  into `sucursales`(`cod_sucursal`,`sucursal`) values ('117','Astor');
insert  into `sucursales`(`cod_sucursal`,`sucursal`) values ('118','Puente');
insert  into `sucursales`(`cod_sucursal`,`sucursal`) values ('119','Crillon');
insert  into `sucursales`(`cod_sucursal`,`sucursal`) values ('122','Chillan');

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `forename` varchar(100) DEFAULT NULL,
  `paternal` varchar(1000) NOT NULL,
  `maternal` varchar(1000) NOT NULL,
  `cellphone` varchar(18) DEFAULT NULL,
  `permits` int(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `business` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`user`,`pass`,`forename`,`paternal`,`maternal`,`cellphone`,`permits`,`email`,`status`,`business`) values (1,'cvidal','123456.*','Camila','Vidal','T','967170092',3,'cami.vidal@hotmail.com','OFF','www.camividal.com');
insert  into `users`(`id`,`user`,`pass`,`forename`,`paternal`,`maternal`,`cellphone`,`permits`,`email`,`status`,`business`) values (2,'test','123456.*','Test','Demo','Demo','976778827',3,'a@a.cl','ON','a.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
