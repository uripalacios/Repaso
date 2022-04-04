drop database if exists clase;
create database if not exists clase;

use clase;

create table alumno(id int auto_increment primary key,nombre varchar(50),tel int(9),media float,fecha_nacimiento date);

insert into alumno values(id,"Pepe",655895869,5.60,str_to_date('2000-01-15','%Y-%m-%d'));
insert into alumno values(id,"Juan",666777444,8.30,str_to_date('1999-07-25','%Y-%m-%d'));
