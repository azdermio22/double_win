// let text = document.querySelector('.card_text');
// console.log(text.innerHTML.length);
// if (text.innerHTML.length > 116) {
//     text.innerHTML = text.innerHTML + '...';
// }

let passwords = document.querySelectorAll('.password');
let eyes = document.querySelectorAll('.eye');
eyes.forEach((eye, i)=> {
eye.addEventListener('click',()=>{
        if (passwords[i].type == 'text') {
            passwords[i].type= 'password';
            eye.innerHTML= '<i class="bi bi-eye-slash"></i>';
        }else{
            passwords[i].type= 'text';
            eye.innerHTML= '<i class="bi bi-eye"></i>';
        }   
    });
});

// register form
let btnr = document.querySelectorAll('.btnr');
let swich = document.querySelector('.btn_swich');
let register = document.querySelector('.register');

btnr[0].addEventListener('click',()=>{
    if (swich.style.animationName) {       
        swich.style.animationName = 'register_swich1';
        btnr[0].style.color= 'white';
        btnr[1].style.color= 'black';
        register.style.animationName = 'login1';
    }
});
btnr[1].addEventListener('click',()=>{
    swich.style.animationName = 'register_swich2';
    btnr[1].style.color= 'white';
    btnr[0].style.color= 'black';
    register.style.animationName = 'login2';
});

let labels = document.querySelectorAll('.register_label');
let inputs = document.querySelectorAll('.register_input');
let border = document.querySelectorAll('.input_border');


inputs.forEach((input, i)=> {
    input.addEventListener('focus',()=>{
        labels[i].style.animationName = 'register_input1';
        labels[i].style.color= 'blue';
        border[i].style.animationName = 'border1';
    });
    inputs = document.querySelectorAll('.register_input');
    input = inputs[i];    
        input.addEventListener('blur',()=>{
            inputs = document.querySelectorAll('.register_input')[i];
            if (inputs.value == "") {              
                labels[i].style.animationName = 'register_input2';
                labels[i].style.color= 'black';
                border[i].style.animationName = 'border2';
            }
        });
});
// end register form