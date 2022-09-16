/*Modelo*/
create database StructuralSteel_db;
use StructuralSteel_db;

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

create table profile_pieza(
id_profile_pz int primary key auto_increment,
descr	varchar(40)
);

create table pieza(
id_pz int primary key auto_increment,
descr	varchar(40),
lenght_pz	varchar(20),
weight_pz	varchar(20),
id_profile_pz int,
foreign key(id_profile_pz) references profile_pieza (id_profile_pz)
);

create table job(
id_job	int primary key auto_increment,
fechaRegistro	date
);

create table job_art(
id_job		int,
id_pz 		int,
qty			int,
CL 			varchar(30),
HEAT 		varchar(30),
FU 			varchar(30),
QC 			varchar(30),
W 			varchar(30),
CLEAN 		varchar(30),
FINISH 		varchar(30),
DD			date,/*fecha envio*/
NOTE		varchar(150),
foreign key(id_job) references job(id_job),
foreign key(id_pz) references pieza(id_pz)
);
