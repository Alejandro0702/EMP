use StructuralSteel_db;
/******PROCEDIMIENTO PARA GENERAR TRABAJO NUEVO******/
DELIMITER //
create procedure pr_Generar_Trabajo()
BEGIN
	insert into job values (null, curdate());
END //
/*CALL pr_Generar_Trabajo();*/
/***** INSERTAR PIEZA EN TRABAJO*****/
DELIMITER //
create procedure pr_Insertar_Piezas_Trabajo(
IN _id_job int(11),
IN _id_pz int(11),
IN _NOTE varchar(150)
)
BEGIN
insert into job_art values
	(null, _id_job, _id_pz, 1, null, null, '0', '0', '0', '0', '0', curdate(), _NOTE);
END //
/*CALL pr_Insertar_Piezas_Trabajo(2, 2, 1, null, 'S09896', null, null, null, null, 'NO PAINT', '2022-09-30', 'NOTA DESCRIPTIVA');*/

PENDIENTE MODIFICAR PIEZA******************
DELIMITER //
create procedure pr_Actualizar_Piezas_Trabajo(
IN _id_job_art int(11), 
IN _CL varchar(30), 
IN _HEAT varchar(30), 
IN _FU varchar(30),
IN _QC varchar(30),
IN _W varchar(30),
IN _CLEAN varchar(30),
IN _FINISH varchar(30)
)
BEGIN
	update job_art
    set
    CL = _CL, HEAT = _HEAT, FU = _FU, QC = _QC,
    W = _W, CLEAN = _CLEAN, FINISH = _FINISH 
    where id_job_art = _id_job_art;
END //

/*CALL pr_Actualizar_Piezas_Trabajo (10, 'ok', 'Marca', '50', '50', '50', '50', '50');*/

/******PROCEDIMIENTOS PARA MODIFICACIONES******/
/*PROCEDIMIENTO PARA MODIFICAR TIPOS DE USUARIO*/
DELIMITER //
CREATE PROCEDURE pr_Actualizar_TipoUsr(IN _id int, IN _descr varchar(25))
BEGIN
	update tipo_usuario set descr = _descr where idTipo_usr = _id;
END //
/*LLAMAR AL PROCEDIMIENTO*/
/*call pr_Actualizar_TipoUsr(1, 'Administrador');*/

/*PROCEDIMIENTO PARA MODIFICAR USUARIO*/
DELIMITER //
CREATE PROCEDURE pr_Actualizar_Usr(
	IN _id int,
    IN _nomb_usr varchar(30),
    IN _pswrd		varchar(15),
	IN _nombre		varchar(25),
	IN _apellidoPat	varchar(25),
	IN _apellidoMat	varchar(25),
	IN _correo		varchar(50),
	IN _numero 		varchar(15),
	IN _idTipo_usr	int
    )
BEGIN
	update usuario set 
    nomb_usr = _nomb_usr,
    pswrd = _pswrd,
    nombre = _nombre,
    apellidoPat = _apellidoPat,
    apellidoMat = _apellidoMat,
    correo = _correo,
    numero = _numero,
    idTipo_usr = _idTipo_usr
    where id_usr = _id;
END //
/*LLAMAR AL PROCEDIMIENTO*/
/*call pr_Actualizar_Usr(1, 'admin', 'admin', 'Perla', 'Abrego', 'Morales', 'correo@correo.com', '664664664', 1);*/

/*PROCEDIMIENTO PARA MODIFICAR TIPOS DE PIEZAS*/
DELIMITER //
CREATE PROCEDURE pr_Actualizar_ProfilePz(IN _id int, IN _descr varchar(40))
BEGIN
	update profile_pieza set descr = _descr where id_profile_pz = _id;
END //
/*LLAMAR AL PROCEDIMIENTO*/
/*call pr_Actualizar_ProfilePz(1, 'PL 1/8" x 10"');*/


/*PROCEDIMIENTO PARA MODIFICAR TIPOS DE PIEZAS*/
DELIMITER //
CREATE PROCEDURE pr_Actualizar_Pieza(
	_id_pz 			int,
	_descr			varchar(40),
	_lenght_pz		varchar(20),
	_weight_pz		varchar(20),
	_id_profile_pz 	int
)
BEGIN
	update pieza set
    descr = _descr,
    lenght_pz = _lenght_pz,
    weight_pz = _weight_pz,
    id_profile_pz = _id_profile_pz
    where id_pz = _id_pz;
END //
/*call pr_Actualizar_Pieza(1, 'TEMPLATEEE', '1\'-2"' , '5', 1);*/


