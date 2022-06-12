/*Creamos la BBDD*/
drop database if exists gestor;
create database gestor;

/*Decimos que vamos a usar esta BBDD*/
use gestor;

/*Creamos la tabla trabajadores.
Esta tabla será la que guarde los datos personales de los trabajadores */
create table TRABAJADOR(
	ID_TRABAJADOR int auto_increment primary key,
	NOMBRE varchar(50) not null ,
    APELLIDOS varchar(120) not null,
    DNI varchar(9) not null,
    EMAIL varchar(60) not null,
    USUARIO varchar(30) unique not null,
    CONTRASENA varbinary(32) not null,
    ESTADO varchar(30) not null
);

/*Creamos la tabla proyectos.
Esta tabla será la que guarde los datos de cada proyecto */
create table PROYECTO(
	ID_PROYECTO int auto_increment,
    NOMBRE varchar(50) not null,
    ESTADO varchar(20) not null,
    FECHA_INICIO date not null,
    FECHA_FIN date null,
    constraint PK_PROYECTOS primary key(ID_PROYECTO)
);

/*Creamos la tabla trabajador-proyecto
Esta tabla será la que guarde los proyectos que tenga asiganados cada trabajador */
create table TRABAJADOR_PROYECTO(
	ID_TRABAJADOR_PROYECTO int auto_increment primary key,
	ID_TRABAJADOR int not null,
    ID_PROYECTO int not null,
    FECHA_INICIO date not null,
    FECHA_FIN date null,
    constraint FK_TRABAJADORES foreign key(ID_TRABAJADOR) references TRABAJADOR(ID_TRABAJADOR),
    constraint FK_PROYECTOS foreign key(ID_PROYECTO) references PROYECTO(ID_PROYECTO)
);

/*Creamos la tabla tarea
Esta tabla será la que guarde las tareas que haya en todos los proyectos */

create table TAREA(
	ID_TAREA int auto_increment primary key,
    ID_PROYECTO int not null,
    FECHA_INICIO date not null,
    FECHA_FIN date not null,
    NOMBRE varchar(50) not null,
    DESCRIPCION varchar(150) not null,
    ESTADO varchar(20) not null,
    USUARIO varchar(20) not null,
    constraint PK_TAREA foreign key(ID_PROYECTO) references PROYECTO(ID_PROYECTO)
);

CREATE TABLE IF NOT EXISTS `TRABAJADOR_TAREA` (
  `ID_TRABAJADOR_TAREA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TRABAJADOR` int(11) NOT NULL,
  `ID_TAREA` int(11) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FIN` date DEFAULT NULL,
  PRIMARY KEY (`ID_TRABAJADOR_TAREA`),
  KEY `FK_TRABAJADOR` (`ID_TRABAJADOR`),
  KEY `FK_TAREAS` (`ID_TAREA`),
  CONSTRAINT `FK_TAREAS` FOREIGN KEY (`ID_TAREA`) REFERENCES `TAREA` (`ID_TAREA`),
  CONSTRAINT `FK_TRABAJADOR` FOREIGN KEY (`ID_TRABAJADOR`) REFERENCES `TRABAJADOR` (`ID_TRABAJADOR`)
);

/*
insert into trabajadores(nombre, apellidos, dni, usuario, contrasena) values('Manuel', 'García Díaz', '98989245A', 'manuelgd', aes_encrypt('contrasena2', 'root'));
select aes_decrypt(contrasena, 'root') from trabajadores;
*/
