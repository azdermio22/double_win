// register form
let passwords = document.querySelectorAll('.password');
if (passwords[0]) {
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

let btnr = document.querySelectorAll('.btnr');
let swich = document.querySelector('.btn_swich');
let register = document.querySelector('.register');
let inputs = document.querySelectorAll('.register_input');
let login = document.querySelector('.login');
let form = document.querySelector('#form').value;
let primary_containers = document.querySelectorAll('.primary_container');

if (form == 1) {
    let login = document.querySelector('.login');
    let register = document.querySelector('.register');
    let swich = document.querySelector('.btn_swich');

    swich.style.transform= 'translateX(100px)';
    login.style.transform= 'translateX(0)';
    register.style.transform= 'translateX(-100%)';
    }

btnr[0].addEventListener('click',()=>{
    if (form == 1) {    
        form = 0;   
        swich.style.animationName = 'register_swich1';
        btnr[0].style.color= 'white';
        btnr[1].style.color= 'black';
        register.style.animationName = 'register1';
        login.style.animationName= 'login1';
    }
});
btnr[1].addEventListener('click',()=>{
    if (form == 0) {
        form = 1; 
        swich.style.animationName = 'register_swich2';
    btnr[1].style.color= 'white';
    btnr[0].style.color= 'black';
    register.style.animationName = 'register2';
    login.style.animationName = 'login2';
    }
});

let labels = document.querySelectorAll('.register_label');
let border = document.querySelectorAll('.input_border');

inputs.forEach((input, i)=> {
    if (input.value != "") {
        labels[i].style.transform='translateY(0)';
    }
    input.addEventListener('focus',()=>{
        labels[i].style.animationName = 'register_input1';
        labels[i].style.color= 'blue';
        border[i].style.animationName = 'border1';
        input.style.borderBottom= '1px solid black';
        if (primary_containers[i].querySelector('.error')) {    
           let local = primary_containers[i].querySelector('.secondary_container');
           local.style.color= 'black';
            if (local.querySelector('.eye')) {
                local.querySelector('.eye').style.borderBottom= '1px solid black';
            } 
        }
    });
    inputs = document.querySelectorAll('.register_input');    
        inputs[i].addEventListener('blur',()=>{
            inputs = document.querySelectorAll('.register_input')[i];
            if (inputs.value == "") {              
                labels[i].style.animationName = 'register_input2';
            }
            border[i].style.animationName = 'border2';
        });
});

primary_containers.forEach((primary_container, i)=> {

    let secondary_container = primary_container.querySelector('.secondary_container');
    let input = secondary_container.querySelector('.register_input');
    let error = primary_container.querySelector('.error');
    let eye = secondary_container.querySelector('.eye');
    let rule;
    let message;
    let acces = 0;

    input.addEventListener('blur',()=>{
             switch (i) {
            case 0:
                rule = input.value.length >= 3;
                message = "inserisci almeno 3 caratteri";
                break;

            case 1:
                rule = input.value.length >= 3;
                message = "inserisci almeno 3 caratteri";
                break;

            case 2:
                rule = input.value.includes("@");
                message = "email non valida";
                break;

            case 3:
                rule = input.value.length >= 8;
                message = "deve contenere minimo 8 caratteri";
                break;

            case 4:
                rule = primary_containers[3].querySelector('.secondary_container').querySelector('.register_input').value === input.value;
                message = "la password non corrisponde";
                break;

            case 5:
                rule = input.value.includes("@");
                message = "email non valida";
                break;

            case 6:
                rule = input.value.length >= 8;
                message = "deve contenere minimo 8 caratteri";
                break;
                        
            default:
                rule = input.value.length > 2;
                break;
        }
        if (rule) {
            error.innerHTML = "";  
        }else{
            error.innerHTML = message;
        }
        let control = document.querySelectorAll('.register_input');
        let error_control = document.querySelectorAll('.error');
        if (control[0].value != "" && control[1].value != "" && control[2].value != "" && control[3].value != "" && control[4].value != "" && error_control[0].innerHTML == "" && error_control[1].innerHTML == "" && error_control[2].innerHTML == "" && error_control[3].innerHTML == "" && error_control[4].innerHTML == "") {
            document.querySelectorAll('.register_submit')[0].type= "submit";
        }
        if (control[5].value != "" && control[6].value != "" && error_control[5].innerHTML == "" && error_control[6].innerHTML == "") {
            document.querySelectorAll('.register_submit')[1].type= "submit";
        }
        if (error.innerHTML != "") {
            secondary_container.style.color= "red";
            secondary_container.querySelector('label').style.color= "red";
            input.style.borderBottom = '1px solid red';
            if (eye) {
                eye.style.borderBottom= '1px solid red'; 
            }  
        }
        if (error.innerHTML == "") {
            secondary_container.style.color= "rgb(109, 182, 0)";
            secondary_container.querySelector('label').style.color= "rgb(109, 182, 0)";
            input.style.borderBottom = '1px solid rgb(109, 182, 0)';
            if (eye) {
                eye.style.borderBottom= '1px solid rgb(109, 182, 0)'; 
            }  
        }
    })
    
});
}
// // end register form
// // card carousel
let carousels = document.querySelectorAll('.card_carousel');
if (carousels[0]) {

    let texts = document.querySelectorAll('.card_text');
    texts.forEach((text)=> {     
        if (text.innerHTML.length > 116) {
            text.innerHTML = text.innerHTML + '...';
        }
    });

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
}
// detail
let carousel_detail = document.querySelector('.carousel_detail');
if (carousel_detail) {
let reset_d = carousel_detail.querySelectorAll('img');
let miniature_detail = document.querySelectorAll('.miniature_detail');
let per_d = -100;
let im = 2;
let timer = 5000;

miniature_detail[0].style.border= '2px solid red';
miniature_detail[0].style.padding = '0';

    let interval_detail = setInterval(()=>{
        swipe();
    }, timer);

miniature_detail.forEach((miniature, i)=> {
    miniature.addEventListener('click',()=>{
        per_d = 0 - i*100;
        im = 1 + i;
        clearInterval(interval_detail);
        swipe();
        setTimeout(() => {       
            interval_detail = setInterval(()=>{
                swipe();
            }, timer);
        }, 15000);
    })
});

function swipe(){
carousel_detail.style.transform = `translateX(${per_d}%)`;
miniature_detail.forEach((miniature)=> {
    miniature.style.border= 'none';
    miniature.style.padding= '1px';
});
miniature_detail[im-1].style.border= '2px solid red';
miniature_detail[im-1].style.padding = '0';
if (reset_d[im]) {
    per_d -= 100;
    im++;
}else{
    per_d = 0;
    im = 1;
}
}

let p = document.querySelector('.p_detail');
let espandi = document.querySelector('.espandi');
let string = ["",""];
if (p.innerHTML.length  > 900) {
    for (let i = 0; i < p.innerHTML.length; i++) {
        if (i < 1221) {
            string[0] += p.innerHTML[i];
        }else if (i == 1222){
            string[0] += "..."; 
        }else{
            string[1] += p.innerHTML[i];
        }
    }
    p.innerHTML = string[0]+"<br>"+string[1];
    p.style.justifyContent= "flex-start";
    espandi.style.display= "inline";
}
let cou = 0;
espandi.addEventListener('click',()=>{
    p.classList.toggle('esp');
    if (cou == 0) {
        console.log('ok');
        espandi.innerHTML = "retrai";
        cou = 1;
    }else if (cou == 1) {
        console.log('o');
        espandi.innerHTML = "espandi";
        cou = 0; 
    }
})
}
// end detail
// profile
let img_profile = document.querySelector('.img_profile_container');
if (img_profile) {
if (!img_profile.querySelector('.img_profile')) {
    let default_img = document.createElement('img');
    default_img.src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Windows_10_Default_Profile_Picture.svg/2048px-Windows_10_Default_Profile_Picture.svg.png';
    default_img.classList.add('img_profile');
    img_profile.appendChild(default_img);
}
let modifi = document.querySelector('.modifi');
let invia = document.querySelector('.invia');
let value_array = [];
let rows = document.querySelectorAll('.table_row');

modifi.addEventListener('click',()=>{
    rows.forEach((row, i)=> {
        if (i % 2) {
            value_array.push(row.innerHTML);
            row.innerHTML = `<input class= text-center w-100 m-3 name=${rows[i-1].innerHTML} placeholder=${row.innerHTML} type= text>`;
        }
    });

    let img_button = document.querySelector('.img_button');
    modifi.classList.add('d-none');
    invia.classList.remove('d-none');
    img_button.classList.remove('d-none');
    img_button = document.querySelector('.img_button');

img_button.addEventListener('mouseover',()=>{
    img_button.style.backgroundColor= "rgb(0,0,0,0.300)";
    img_button.style.color= "white";
})
img_button.addEventListener('mouseout',()=>{
    img_button.style.backgroundColor= "";
    img_button.style.color= "transparent";
})
let input = document.querySelector('#input');
img_button.addEventListener('click',()=>{
    input.click(); 
});
input.addEventListener('input',()=>{
    if (input.value != "") {
        document.querySelector('.img_profile').src= window.URL.createObjectURL(input.files[0]);
    }
});
let row_container = document.querySelector('.row_container')
let inputs = row_container.querySelectorAll('input');
invia.addEventListener('click',()=>{          
    inputs.forEach((input, i)=> {
        if (input.value == "") {
                input.value = value_array[i];
        }
    });
})
inputs.forEach((input)=> {
    input.addEventListener('input',()=>{
        invia.innerHTML= "salva";
    })
});
})
}
// end profile
// annunci
let submit = document.querySelector('#submit');
let range = document.querySelector('#range');
let serch = document.querySelector('#serch');
let search_icon = document.querySelector('.search_icon');
let serch_submit = document.querySelector('#serch_submit');
let filter = [document.querySelector('#orderby'),document.querySelector('#categori'),document.querySelector('#order')];

