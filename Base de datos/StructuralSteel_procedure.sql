use StructuralSteel_db;

drop procedure pr_Consulta_Trabajos;
DELIMITER //

CREATE PROCEDURE pr_Consulta_Trabajos()
BEGIN
	select job.fechaRegistro as 'P.O.', job_art.id_job as 'JOB ID', job_art.qty as 'QTY', job_art.id_pz as 'ID PZ', 
	pieza.descr as 'DESCRIPTION', profile_pieza.descr as 'PROFILE',
	pieza.lenght_pz as 'LENGHT', pieza.weight_pz AS 'W(LBS)',
	job_art.CL, job_art.HEAT, job_art.FU, job_art.QC, job_art.W,
	job_art.CLEAN, job_art.FINISH, job_art.DD, job_art.NOTE		
	FROM job_art
	INNER JOIN pieza on job_art.id_pz = pieza.id_pz
    INNER JOIN job on job.id_job = job_art.id_job
	INNER JOIN profile_pieza on profile_pieza.id_profile_pz = pieza.id_profile_pz;
END //

call pr_Consulta_Trabajos();