/****** PROCEDIMIENTOS PARA ELIMINAR******/
/*PROCEDIMIENTO PARA ELIMINAR TRABAJOS*/
DELIMITER //
CREATE PROCEDURE pr_Eliminar_Trabajos(
	_id_job int
)
BEGIN
	delete from job where id_job = _id_job;
END //
/*CALL pr_Eliminar_Trabajos(1);*/

/*PROCEDIMIENTO PARA ELIMINAR PIEZAS DE TRABAJOS*/
DELIMITER //
CREATE PROCEDURE pr_Eliminar_Pz_Trab(
	_id_job int,
    _id_pz int
)
BEGIN
	delete from job_art where id_pz = _id_pz and id_job = _id_job;	
END //
/*CALL pr_Eliminar_Pz_Trab(1,3);*/


/******PROCEDIMIENTOS PARA CONSULTAS******/
/*TIPO DE USUARIO*/
/*CONSULTA DE TODOS LOS TIPOS DE USUARIO*/
DELIMITER //
CREATE PROCEDURE pr_Consultar_tipo_usuario()
BEGIN
	SELECT idTipo_usr as 'ID', descr as 'Descripcion' FROM tipo_usuario;
END //
/*CALL pr_Consultar_tipo_usuario();*/
/*CONSULTA DE UN TIPO DE USUARIO ESPECIFICO*/
DELIMITER //
CREATE PROCEDURE pr_Consultar_tipo_usuario_id(
	_id int
    )
BEGIN
	SELECT idTipo_usr as 'ID', descr as 'Descripcion' FROM tipo_usuario where idTipo_usr = _id;
END //
/*CALL pr_Consultar_tipo_usuario_id(1);*/


/*CONSULTA DE TODOS LOS USUARIOS*/
DELIMITER //
create procedure pr_Consultar_usuario()
BEGIN
	SELECT 
		id_usr as 'ID', nomb_usr as 'Usuario', pswrd as 'Contraseña',
        nombre as 'Nombre', apellidoPat as 'Apellido Paterno',
        apellidoMat as 'Apellido Materno', correo as 'Correo', numero as 'Teléfono',
        tipo_usuario.descr as 'Tipo de Usuario' FROM usuario
		INNER JOIN tipo_usuario on tipo_usuario.idTipo_usr = usuario.idTipo_usr
        order by usuario.id_usr asc;
END //
/*CALL pr_Consultar_usuario();*/

/*CONSULTA DE TODOS LOS USUARIOS POR ID*/
DELIMITER //
create procedure pr_Consultar_usuario_id(
	IN _id_usr int
)
BEGIN
	SELECT 
		id_usr as 'ID', nomb_usr as 'Usuario', pswrd as 'Contraseña',
        nombre as 'Nombre', apellidoPat as 'Apellido Paterno',
        apellidoMat as 'Apellido Materno', correo as 'Correo', numero as 'Teléfono',
        tipo_usuario.descr as 'Tipo de Usuario' FROM usuario
		INNER JOIN tipo_usuario on tipo_usuario.idTipo_usr = usuario.idTipo_usr
        WHERE id_usr = _id_usr
        order by usuario.id_usr asc;
END //
/*CALL pr_Consultar_usuario_id(1);*/

/* CONSULTA DE TODOS PROFILE - PIEZA */
DELIMITER //
create procedure pr_Consultar_profile_pieza()
BEGIN
	SELECT id_profile_pz as 'ID', descr as 'Descripcion' FROM profile_pieza;
END //
/*CALL pr_Consultar_profile_pieza();*/

/* CONSULTA DE PROFILE - PIEZA POR ID*/
DELIMITER //
create procedure pr_Consultar_profile_pieza_id(
	IN _id_profile_pz INT
)
BEGIN
	SELECT
		id_profile_pz as 'ID', descr as 'Descripcion'
		FROM profile_pieza
		WHERE id_profile_pz = _id_profile_pz;
END //
/*CALL pr_Consultar_profile_pieza_id(1);
CALL pr_Consultar_profile_pieza_id(2);
CALL pr_Consultar_profile_pieza_id(3);*/

/*CONSULTA DE PIEZAS*/
DELIMITER //
create procedure pr_Consultar_pieza()
BEGIN
	SELECT id_pz as 'ID', descr as 'Descripcion',
		lenght_pz as 'LENGHT', weight_pz as 'WEIGHT', id_profile_pz as 'PROFILE'
		FROM pieza;
END //
/*CALL pr_Consultar_pieza();*/

/*CONSULTA DE PIEZAS POR ID*/
DELIMITER //
create procedure pr_Consultar_pieza_id(
	IN _id_pz INT
)
BEGIN
	SELECT id_pz as 'ID', descr as 'Descripcion',
		lenght_pz as 'LENGHT', weight_pz as 'WEIGHT', id_profile_pz as 'PROFILE'
		FROM pieza
        WHERE id_pz = _id_pz;
