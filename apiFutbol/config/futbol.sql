drop database if exists futbol;
create database if not exists futbol;

use futbol;

create table equipo(
    codEquipo int auto_increment primary key,
    nombre varchar(50) not null,
    localidad varchar(50) not null
);


create table jugadores(
    codJugador int auto_increment primary key,
    nombre varchar(50) not null,
    posicion enum('delantero','medio','defensa'),
    sueldo int(6) not null,
    codEquipo int not null,
    foreign key (codEquipo) references equipo (codEquipo)
);

insert into equipo (nombre,localidad)values('Zamora','Zamora');
insert into equipo (nombre,localidad)values('Real Madrid','Madrid');
insert into equipo (nombre,localidad)values('Real Betis','Sevilla');

insert into jugadores (nombre,posicion,sueldo,codEquipo) values('Pepe Garcia','delantero',15000,1);
insert into jugadores (nombre,posicion,sueldo,codEquipo) values('Maria Fernandez','medio',10000,1);
insert into jugadores (nombre,posicion,sueldo,codEquipo) values('Santiago Garcia','defensa',12000,1);

insert into jugadores (nombre,posicion,sueldo,codEquipo) values('Karim Benzema','delantero',150000,2);
insert into jugadores (nombre,posicion,sueldo,codEquipo) values('Toni Kroos','medio',100000,2);
insert into jugadores (nombre,posicion,sueldo,codEquipo) values('David Alaba','defensa',120000,2);

insert into jugadores (nombre,posicion,sueldo,codEquipo) values('Juanmi Perez','delantero',110000,3);
insert into jugadores (nombre,posicion,sueldo,codEquipo) values('Juan Canales','medio',120000,3);
insert into jugadores (nombre,posicion,sueldo,codEquipo) values('Edgar Palacios','defensa',100000,3);