const NCButton = document.getElementById('no_com_btn');
const modalBgNC = document.getElementById('modal_bg_no_com');
const modalNC = document.getElementById('modal_no_com');
const modalBtNC = document.getElementById('modal_bt_no_com');

NCButton.addEventListener('click',()=>{
    modalNC.classList.add('is-active');
})

modalBgNC.addEventListener('click',()=>{
    modalNC.classList.remove('is-active');
})
modalBtNC.addEventListener('click',()=>{
    modalNC.classList.remove('is-active');
})

const CButton = document.getElementById('com_btn');
const modalBgC = document.getElementById('modal_bg_com');
const modalC = document.getElementById('modal_com');
const modalBtC = document.getElementById('modal_bt_com');

CButton.addEventListener('click',()=>{
    modalC.classList.add('is-active');
})

modalBgC.addEventListener('click',()=>{
    modalC.classList.remove('is-active');
})

modalBtC.addEventListener('click',()=>{
    modalC.classList.remove('is-active');
})



const BuscarButton = document.getElementById('buscar_btn');
const modalBgBuscar = document.getElementById('modal_bg_buscar');
const modalBuscar = document.getElementById('modal_buscar');
const modalBtBuscar = document.getElementById('modal_bt_buscar');

BuscarButton.addEventListener('click',()=>{
    modalBuscar.classList.add('is-active');
})

modalBgBuscar.addEventListener('click',()=>{
    modalBuscar.classList.remove('is-active');
})
modalBtBuscar.addEventListener('click',()=>{
    modalBuscar.classList.remove('is-active');
})