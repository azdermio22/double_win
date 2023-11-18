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