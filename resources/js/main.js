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
        document.querySelector('#email').value = "";
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
            if (control[0].value != "" && control[1].value != "" && control[2].value != "" && control[3].value != "" && control[4].value != "" && error_control[0].innerHTML == "" && error_control[1].innerHTML == "" && error_control[2].innerHTML == "" || error_control[2].innerHTML == "The email has already been taken"  && error_control[3].innerHTML == "" && error_control[4].innerHTML == "") {
                document.querySelectorAll('.register_submit')[0].type= "submit";
            }
            console.log(error_control[6].innerHTML == "These credentials do not match our records.");
            if (control[5].value != "" && control[6].value != "" && error_control[5].innerHTML == "" && error_control[6].innerHTML == "" || error_control[6].innerHTML == "These credentials do not match our records.") {
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
let password_reset = document.querySelector('.password_reset');
let password_reset_form_container = document.querySelector('.password_reset_form_container');
let password_reset_form = document.querySelector('.password_reset_form');
password_reset.addEventListener('click',()=>{
password_reset_form_container.classList.remove('d-none');
password_reset_form.style.animationName = "password_reset_form";
})
document.querySelectorAll('.esc').forEach((esc,i)=> { 
    esc.addEventListener('click',()=>{
        password_reset_form_container[i].classList.add('d-none');
        password_reset_form[i].style.animationName = "password_reset_form";
        })
});
}
// end register form
// card carousel
let carousels = document.querySelectorAll('.card_carousel');

function button(){
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
if (carousels[0]) {

    button();

    let texts = document.querySelectorAll('.card_text');
    texts.forEach((text)=> {     
        if (text.innerHTML.length > 116) {
            text.innerHTML = text.innerHTML + '...';
        }
    });

let cards = document.querySelectorAll('.card');

carousels.forEach((carousel, i)=> { 
    let prova = 0;
    let interval;
    let per = -100;
    let reset = 2;
    let mini = 1;
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
        prova = 1;
        if (counter == 0) {
            counter++;

        miniatures_containers[0].style.border = '2px solid red';
        miniatures_containers[0].style.padding = '0';

        if (images.length > 1) {
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
            }, 5000);
        }
    }
});
    cards[i].addEventListener('mouseout',()=>{
        prova = 0;
        setTimeout(() => {           
            if (counter == 1 && prova == 0) {
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
        }, 1);
    }) 
});
}

