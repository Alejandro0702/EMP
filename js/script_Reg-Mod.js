var form_reg = document.getElementById('form-registrar');
var form_mod = document.getElementById('form-modificar');
var mod = document.getElementById('tab-modificar');
var reg = document.getElementById('tab-registrar');
var btn_mod = document.getElementById('i_Modificar');

window.onload = function(){    
    mod.addEventListener('click', Form_Mod);
    reg.addEventListener('click', Form_Reg);    
    form_mod.style.display = 'none';
    btn_mod.style.display = 'none';
}

function Form_Mod(){
    form_mod.style.display = 'block';
    mod.className = 'nav-link active';
    form_reg.style.display = 'none';
    reg.className = 'nav-link';
    btn_mod.style.display = 'block';
}
function Form_Reg(){
    form_reg.style.display = 'block';
    reg.className = 'nav-link active';
    form_mod.style.display = 'none';
    mod.className = 'nav-link';
    btn_mod.style.display = 'none';
}