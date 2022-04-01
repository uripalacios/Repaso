drop database alumnos if exists;
create database alumnos if not exists;

use alumnos;

create table alumno(id int auto_increment primary key,nombre varchar(50),tel int(9),media float,fecha_nacimiento date);

insert into alumno values(id,"Pepe",655895869,5.60,2020-01-15);
insert into alumno values(id,"Juan",666777444,8.30,2019-07-25);
