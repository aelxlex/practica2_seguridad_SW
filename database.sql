create database seguridad_web;

use seguridad_web;

create table usuarios(id int(10) auto_increment, usuario varchar(50) not null, password varchar(50) not null, primary key(id));
