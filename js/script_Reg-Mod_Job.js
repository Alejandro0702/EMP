var form_reg = document.getElementById('form-registrar');
var form_mod = document.getElementById('form-modificar');
var form_det = document.getElementById('form-detalles');
var form_ana = document.getElementById('form-anadir');

var reg = document.getElementById('tab-registrar');
var mod = document.getElementById('tab-modificar');
var det = document.getElementById('tab-detalles');
var ana = document.getElementById('tab-anadir');

var tabla_jobs = document.getElementById('tabla-jobs');
var tabla_det = document.getElementById('tabla-trabajos-det');

var btn_sel = document.getElementById('i_Seleccionar');

window.onload = function(){
    mod.addEventListener('click', Form_Mod);
    reg.addEventListener('click', Form_Reg);
    det.addEventListener('click', Form_Det);
    ana.addEventListener('click', Form_Ana);
    form_mod.style.display = 'none';
    form_det.style.display = 'none';
    form_ana.style.display = 'none';
    tabla_jobs.style.display = 'block';
    tabla_det.style.display = 'none';
    btn_sel.style.display = 'none';
}
function Form_Reg(){
    form_reg.style.display = 'block';
    reg.className = 'nav-link active';

    form_mod.style.display = 'none';
    form_det.style.display = 'none';
    form_ana.style.display = 'none';
    det.className = 'nav-link';
    mod.className = 'nav-link';
    ana.className = 'nav-link';
    btn_sel.style.display = 'none';
    tabla_jobs.style.display = 'block';
    tabla_det.style.display = 'none';
}
function Form_Ana(){
    form_ana.style.display = 'block';
    ana.className = 'nav-link active';

    form_reg.style.display = 'none';
    form_mod.style.display = 'none';
    form_det.style.display = 'none';
    reg.className = 'nav-link';
    det.className = 'nav-link';
    mod.className = 'nav-link';
    btn_sel.style.display = 'none';

    tabla_jobs.style.display = 'none';
    tabla_det.style.display = 'none';
}
function Form_Mod(){
    form_mod.style.display = 'block';
    mod.className = 'nav-link active';

    form_reg.style.display = 'none';
    form_det.style.display = 'none';
    form_ana.style.display = 'none';
    reg.className = 'nav-link';
    det.className = 'nav-link';
    ana.className = 'nav-link';
    btn_sel.style.display = 'block';
    tabla_jobs.style.display = 'none';//Activa la tabla con detalle de todos los trabajos
    tabla_det.style.display = 'none';
}

function Form_Det(){
    form_det.style.display = 'block';
    det.className = 'nav-link active';

    form_reg.style.display = 'none';
    form_mod.style.display = 'none';
    form_ana.style.display = 'none';
    reg.className = 'nav-link';
    mod.className = 'nav-link';
    ana.className = 'nav-link';
    btn_sel.style.display = 'none';
    tabla_jobs.style.display = 'none';
    tabla_det.style.display = 'block';
}
