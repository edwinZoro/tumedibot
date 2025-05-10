var next_click=document.querySelectorAll(".next_button");
var main_form=document.querySelectorAll(".main");
var step_list = document.querySelectorAll(".progress-bar_c li");
var num = document.querySelector(".step-number");
let formnumber=0;

next_click.forEach(function(next_click_form){
   
    next_click_form.addEventListener('click',function(e){
         e.preventDefault();
        if(!validateform()){
            return false
        }
        
       formnumber++;
       updateform();
       progress_forward();
       contentchange();
    });
}); 

var back_click=document.querySelectorAll(".back_button");
back_click.forEach(function(back_click_form){
    back_click_form.addEventListener('click',function(e){
    e.preventDefault();
       formnumber--;
       updateform();
       progress_backward();
       contentchange();
    });
});

var username=document.querySelector("#user_name");
var shownname=document.querySelector(".shown_name");
 

var submit_click=document.querySelectorAll(".submit_button");
submit_click.forEach(function(submit_click_form){
    submit_click_form.addEventListener('click',function(){
       shownname.innerHTML= username.value;
       formnumber++;
       updateform(); 
    });
});

/*var heart=document.querySelector(".fa-heart");
heart.addEventListener('click',function(){
   heart.classList.toggle('heart');
});*/


/*var share=document.querySelector(".fa-share-alt");
share.addEventListener('click',function(){
   share.classList.toggle('share');
});*/

 

function updateform(){
    main_form.forEach(function(mainform_number){
        mainform_number.classList.remove('active');
    })
    main_form[formnumber].classList.add('active');
} 
 
function progress_forward(){
    // step_list.forEach(list => {
        
    //     list.classList.remove('active');
         
    // }); 
    
     
    num.innerHTML = formnumber+1;
    step_list[formnumber].classList.add('active');
}  

function progress_backward(){
    var form_num = formnumber+1;
    step_list[form_num].classList.remove('active');
    num.innerHTML = form_num;
} 
 
var step_num_content=document.querySelectorAll(".step-number-content");

 function contentchange(){
     step_num_content.forEach(function(content){
        content.classList.remove('active'); 
        content.classList.add('d-none');
     }); 
     step_num_content[formnumber].classList.add('active');
 } 
 
 
function validateform(){
    validate=true;
    var validate_inputs=document.querySelectorAll(".main.active input");
    validate_inputs.forEach(function(vaildate_input){
        vaildate_input.classList.remove('warning');
        if(vaildate_input.hasAttribute('require')){
            if(vaildate_input.value.length==0){
                validate=false;
                vaildate_input.classList.add('warning');
            }
        }
    }); 
    return validate;
    
}



/*A*/
var next_clicka=document.querySelectorAll(".next_buttona");
var main_forma=document.querySelectorAll(".maina");
var step_lista = document.querySelectorAll(".progress-bar_ca li");
var numa = document.querySelector(".step-numbera");
let formnumbera=0;

next_clicka.forEach(function(next_click_forma){
   
    next_click_forma.addEventListener('click',function(e){
         e.preventDefault();
        if(!validateforma()){
            return false
        }
        
       formnumbera++;
       updateforma();
       progress_forwarda();
       contentchangea();
    });
}); 

var back_clicka=document.querySelectorAll(".back_buttona");
back_clicka.forEach(function(back_click_forma){
    back_click_forma.addEventListener('click',function(e){
    e.preventDefault();
       formnumbera--;
       updateforma();
       progress_backwarda();
       contentchangea();
    });
});

var usernamea=document.querySelector("#user_namea");
var shownnamea=document.querySelector(".shown_namea");
 

var submit_clicka=document.querySelectorAll(".submit_buttona");
submit_clicka.forEach(function(submit_click_forma){
    submit_click_forma.addEventListener('click',function(){
       shownnamea.innerHTML= usernamea.value;
       formnumbera++;
       updateforma(); 
    });
});
 