serch.addEventListener('input',()=>{
    if (search_icon.innerHTML = "<i class= 'bi bi-x-lg' ></i>") {
        search_icon.addEventListener('click',()=>{
            serch.value = "";
            search_icon.innerHTML="<i class='bi bi-search'></i>";
            serch_submit.value= serch.value;
    serch_submit.dispatchEvent(new Event('input'));
        submit.click();
        })
    }
    if (serch.value != "") {
        search_icon.style.cursor="default";
        search_icon.innerHTML= "<i class='bi bi-x-lg'></i>";
    }else{
        search_icon.style.cursor="pointer";
        search_icon.innerHTML= "<i class='bi bi-search'></i>";
    }
})

function remove(){
    setTimeout(() => {         
        let remove_filters = document.querySelectorAll('.remove_filter');
        let remove = document.querySelector('#remove');
remove_filters.forEach((remove_filter)=> {
  remove_filter.addEventListener('click',()=>{
      remove.value = remove_filter.id;
      remove.dispatchEvent(new Event('input'));
      submit.click();
  })
});
      }, 550);
}

serch.addEventListener('input',()=>{
    serch_submit.value= serch.value;
    serch_submit.dispatchEvent(new Event('input'));
        submit.click();
    remove();
})
filter.forEach((input)=> {
    input.addEventListener('change',()=>{
        submit.click();
        remove();
    })
});
range.addEventListener('mousedown',()=>{
    range.step=""; 
})
range.addEventListener('mouseup',()=>{
    submit.click();
    remove();
})
let indicatore = document.querySelector('.indicatore');
let mouvment_range = 250/range.max;
range.addEventListener('input',()=>{
    indicatore.style.right= mouvment_range;
})
let filter_button = document.querySelector('.filter_button');
let filter_pannel = document.querySelector('.filter_pannel');
let arrow_container = document.querySelector('.arrow_container');
filter_button.addEventListener('click',()=>{
    filter_pannel.classList.toggle('pannel_mouvment');
    arrow_container.classList.toggle('arrow_mouvment');
})
// end annunci