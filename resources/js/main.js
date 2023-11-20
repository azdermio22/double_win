let text = document.querySelector('.card_text');
if (text.innerHTML.length > 116) {
    text.innerHTML = text.innerHTML + '...';
}

// let passwords = document.querySelectorAll('.password');
// let eyes = document.querySelectorAll('.eye');
// eyes.forEach((eye, i)=> {
// eye.addEventListener('click',()=>{
//         if (passwords[i].type == 'text') {
//             passwords[i].type= 'password';
//             eye.innerHTML= '<i class="bi bi-eye-slash"></i>';
//         }else{
//             passwords[i].type= 'text';
//             eye.innerHTML= '<i class="bi bi-eye"></i>';
//         }   
//     });
// });

// // register form
// let btnr = document.querySelectorAll('.btnr');
// let swich = document.querySelector('.btn_swich');
// let register = document.querySelector('.register');
// let inputs = document.querySelectorAll('.register_input');
// let login = document.querySelector('.login');
// let form = document.querySelector('#form').value;

// console.log(form);

// if (form == 1) {
//     let login = document.querySelector('.login');
//     let register = document.querySelector('.register');
//     let swich = document.querySelector('.btn_swich');

//     swich.style.transform= 'translateX(100px)';
//     login.style.transform= 'translateX(0)';
//     register.style.transform= 'translateX(-100%)';
//     }

// btnr[0].addEventListener('click',()=>{
//     if (form == 1) {    
//         form = 0;   
//         swich.style.animationName = 'register_swich1';
//         btnr[0].style.color= 'white';
//         btnr[1].style.color= 'black';
//         register.style.animationName = 'register1';
//         login.style.animationName= 'login1';
//     }
// });
// btnr[1].addEventListener('click',()=>{
//     if (form == 0) {
//         form = 1;
//         swich.style.animationName = 'register_swich2';
//     btnr[1].style.color= 'white';
//     btnr[0].style.color= 'black';
//     register.style.animationName = 'register2';
//     login.style.animationName = 'login2';
//     }
// });

// let labels = document.querySelectorAll('.register_label');
// let border = document.querySelectorAll('.input_border');

// inputs.forEach((input, i)=> {
//     if (input.value != "") {
//         labels[i].style.transform='translateY(0)';
//         labels[i].style.color= 'blue';
//         border[i].style.animationName = 'border1';
//     }
//     input.addEventListener('focus',()=>{
//         labels[i].style.animationName = 'register_input1';
//         labels[i].style.color= 'blue';
//         border[i].style.animationName = 'border1';
//     });
//     inputs = document.querySelectorAll('.register_input');
//     input = inputs[i];    
//         input.addEventListener('blur',()=>{
//             inputs = document.querySelectorAll('.register_input')[i];
//             if (inputs.value == "") {              
//                 labels[i].style.animationName = 'register_input2';
//                 labels[i].style.color= 'black';
//                 border[i].style.animationName = 'border2';
//             }
//         });
// });
// end register form
// card carousel
let carousels = document.querySelectorAll('.card_carousel');
let cards = document.querySelectorAll('.card');
let card_row = document.querySelectorAll('.card_row');

carousels.forEach((carousel, i)=> { 
    let per = -100;
    let reset = 2;
    let mini = 0;
    let interval;
    let miniatures = cards[i].querySelectorAll('.img_miniature');
    let images = carousel.querySelectorAll('.image');
    cards[i].addEventListener('mouseover',()=>{
        interval = setInterval(() => {
            carousel.style.transform= `translateX(${per}%)`;
            miniatures[mini].style.border = '1px solid red';
            // miniatures[min].style.padding = '0';
            if (images[reset]) {    
                per -= 100;
                reset ++;
                mini++;
            }else{
                per = 0;
                reset = 1;
                mini = 0;
            }
        }, 3000);
    })
    cards[i].addEventListener('mouseout',()=>{
        clearInterval(interval);
        carousel.style.transform= 'translateX(0)';
    }) 
});