function updateforma(){
    main_forma.forEach(function(mainform_numbera){
        mainform_numbera.classList.remove('activea');
    })
    main_forma[formnumbera].classList.add('activea');
} 
 
function progress_forwarda(){
         
    numa.innerHTML = formnumbera+1;
    step_lista[formnumbera].classList.add('activea');
}  

function progress_backwarda(){
    var form_numa = formnumbera+1;
    step_lista[form_numa].classList.remove('activea');
    numa.innerHTML = form_numa;
} 
 
var step_num_contenta=document.querySelectorAll(".step-numbera-content");

 function contentchangea(){
     step_num_contenta.forEach(function(contenta){
        contenta.classList.remove('activea'); 
        contenta.classList.add('d-none');
     }); 
     step_num_contenta[formnumberb].classList.add('activea');
 } 
 
 
function validateforma(){
    validatea=true;
    var validate_inputsa=document.querySelectorAll(".maina.activea input");
    validate_inputsa.forEach(function(vaildate_inputa){
        vaildate_inputa.classList.remove('warning');
        if(vaildate_inputa.hasAttribute('require')){
            if(vaildate_inputa.value.length==0){
                validatea=false;
                vaildate_inputa.classList.add('warning');
            }
        }
    }); 
    return validatea ;
    
}






/*B*/
var next_clickb=document.querySelectorAll(".next_buttonb");
var main_formb=document.querySelectorAll(".mainb");
var step_listb = document.querySelectorAll(".progress-bar_cb li");
var numb = document.querySelector(".step-numberb");
let formnumberb=0;

next_clickb.forEach(function(next_click_formb){
   
    next_click_formb.addEventListener('click',function(e){
         e.preventDefault();
        if(!validateformb()){
            return false
        }
        
       formnumberb++;
       updateformb();
       progress_forwardb();
       contentchangeb();
    });
}); 

var back_clickb=document.querySelectorAll(".back_buttonb");
back_clickb.forEach(function(back_click_formb){
    back_click_formb.addEventListener('click',function(e){
    e.preventDefault();
       formnumberb--;
       updateformb();
       progress_backwardb();
       contentchangeb();
    });
});

var usernameb=document.querySelector("#user_nameb");
var shownnameb=document.querySelector(".shown_nameb");
 

var submit_clickb=document.querySelectorAll(".submit_buttonb");
submit_clickb.forEach(function(submit_click_formb){
    submit_click_formb.addEventListener('click',function(){
       shownnameb.innerHTML= usernameb.value;
       formnumberb++;
       updateformb(); 
    });
});
 

function updateformb(){
    main_formb.forEach(function(mainform_numberb){
        mainform_numberb.classList.remove('activeb');
    })
    main_formb[formnumberb].classList.add('activeb');
} 
 
function progress_forwardb(){
         
    numb.innerHTML = formnumberb+1;
    step_listb[formnumberb].classList.add('activeb');
}  

function progress_backwardb(){
    var form_numb = formnumberb+1;
    step_listb[form_numb].classList.remove('activeb');
    numb.innerHTML = form_numb;
} 
 
var step_num_contentb=document.querySelectorAll(".step-numberb-content");

 function contentchangeb(){
     step_num_contentb.forEach(function(contentb){
        contentb.classList.remove('activeb'); 
        contentb.classList.add('d-none');
     }); 
     step_num_contentb[formnumberb].classList.add('activeb');
 } 
 
 
function validateformb(){
    validateb=true;
    var validate_inputsb=document.querySelectorAll(".mainb.activeb input");
    validate_inputsb.forEach(function(vaildate_inputb){
        vaildate_inputb.classList.remove('warning');
        if(vaildate_inputb.hasAttribute('require')){
            if(vaildate_inputb.value.length==0){
                validateb=false;
                vaildate_inputb.classList.add('warning');
            }
        }
    }); 
    return validateb;
    
}