let cart_btn = document.querySelectorAll('.cart_button');
cart_btn.forEach((btn, i)=> {
    btn.addEventListener('click',()=>{
        document.querySelectorAll('.cart_icon')[i].style.animationName = "add_to_cart_animation";
        setTimeout(() => {
            document.querySelectorAll('.cart_icon')[i].style.animationName = "";
        }, 1000);
    })
});
//end card carousel
// detail
let carousel_detail = document.querySelector('.carousel_detail');
if (carousel_detail) {
    button();
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
        espandi.innerHTML = "retrai";
        cou = 1;
    }else if (cou == 1) {
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
 inputs = document.querySelectorAll('input');
inputs.forEach((input)=> {
    input.addEventListener('input',()=>{
        invia.innerHTML= "salva";
    })
});
})
}
// end profile
// annunci
let filter = document.querySelector('#orderby');
if (filter) {
    filter = [document.querySelector('#orderby'),document.querySelector('#categori'),document.querySelector('#order')];
    console.log(filter);
let submit = document.querySelector('#submit');
let range = document.querySelector('#range');
let serch = document.querySelector('#serch');
let search_icon = document.querySelector('.search_icon');
let serch_submit = document.querySelector('#serch_submit');
serch.addEventListener('input',()=>{
    if (search_icon.innerHTML = "<i class= 'bi bi-x-lg' ></i>") {
        search_icon.addEventListener('click',()=>{
            serch.value = "";
            search_icon.style.cursor="default";
            search_icon.innerHTML="<i class='bi bi-search'></i>";
            serch_submit.value= serch.value;
    serch_submit.dispatchEvent(new Event('input'));
        submit.click();
        })
    }
    if (serch.value != "") {
        search_icon.innerHTML= "<i class='bi bi-x-lg'></i>";
        search_icon.style.cursor="pointer";
    }else{
        search_icon.style.cursor="default";
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

range.addEventListener('mousedown',()=>{
    range.step=""; 
})
range.addEventListener('mouseup',()=>{
    submit.click();
    remove();
})

let thumb_container = document.querySelector('.thumb_container');
let value_display = document.querySelector('.value_display');
let root = document.querySelector(':root');
let css_var = getComputedStyle(root);
let css_var_value = css_var.getPropertyValue('--thumb');
range.addEventListener('input',()=>{
    let var_value = 95 / range.max /range.max * range.value;
let motion_range = 95 / range.max * (range.value - 1) + var_value;
console.log(motion_range); 
value_display.innerHTML = range.value+'<div class="range_arrow"></div>';
value_display.style.left = motion_range+"%";
root.style.setProperty('--thumb', motion_range+"%");
})
let filter_button = document.querySelector('.filter_button');
let filter_pannel = document.querySelector('.filter_pannel');
let arrow_container = document.querySelector('.arrow_container');
let card_container = document.querySelector('.card_container');
let cards = document.querySelectorAll('.card');
let click = 0;
filter_button.addEventListener('click',()=>{
    card_container.classList.remove("justify-content-evenly");
card_container.style.width = "1500px";
    if (click == 0) {
        click = 1;
        card_container.classList.remove("justify-content-evenly");
        card_container.style.width = "1500px";
        cards.forEach((card)=> {
            card.style.animationName = "card_mouvment1";
        });
        card_container.style.animationName = "card_container_mouvment1";
        filter_pannel.style.animationName = "pannel_mouvment1";
        setTimeout(() => {
            card_container.style.width = "1006px";
            card_container.classList.add("justify-content-evenly");
        }, 1000);
    }else{
        click = 0;
        card_container.style.width = "1500px";
        card_container.classList.remove("justify-content-evenly");
        cards.forEach((card)=> {
            card.style.animationName = "card_mouvment2";
        });
        card_container.style.animationName = "card_container_mouvment2";
        filter_pannel.style.animationName = "pannel_mouvment2";
        setTimeout(() => {
            card_container.style.width = "100%";
            card_container.classList.add("justify-content-evenly");
        }, 1000);
    }
    arrow_container.classList.toggle('arrow_mouvment');
})
}
// end annunci
// header
let lens = document.querySelector('.lens');
if (lens) {
let icon_var = 2;
let background = document.querySelector('.background');
let header = document.querySelector('header');
let l = 461;
let t = 76;
let l1 = 0;
let y = 45;
let x = 682;
let prova = 1;
setInterval(() => {
    if (l1 == -459) {
        l1 = 0;
        change();
    }else{
        l1 -= 1;
    }
    header.style.backgroundPosition = l1+"px 55px";
    if (prova >= 1) {
        if (prova > 1) {
          l -= 10; 
          prova --; 
        }else{
            l -= 1;
        }     
        lens.style.left = l+"px";
    }
}, 50);

function change(){
    prova = 0;
    lens.style.animationDuration = "3s";
    background.style.animationDuration = "3s";
    lens.style.animationName = "lens_rotate_reverse";
    background.style.animationName = "lens_background_rotate_reverse";
    setTimeout(() => {
        lens.style.animationDuration = "15s";
        background.style.animationDuration = "15s";
        lens.style.animationName = "lens_rotate";
        background.style.animationName = "lens_background_rotate";
    }, 7000);
    switch (icon_var) {
        case 1:
            t = 76;
            l = 467;
            y = -45;
            x = -682;
            break;
        case 2:
            t = 115;
            l = 592;
            x = -849;
            y = -104;
            break;
        case 3:
            t = 82;
            l = 783;
            x = -1108;
            y = -55;
            break;
        case 4:
            t = 214;
            l = 834;
            x = -1178;
            y = -256;
            break;
    }
    let random = Math.floor(Math.random() * 2);
    if (random == 1) {
        l += 459;
        x -= 625;
    }
    random = Math.floor(Math.random() * 3);
    if (icon_var == 4) {
        random = 1;
    }
    if (random == 1) {
        t += 218;
        y -= 333;
    }else if (random == 2) {
        t += 436;
        y -= 666;
    }
    if (icon_var == 4) {
        icon_var = 1;
    }else{
        icon_var++;
    }    
    setTimeout(() => {
        prova = 4;
    }, 1000);
lens.style.top = t+"px";
lens.style.left = l+"px";
background.style.backgroundPosition = x+"px"+" "+y+"px";
}
}
// end header
// vendi
let img_preview = document.querySelector('.img_preview');
if (img_preview) {
let img_preview_slider = document.querySelector('.img_preview_slider');
let preview_miniature_container = document.querySelector('.preview_miniature_container');
let preview_miniature_slider = document.querySelector('.preview_miniature_slider');
let img_input = document.querySelector('.img_input');
let img_var = 400;
let form_categorys = document.querySelectorAll('.category');
let form = document.querySelectorAll('.form');

form_categorys.forEach((category, i)=> {

    category.addEventListener('click',()=>{

        document.querySelector('#category_input').value = category.value;
        form[i].classList.remove('d-none');
        form[i].querySelectorAll('input').forEach((input)=> {
            input.disabled = false;
        });
        document.querySelector('.form_slider').style.transform = "translate(-25%)";

        form_categorys.forEach((category)=> {
            category.style.backgroundColor = "gray";
            category.style.color = "rgb(216, 216, 216)";
        });

        category.style.backgroundColor = "blue";
        category.style.color = "white";
    })
});

img_preview.addEventListener('click',()=>{
    img_input.click();
})
img_input.addEventListener('input',()=>{
    img_preview_slider.innerHTML = "";
    preview_miniature_slider.innerHTML = "";
    for (let i = 0; i < img_input.files.length; i++) {
        img_preview_slider.style.justifyContent = "left";
        img_preview_slider.innerHTML += `<div class="img_size"><img class="h-100 w-100" src="${window.URL.createObjectURL(img_input.files[i])}" alt=""></div>`;
        preview_miniature_slider.innerHTML += `<div class="miniature_preview"><img class="h-100 w-100" src="${window.URL.createObjectURL(img_input.files[i])}" alt=""></div>`;
    }
    let arrow_move = 0;
    if (img_input.files.length > 4) {
        let left_arrow = document.querySelector('.miniature_arrow_left');
        let right_arrow = document.querySelector('.miniature_arrow_right');
        left_arrow.classList.remove('d-none');
        right_arrow.classList.remove('d-none');
        right_arrow.addEventListener('click',()=>{
            if (arrow_move != "-"+(img_input.files.length-4)*100) {
                arrow_move -= 100;
            }
            preview_miniature_slider.style.left = arrow_move+"px";
        });
        left_arrow.addEventListener('click',()=>{
            if (arrow_move != 0) {
                arrow_move += 100;
            }
            console.log(arrow_move);
            preview_miniature_slider.style.left = arrow_move+"px";
        });
    }
    preview_miniature_container.querySelectorAll('.miniature_preview')[0].style.border = "2px solid red";
    preview_miniature_container.querySelectorAll('.miniature_preview').forEach((miniature, i)=> {
        miniature.addEventListener('click',()=>{
            document.querySelectorAll('.miniature_preview').forEach((miniature)=> {
                miniature.style.border = "1px solid white";
            });
            miniature.style.border = "2px solid red";
            img_preview_slider.style.left = "-"+img_var*i+"px";
        })
    });
    document.querySelector('.img_loaded').innerHTML = `${img_input.files.length} loaded`;
    document.querySelector('.img_loaded').style.border = "1px solid black";
    document.querySelector('.img_loaded').style.paddingLeft = "5px";
    document.querySelector('.img_loaded').style.paddingRight = "5px";
})
}
// end vendi
// cart
let cart_articles = document.querySelectorAll('.cart_article');
if (cart_articles[0]) {
let add = document.querySelectorAll('.add');
let remov = document.querySelectorAll('.remove');
let inputs = document.querySelectorAll('.quantity_container');
let price_container = document.querySelectorAll('.price_container');
let max = document.querySelectorAll('.max');
let quantity_carousel = document.querySelectorAll('.quantity_carousel');
let quantity_input = document.querySelectorAll('.quantity_input');
let submit = document.querySelectorAll('.submit');
let remove_buttons = document.querySelectorAll('.cart_delete');
let remove_submit = document.querySelectorAll('.remove_submit');
let img_slider = document.querySelectorAll('.cart_img_slider');
let prices = document.querySelectorAll('.price');
let total_price = 0;
let total_article = 0;

inputs.forEach((input, i)=> {
    let value = quantity_carousel[i].querySelectorAll('.quantity');
    let single_price = prices[i].innerHTML / quantity_carousel[i].querySelectorAll('.quantity')[1].innerHTML;
    add[i].addEventListener('click',()=>{
            quantity_input[i].value = quantity_carousel[i].querySelectorAll('.quantity')[1].innerHTML;
            quantity_input[i].value++;
            quantity_input[i].dispatchEvent(new Event('input'));
            submit[i].click(); 
        max[i].classList.remove('d-none');
        quantity_carousel[i].style.animationName = 'quantity_animation';
        value[1].innerHTML++;
        setTimeout(() => {
            quantity_carousel[i].style.animationName = "";
            value[0].innerHTML++;
        }, 450);
        total_article ++;
        prices[i].innerHTML = single_price * quantity_carousel[i].querySelectorAll('.quantity')[1].innerHTML;
        update_value();
    })
    let counter = 0;
    remov[i].addEventListener('click',()=>{
        let single_price = prices[i].innerHTML / quantity_carousel[i].querySelectorAll('.quantity')[0].innerHTML;

        if (value[0].innerHTML > 1) { 
            quantity_input[i].value = quantity_carousel[i].querySelectorAll('.quantity')[1].innerHTML;       
            quantity_input[i].value--;
            total_article--;
            prices[i].innerHTML -= single_price;
            update_value();
            quantity_input[i].dispatchEvent(new Event('input'));
            submit[i].click();
            max[i].classList.remove('d-none');
            quantity_carousel[i].style.animationName = 'quantity_animation_reverse';
        quantity_carousel[i].querySelectorAll('.quantity')[0].innerHTML--;

        setTimeout(() => {
            quantity_carousel[i].style.animationName = "";
            quantity_carousel[i].querySelectorAll('.quantity')[1].innerHTML--;
        }, 450);
        
        }else{
            if (counter == 0) {            
                let div = document.createElement('div');
                div.classList.add('message')
                div.innerHTML = "<p class='m-0'>do you want to delect this article?</p><button class=yes>yes</button><button class=no>no</button>";
                price_container[i].appendChild(div);

                let no = document.querySelector('.no');

                no.addEventListener('click',()=>{
                    price_container[i].removeChild(div);
                    counter--;
                })
                counter++;
            }
        }
    })
    remove_buttons[i].addEventListener('click',()=>{
        remove_submit[i].click();
        cart_articles[i].style.backgroundColor = "red";
        cart_articles[i].style.animationName = "delete_animation";
        setTimeout(() => {
            cart_articles[i].style.height = "0";
        }, 650);
    })
    let movement = -80;
    if (img_slider[i].querySelectorAll('.cart_img').length < 2) {
        movement = 0;
    }
    let counter1 = 2;
    setInterval(() => {
        img_slider[i].style.transform = 'translate('+movement+'px'+')';
        if (counter1 < img_slider[i].querySelectorAll('.cart_img').length) {
            movement -= 80;
            counter1++;
        }else{
            movement = 0;
            counter1 = 1;
        }
    }, 10000);
});
 prices.forEach((price, i)=> {
    total_price += +price.innerHTML;
    total_article += +quantity_carousel[i].querySelector('.quantity').innerHTML;
});
function update_value(){
    document.querySelector('.total_price').innerHTML = total_price+"$";
    document.querySelector('.total_article').innerHTML = total_article;
}
update_value();
}
// end cart 
// dashboard
let last_login = document.querySelectorAll('.last_login');
let last_logout = document.querySelectorAll('.last_logout');
let permanence_times = document.querySelectorAll('.permanence_time');
permanence_times.forEach((time,i)=> {
    let login = last_login[i].innerHTML.split(/[-, ,:]+/);
    let logout = last_logout[i].innerHTML.split(/[-, ,:]+/);
    let y = login[0] -logout[0];
    let m = login[1] -logout[1];
    let d = login[2] -logout[2];
    let h = login[3] -logout[3];
    let min = login[4] -logout[4];
    let s = login[5] -logout[5];
    if (y == 0) {
        y = '';
    }else if (y < 10 && y > -10) {
        y = "0"+y+":";
    }
    if (m == 0 && m > -10) {
        m = '';
    }else if (m < 10) {
        m = "0"+m+":";
    }
    if (d == 0 && d > -10) {
        d = '';
    }else if (d < 10) {
        d = "0"+d+":";
    }
     if (h < 10 && h > -10) {
        h = "0"+h;
    }
    if (min < 10 && m > -10) {
        min = "0"+min;
    }
     if (s < 10 && s > -10) {
        s = "0"+s;
    }
    let time_spend = `${y}`+`${m}`+`${d}`+`${h}:`+`${min}:`+`${s}s`;
    time_spend = time_spend.replace('-','');
    time.innerHTML = time_spend.replace('-','');
});
let user_expands = document.querySelectorAll('.user_expand');
let expand = document.querySelectorAll('.user_container');
user_expands.forEach((user_expand,i)=> {
    expand[i].addEventListener('click',()=>{
        user_expand.classList.toggle('position-absolute');
    })
});
let oflines = document.querySelectorAll('.ofline')
oflines.forEach((ofline)=> {

   let ofline_array = ofline.innerHTML.split(/[-, ,:]+/);
let y = new Date().getFullYear() - ofline_array[0];
let m = new Date().getMonth();
if (m == 0) {
    m = 1;
}
m -= ofline_array[1];
let d = new Date().getDate() - ofline_array[2];
let h = new Date().getHours()  - ofline_array[3];
let min = new Date().getMinutes() - ofline_array[4];
let s = new Date().getSeconds() - ofline_array[5];
if (y == 0 && y > -10) {
    y = '';
}else if (y < 10) {
    y = "0"+y+":";
}
if (m == 0 && m > -10) {
    m = '';
}else if (m < 10) {
    m = "0"+m+":";
}
if (d == 0 && d > -10) {
    d = '';
}else if (d < 10) {
    d = "0"+d+":";
}
 if (h < 10 && h > -10) {
    h = "0"+h;
}
if (min < 10 && min > -10) {
    min = "0"+min;
}
 if (s < 10 && s > -10) {
    s = "0"+s;
}
let current_data = `${y}`+`${m}`+`${d}`+`${h}:`+`${min}:`+`${s}s`;
current_data = current_data.replace('-','');
ofline.innerHTML = current_data;
});
let user_purcases = document.querySelectorAll('.user_purcase');
user_purcases.forEach((user_purcase)=> {
    let prices = user_purcase.querySelectorAll('p');
    let total = 0;
    prices.forEach((price)=> {
        total += +price.innerHTML;
    });
    user_purcase.innerHTML = total;
});

let medium_permanence_time = document.querySelectorAll('.medium_permanence_time');
user_expands.forEach((user_expand, i)=> {
    let medium_time = 0;
    let sessions = user_expand.querySelectorAll('.row');
    sessions.forEach((session, i)=> {
        if (i != 0) {        
            let col_time = session.querySelector('.permanence_time');
            col_time = col_time.innerHTML.replace('s','');
            col_time = col_time.split(":");
            let h = col_time[0] * 3600;
            let min = col_time[1] * 60;
            medium_time += (+h) + (+min) + (+col_time[2]);
        }
    });
    medium_time /= (sessions.length - 1);
    medium_time = `${Math.round(medium_time)}`;
    if (medium_time.length == 3) {
        medium_time /= 60;
    }else if (medium_time.length == 4) {
        medium_time /= 3600;
        medium_time /= 60;
    }
    medium_permanence_time[i].innerHTML = medium_time.toFixed(2).replace('.',':')+'s';
});



// graphic
let graphic_fragments = document.querySelectorAll('.graphic_fragment');
let bottom_index_fragments = document.querySelectorAll('.bottom_index_fragment');
let fragment_increment = 100 / last_logout.length;
let fragment_percentage = 0;
graphic_fragments.forEach((fragment, fi)=> {
    if (fi > 0) {   
    }
    last_login.forEach((login, i)=> {
        login = login.innerHTML.split(/[:, ]+/); 
        let logout = last_logout[i].innerHTML.split(/[:, ]+/);   
        if (bottom_index_fragments[fi].innerHTML == login[1]) {
            fragment_percentage += fragment_increment;
        }
        let fis = fi;
        if (fi > 0) {
            fis = fi-1;
        }
        if (bottom_index_fragments[fis].innerHTML == logout[1]) {
            fragment_percentage -= fragment_increment;
        }
    });
     fragment.querySelector('.graphic_rappresentation').style.height = fragment_percentage+"%";

     if (fi > 0 && graphic_fragments[fi-1].querySelector('.graphic_rappresentation').style.height.replace('%','') > fragment_percentage) {
        graphic_fragments[fi-1].querySelector('.graphic_rappresentation').querySelector('.line_boul').classList.add('line_boul_down');
        
    }else if (fi > 1 && graphic_fragments[fi-1].querySelector('.graphic_rappresentation').style.height.replace('%','') < fragment_percentage && graphic_fragments[fi-2].querySelector('.graphic_rappresentation').style.height.replace('%','') == graphic_fragments[fi-1].querySelector('.graphic_rappresentation').style.height.replace('%','')) {
       graphic_fragments[fi-1].querySelector('.graphic_rappresentation').querySelector('.line_boul').classList.add('line_curved_up');

    }else if (fi > 1 && graphic_fragments[fi-1].querySelector('.graphic_rappresentation').style.height.replace('%','') == fragment_percentage && graphic_fragments[fi-1].querySelector('.graphic_rappresentation').style.height.replace('%','') < graphic_fragments[fi-2].querySelector('.graphic_rappresentation').style.height.replace('%','')) {
        graphic_fragments[fi-1].querySelector('.graphic_rappresentation').querySelector('.line_boul').classList.add('line_curved_down');
        graphic_fragments[fi-1].querySelector('.graphic_rappresentation').querySelector('.line_boul').style.height = (graphic_fragments[fi-2].querySelector('.graphic_rappresentation').style.height.replace('%','') / graphic_fragments[fi-1].querySelector('.graphic_rappresentation').style.height.replace('%',''))*100 -100 +"%";
 
     }else if (fi > 1 && graphic_fragments[fi-1].querySelector('.graphic_rappresentation').style.height.replace('%','') < fragment_percentage && graphic_fragments[fi-2].querySelector('.graphic_rappresentation').style.height.replace('%','') > graphic_fragments[fi-1].querySelector('.graphic_rappresentation').style.height.replace('%','')) {
        graphic_fragments[fi-1].querySelector('.graphic_rappresentation').querySelector('.line_boul').classList.add('line_boul_up');

     }else if(fi > 1){
        graphic_fragments[fi-1].querySelector('.graphic_rappresentation').querySelector('.line_boul').style.borderTop = '3px solid orange';
     }
});
// end dashboard
