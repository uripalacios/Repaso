create database tienda;
use tienda;

create table perfil (
	codigo char(5) primary key,
	descripcion varchar(30)
) engine=innodb;

create table usuarios (
	usuario char(20) primary key,
	clave char(40) not null,
	email varchar(75) not null,
	fecha_nacimiento date not null,
	perfil char(5) not null,
	foreign key (perfil) references perfil (codigo)
) engine=innodb;

create table paginas (
	codigo char(5) primary key,
	descripcion varchar(50),
	url varchar(75) not null
) engine=innodb;

create table accede (
	codigoPerfil char(5) not null,
	codigoPagina char(5) not null,
	primary key (codigoPerfil,codigoPagina),
	foreign key (codigoPerfil) references perfil (codigo),
	foreign key (codigoPagina) references paginas (codigo)
) engine=innodb;

create table producto{
	cod_producto varchar(6) primary key,
	descripcion varchar(100),
	precio float(9) not null,
	stock int(7) not null
}
 create table venta(
	id int auto_increment primary key,
	usuario char(20) not null,
	fecha_compra date default getdate(),
	cod_producto varchar(6) not null,
	cantidad int(6) not null,
	precio_total float(9) not null,
	foreign key (cod_producto) references producto (cod_producto),
	foreign key (usuario) references usuarios (usuario)
 )engine=innodb;
 
create table albaran(
	id int auto_increment primary key,
	fecha_albaran date not null,
	cod_producto varchar(6) not null,
	cantidad int(6) not null,
	usuario char(20) not null,
	foreign key (cod_producto) references producto (cod_producto),
	foreign key (usuario) references usuarios (usuario)
)engine=innodb;

insert into perfil (codigo, descripcion) values ('ADM01','Administrador');
insert into perfil (codigo, descripcion) values ('MOD01','Moderador');
insert into perfil (codigo, descripcion) values ('U0001','Usuario');

insert into usuarios (usuario,clave, nombre, email,perfil,fecha_nacimiento) values ('u1','356a192b7913b04c54574d18c28d46e6395428ab','aga@correo.es','ADM01',2000-01-01);
insert into usuarios (usuario,clave, nombre, email,perfil,fecha_nacimiento) values ('u2','da4b9237bacccdf19c0760cab7aec4a8359010b0','jgc@correo.es','MOD01',1996-05-10);
insert into usuarios (usuario,clave, nombre, email,perfil,fecha_nacimiento) values ('u3','77de68daecd823babbb58edb1c8e14d7106e83bb','lrg@correo.es','U0001',1999-04-05);

insert into paginas (codigo,descripcion,url) values ('PAG01','Login','login.php');
insert into paginas (codigo,descripcion,url) values ('PAG02','Logout','logout.php');
insert into paginas (codigo,descripcion,url) values ('PAG03','Alta','alta.php');
insert into paginas (codigo,descripcion,url) values ('PAG04','Perfil','perfil.php');
insert into paginas (codigo,descripcion,url) values ('PAG05','Productos','productos.php');
insert into paginas (codigo,descripcion,url) values ('PAG06','Insertar Producto','insertarProducto.php');
insert into paginas (codigo,descripcion,url) values ('PAG07','Modificar Producto','modificarProducto.php');
insert into paginas (codigo,descripcion,url) values ('PAG08','Ver Ventas','verVentas.php');
insert into paginas (codigo,descripcion,url) values ('PAG09','Ver Albaran','verAlbaran.php');
insert into paginas (codigo,descripcion,url) values ('PAG10','Modificar Ventas','modificarVentas.php');
insert into paginas (codigo,descripcion,url) values ('PAG11','Modificar Albaran','modificarAlbaran.php');

insert into accede (codigoPerfil,codigoPagina) values ('ADM01','PAG06');
insert into accede (codigoPerfil,codigoPagina) values ('ADM01','PAG07');
insert into accede (codigoPerfil,codigoPagina) values ('ADM01','PAG08');
insert into accede (codigoPerfil,codigoPagina) values ('ADM01','PAG09');
insert into accede (codigoPerfil,codigoPagina) values ('ADM01','PAG10');
insert into accede (codigoPerfil,codigoPagina) values ('ADM01','PAG11');
insert into accede (codigoPerfil,codigoPagina) values ('MOD01','PAG06');
insert into accede (codigoPerfil,codigoPagina) values ('MOD01','PAG08');
insert into accede (codigoPerfil,codigoPagina) values ('MOD01','PAG09');




