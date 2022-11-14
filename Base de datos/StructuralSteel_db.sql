drop database StructuralSteel_db;
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
id_profile_pz varchar(8) primary key,
descr	varchar(40)
);

create table pieza(
id_pz int primary key auto_increment,
lenght_pz	varchar(20),
weight_pz	varchar(20),
id_profile_pz varchar(8),
foreign key(id_profile_pz) references profile_pieza (id_profile_pz)
);

create table job(
id_job	int primary key auto_increment,
fechaRegistro	date
);


create table job_art(
id_job_art	int primary key auto_increment,
id_job		int,
id_pz 		int,
qty			int,
descr	varchar(40),
CL 			varchar(30),
HEAT 		varchar(30),
FU 			varchar(30),
QC 			varchar(30),
W 			varchar(30),
CLEAN 		varchar(30),
FINISH 		varchar(30),
DD			date,/*fecha envio*/
NOTE		varchar(150),
foreign key(id_job) references job(id_job) ON DELETE CASCADE,
foreign key(id_pz) references pieza(id_pz)
);


/********REGISTROS********/

/*TIPOS DE USUARIO*/
insert into tipo_usuario values
(null, 'Administrador'),
(null, 'Gerente'),
(null, 'Control de Calidad');

/*USUARIOS*/
insert into usuario values
(null, 'admin', 'admin', 'Perla', 'Abrego', 'Morales', 'perla@gmail.com',  '6641234567', 1);

/*TIPOS DE PIEZAS*/
insert into profile_pieza values
('1A', 'PL 1/8" x 10"'),
('2A', 'PL 1/8" x 12"'),
('3A', 'PL 1/8" x 19"'),
('4A', 'PL 1/8" x 22"');

/*PIEZAS
DUDA *TEMPLATE*/
insert into pieza values 
(null, '1''-2"', '5', '1A'),
(null, '1''-0"', '5', '2A'),
(null, '1''-0"', '5', '2A'),
(null, '1''-8"', '13', '3A'),
(null, '2''-8"', '25', '4A'),
(null, '3''-0"', '28', '4A');

/*REGISTRO DE UN TRABAJO*/
insert into job values (null, curdate());
select * from job;

/*REGISTRAR PIEZAS EN TRABAJOS*/
select * from pieza;
insert into job_art values
(null, 1, 2, 1, 'TEMPLATE' ,'ok', 'S09896', '0', '0', '0', '0', 'NO PAINT', '2022-09-30', 'NOTA DESCRIPTIVA'),
(null, 1, 2, 1,  'TEMPLATE' ,'ok', 'S09896', '0', '0', '0', '0', 'NO PAINT', '2022-09-30', 'NOTA DESCRIPTIVA'),
(null, 1, 3, 1,  'TEMPLATE','ok', 'S09896', '0', '0', '0', '0', 'NO PAINT', '2022-09-30', 'NOTA DESCRIPTIVA'),
(null, 1, 3, 1,  'TEMPLATE','ok', 'S09896', '0', '0', '0', '0', 'NO PAINT', '2022-09-30', 'NOTA DESCRIPTIVA'),
(null, 1, 3, 1,  'TEMPLATE','ok', 'S09896', '0', '0', '0', '0', 'NO PAINT', '2022-09-30', 'NOTA DESCRIPTIVA'),
(null, 1, 3, 1,  'TEMPLATE','ok', 'S09896', '0', '0', '0', '0', 'NO PAINT', '2022-09-30', 'NOTA DESCRIPTIVA'),
(null, 1, 3, 1,  'TEMPLATE','ok', 'S09896', '0', '0', '0', '0', 'NO PAINT', '2022-09-30', 'NOTA DESCRIPTIVA'),
(null, 1, 4, 1,  'TEMPLATE','ok', 'S09896', '0', '0', '0', '0', 'NO PAINT', '2022-09-30', 'NOTA DESCRIPTIVA'),
(null, 1, 4, 1,  'TEMPLATE','ok', 'S09896', '0', '0', '0', '0', 'NO PAINT', '2022-09-30', 'NOTA DESCRIPTIVA'),
(null, 1, 5, 1,  'TEMPLATE','ok', 'S09896', '0', '0', '0', '0', 'NO PAINT', '2022-09-30', 'NOTA DESCRIPTIVA'),
(null, 1, 6, 1,  'TEMPLATE','ok', 'S09896', '0', '0', '0', '0', 'NO PAINT', '2022-09-30', 'NOTA DESCRIPTIVA'),
(null, 1, 6, 1,  'TEMPLATE','ok', 'S09896', '0', '0', '0', '0', 'NO PAINT', '2022-09-30', 'NOTA DESCRIPTIVA');

