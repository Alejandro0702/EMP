create database StructuralSteel_db;
use StructuralSteel_db;

drop database StructuralSteel_db;

create table tipo_usuario(
idTipo_usr		int primary key auto_increment,
descr			varchar(25) unique
);

create table usuario(
id_usr		int primary key auto_increment,
nomb_usr	varchar(30) unique not null,
pswrd		varchar(15) not null,
nombre		varchar(25),
apellidoPat	varchar(25),
apellidoMat	varchar(25),
correo		varchar(50),
numero 		varchar(15),
idTipo_usr	int,
foreign key(idTipo_usr) references tipo_usuario(idTipo_usr)
);

insert into tipo_usuario values (null, 'administrador');
select* from tipo_usuario;
insert into usuario values
(null, 'admin', 'admin', 'Perla', 'Abrego', 'Morales', 'perla@gmail.com',  '6641234567', 1);
select * from usuario;