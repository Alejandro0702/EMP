var form_reg = document.getElementById('form-registrar');
var form_mod = document.getElementById('form-modificar');
var form_det = document.getElementById('form-detalles');

var mod = document.getElementById('tab-modificar');
var reg = document.getElementById('tab-registrar');
var det = document.getElementById('tab-detalles');

var btn_mod = document.getElementById('i_Seleccionar');

window.onload = function(){
    mod.addEventListener('click', Form_Mod);
    reg.addEventListener('click', Form_Reg);
    det.addEventListener('click', Form_Det);    
    form_mod.style.display = 'none';
    btn_mod.style.display = 'none';
}

function Form_Mod(){
    form_mod.style.display = 'block';
    mod.className = 'nav-link active';
    reg.className = 'nav-link';
    det.className = 'nav-link';

    form_reg.style.display = 'none';
    form_det.style.display = 'none';
    btn_mod.style.display = 'block';
}
function Form_Reg(){
    form_reg.style.display = 'block';
    form_mod.style.display = 'none';
    form_det.style.display = 'none';
    reg.className = 'nav-link active';
    det.className = 'nav-link';
    mod.className = 'nav-link';
    
    btn_mod.style.display = 'none';
}
function Form_Det(){
    form_reg.style.display = 'none';
    form_mod.style.display = 'none';
    form_det.style.display = 'block';
    reg.className = 'nav-link';
    det.className = 'nav-link active';
    mod.className = 'nav-link';
}