create database StructuralSteel_db;
use StructuralSteel_db;

create table tipo_usuario(
idTipo_usr		int primary key,
descr			varchar(25)
);

create table usuario(
id_usr		int primary key,
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

insert into tipo_usuario values (1, 'administrador');
insert into usuario values
(1, 'admin', 'admin', 'Perla', 'Abrego', 'Morales', 'perla@gmail.com',  '6641234567', 1);
select * from usuario;