END //
/*CALL pr_Consultar_pieza_id(1);
CALL pr_Consultar_pieza_id(2);
CALL pr_Consultar_pieza_id(3);*/

/*CREACION DE PROCEDIMIENTO PARA CONSULTA DE TODOS LOS TRABAJOS SIN DETALLES */
DELIMITER //
CREATE PROCEDURE pr_Consulta_Trabajos_sd()/*sin detalles*/
BEGIN
	select id_job as 'JOB ID', fechaRegistro as 'Fecha de registro' from job;
END //
/*CALL pr_Consulta_Trabajos_sd();*/

/*CREACION DE PROCEDIMIENTO PARA CONSULTA DE TODOS LOS TRABAJOS SIN DETALLES POR ID*/
DELIMITER //
CREATE PROCEDURE pr_Consulta_Trabajos_sd_id(
	IN _id int
)/*sin detalles*/
BEGIN
	select id_job as 'JOB ID', fechaRegistro as 'Fecha de registro' from job where id_job = _id;
END //

/*CREACION DE PROCEDIMIENTO PARA CONSULTA DE TODOS LOS TRABAJOS CON DETALLES*/
DELIMITER //
CREATE PROCEDURE pr_Consulta_Trabajos()
BEGIN
	select job_art.id_job_art as 'ID JOB-PZ', job.fechaRegistro as 'P.O.',
    job_art.id_job as 'JOB ID', job_art.qty as 'QTY', job_art.id_pz as 'ID PZ', 
	pieza.descr as 'DESCRIPTION', profile_pieza.descr as 'PROFILE',
	pieza.lenght_pz as 'LENGHT', pieza.weight_pz AS 'W(LBS)',
	job_art.CL, job_art.HEAT, job_art.FU, job_art.QC, job_art.W,
	job_art.CLEAN, job_art.FINISH, job_art.DD, job_art.NOTE		
	FROM job_art
	INNER JOIN pieza on job_art.id_pz = pieza.id_pz
    INNER JOIN job on job.id_job = job_art.id_job
	INNER JOIN profile_pieza on profile_pieza.id_profile_pz = pieza.id_profile_pz
    ORDER BY job_art.id_job ASC;
END //
/*CALL pr_Consulta_Trabajos();*/


/*PROCEDIMIENTO PARA CONSULTA DE TRABAJOS CON DETALLES POR ID DEL TRABAJO*/
DELIMITER //
CREATE PROCEDURE pr_Consulta_Trabajos_id(
	IN _id_job INT
)
BEGIN
	select job_art.id_job_art as 'ID JOB-PZ', job.fechaRegistro as 'P.O.', job_art.id_job as 'JOB ID', job_art.qty as 'QTY', job_art.id_pz as 'ID PZ', 
	pieza.descr as 'DESCRIPTION', profile_pieza.descr as 'PROFILE',
	pieza.lenght_pz as 'LENGHT', pieza.weight_pz AS 'W(LBS)',
	job_art.CL, job_art.HEAT, job_art.FU, job_art.QC, job_art.W,
	job_art.CLEAN, job_art.FINISH, job_art.DD, job_art.NOTE		
	FROM job_art
	INNER JOIN pieza on job_art.id_pz = pieza.id_pz
    INNER JOIN job on job.id_job = job_art.id_job
	INNER JOIN profile_pieza on profile_pieza.id_profile_pz = pieza.id_profile_pz
    WHERE job.id_job = _id_job
    ORDER BY job_art.id_job ASC;
END //
/*CALL pr_Consulta_Trabajos_id(1);*/


DELIMITER //
CREATE PROCEDURE pr_Consulta_Trabajos_id_pz(
	IN _id_job INT
)
BEGIN
	select job_art.id_job_art as 'ID JOB-PZ', job_art.id_job as 'JOB ID', job_art.id_pz as 'ID PZ', 
	pieza.descr as 'DESCRIPTION', profile_pieza.descr as 'PROFILE',
	pieza.lenght_pz as 'LENGHT', pieza.weight_pz AS 'W(LBS)',
	job_art.CL, job_art.HEAT, job_art.FU, job_art.QC, job_art.W,
	job_art.CLEAN, job_art.FINISH, job_art.DD, job_art.NOTE		
	FROM job_art
	INNER JOIN pieza on job_art.id_pz = pieza.id_pz
    INNER JOIN job on job.id_job = job_art.id_job
	INNER JOIN profile_pieza on profile_pieza.id_profile_pz = pieza.id_profile_pz
    WHERE job.id_job = _id_job
    ORDER BY job_art.id_job ASC;
END //
/*CALL pr_Consulta_Trabajos_id_pz(1);*/
