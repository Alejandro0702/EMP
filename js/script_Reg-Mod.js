var form_reg = document.getElementById('form-registrar');
var form_mod = document.getElementById('form-modificar');
var reg = document.getElementById('tab-registrar');
var mod = document.getElementById('tab-modificar');
var btn_sel = document.getElementById('i_Seleccionar');

window.onload = function(){
    mod.addEventListener('click', Form_Mod);
    reg.addEventListener('click', Form_Reg);
    form_mod.style.display = 'none';
    btn_sel.style.display = 'none';
}
function Form_Reg(){
    form_reg.style.display = 'block';
    reg.className = 'nav-link active';
    form_mod.style.display = 'none';
    mod.className = 'nav-link';
    btn_sel.style.display = 'none';
}
function Form_Mod(){
    form_mod.style.display = 'block';
    mod.className = 'nav-link active';
    form_reg.style.display = 'none';
    reg.className = 'nav-link';
    btn_sel.style.display = 'block';
}