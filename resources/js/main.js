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
let triger = document.querySelector('.triger');

carousels.forEach((carousel, i)=> { 
    let per = -100;
    let reset = 2;
    let mini = 1;
    let interval;
    let counter = 0;
    let miniatures_containers = cards[i].querySelectorAll('.img_miniature_container');
    let images = carousel.querySelectorAll('.image');
    let img_miniatures = cards[i].querySelectorAll('.img_miniature');

    img_miniatures.forEach((img_miniature, i)=> {
        img_miniature.addEventListener('click',()=>{ 
                per = -100 * i;
                reset = 1 + i;
                mini = 0 + i;
             console.log(per);
             console.log(reset);
             console.log(mini);
             miniatures_containers.forEach((miniature)=> {
                miniature.style.border = 'none';
                miniature.style.padding = '1px';
            });
            miniatures_containers[i].style.border = '2px solid red';
            miniatures_containers[i].style.padding = '0';
            carousel.style.transform= `translateX(${per}%)`;
        });
    });

    cards[i].addEventListener('mouseover',()=>{
        if (counter == 0) {
            counter++;
        miniatures_containers[0].style.border = '2px solid red';
        miniatures_containers[0].style.padding = '0';
        interval = setInterval(() => {
            carousel.style.transform= `translateX(${per}%)`;
                miniatures_containers.forEach((miniature)=> {
                    miniature.style.border = 'none';
                    miniature.style.padding = '1px';
                });
            miniatures_containers[mini].style.border = '2px solid red';
            miniatures_containers[mini].style.padding = '0';
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
    }
});
    triger.addEventListener('mouseover',()=>{
        if (counter == 1) {
            counter--;
            clearInterval(interval);
            miniatures_containers.forEach((miniature)=> {
                miniature.style.border = 'none';
                miniature.style.padding = '1px';
            });
            mini = 1;
            per = -100;
            reset = 2;
        carousel.style.transform= 'translateX(0)';
        }
    }) 
});

let bg_bt = document.querySelectorAll('.bg_bt');
let btn_card = document.querySelectorAll('.btn_card');
let text_gradient = document.querySelectorAll('.text_gradient');

btn_card.forEach((btn, i)=> {
    btn.addEventListener('mouseover',()=>{
        bg_bt[i].style.animationName= 'btn_card';
        text_gradient[i].style.background = 'white';
        text_gradient[i].style.webkitBackgroundClip= '';
    });
    btn.addEventListener('mouseout',()=>{
        bg_bt[i].style.animationName= '';
        text_gradient[i].style.background = '-webkit-linear-gradient(orange,red)';
        text_gradient[i].style.webkitBackgroundClip= 'text';
    });
});