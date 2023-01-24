console.log('test')


const popScreen = document.querySelector('.modal');
const closebtn = document.querySelector('#pop-btn');

const q1 = document.querySelector('.q1');
const close_1 = document.querySelector('.pop-btn_1')

const q2 = document.querySelector('.q2');
const close_2 = document.querySelector('.pop-btn_2')

const q3 = document.querySelector('.q3');
const close_3 = document.querySelector('.pop-btn_3')

const q4 = document.querySelector('.q4');
const close_4 = document.querySelector('.pop-btn_4')

const bg = document.querySelector('.modal-container');

closebtn.addEventListener('click',()=>{
    popScreen.classList.add('active');
    //hours_display = window.localStorage.getItem('hours');
    
})

close_1.addEventListener('click',()=>{
    q1.classList.add('active');
})

close_2.addEventListener('click',()=>{
    q2.classList.add('active');
})

close_3.addEventListener('click',()=>{
    q3.classList.add('active');
})

close_4.addEventListener('click',()=>{
    q4.classList.add('active');
    bg.classList.add('active');
})

bg.add.classList('')