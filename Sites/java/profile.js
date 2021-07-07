
// modal

const ComprasButton = document.getElementById('compras_boton');
const modalBgCompras = document.getElementById('modal_bg_compras');
const modalCompras = document.getElementById('modal_compras');

ComprasButton.addEventListener('click',()=>{
    modalCompras.classList.add('is-active');
})

modalBgCompras.addEventListener('click',()=>{
    modalCompras.classList.remove('is-active');
})


const PassButton = document.getElementById('pass_boton');
const modalBgPass = document.getElementById('modal_bg_pass');
const modalPass = document.getElementById('modal_pass');



PassButton.addEventListener('click',()=>{
    modalPass.classList.add('is-active');
})

modalBgPass.addEventListener('click',()=>{
    modalPass.classList.remove('is-active');
})



const DirButton = document.getElementById('dir_boton');
const modalBg = document.getElementById('modal_bg_dir');
const modal = document.getElementById('modal_dir');


DirButton.addEventListener('click',()=>{
    modal.classList.add('is-active');
})

modalBg.addEventListener('click',()=>{
    modal.classList.remove('is-active');
})


const UniButton = document.getElementById('unidad_boton');
const modalBgUni = document.getElementById('modal_bg_unidad');
const modalUni = document.getElementById('modal_unidad');


UniButton.addEventListener('click',()=>{
    modalUni.classList.add('is-active');
})

modalBgUni.addEventListener('click',()=>{
    modalUni.classList.remove('is-active');
})

