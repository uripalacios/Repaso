drop database if exists futbol;
create database if not exists futbol;

use futbol;

create table equipo(
    codEquipo int autoincrement primary key,
    nombre varchar(50) not null,
    localidad varchar(50) not null
);


create table jugadores(
    codJugador int autoincrement primary key,
    nombre varchar(50) not null,
    posicion enum('delantero','medio','defensa'),
    sueldo int(6) not null,
    codEquipo int not null,
    foreign key (codEquipo) references equipo (codEquipo)
);