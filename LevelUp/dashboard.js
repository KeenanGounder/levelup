
// progress bar
let progress_bar = document.getElementById('progress_bar');
let water_perc_num = document.getElementById('water_perc_num');
let water_percent = document.getElementById('water_percent');
let water_ml = document.getElementById('water_ml');
let water_inc = document.getElementById('water_inc');
const complete_drink = document.querySelector('.drink');
//exc
let excercise_complete = document.querySelector('.excercise_task')
let complete_excercise = document.querySelector('.gym');
let exc_percent = document.getElementById('exc_percent');
let exc_percent_num = document.getElementById('exc_percent_num');
let min_exc = document.getElementById('min_exc');
//sleep
let sleep_complete = document.querySelector('.sleep_task');
let sleep_task = document.getElementById('sleeping');
let hours_display = document.getElementById('hours_display');
let sleep_percent = document.getElementById('sleep_percent');
let sleep_percent_num = document.getElementById('sleep_perc_num');
let sleep_hours = document.getElementById('sleep_hours').value;


function display(){
    //water
    progress_bar.value = window.localStorage.getItem('progress');
    water_perc_num.innerHTML = window.localStorage.getItem('waterperc');
    water_percent.style.strokeDashoffset = window.localStorage.getItem('dashoffsetW');
    if(window.localStorage.getItem('dashoffsetW') == 240){
        complete_drink.remove();
    }

    water_ml.innerHTML = window.localStorage.getItem('watermlnum');
    water_inc.innerHTML = window.localStorage.getItem('watercount');

    // exc
    exc_percent.style.strokeDashoffset = window.localStorage.getItem('ex_percent');
    exc_percent_num.innerHTML = window.localStorage.getItem('ex_per_num');
    min_exc.innerHTML = window.localStorage.getItem('exc_min');
    if(window.localStorage.getItem('ex_percent') == 240){
        complete_excercise.remove();
    }
    //sleep
    hours_display.innerHTML = window.localStorage.getItem('hours');
    sleep_percent_num.innerHTML = window.localStorage.getItem('sleep_perc_num');
    sleep_percent.style.strokeDashoffset = window.localStorage.getItem('sleep_circle');
    if(window.localStorage.getItem('sleep_circle')== 240){
        sleep_task.remove();
    }




}

display();

let activity = document.getElementById('activity');


// complete tasks
const water_complete = document.querySelector('.water_task');
let ml=0;
let water_p_c=0;
let water_value=0;
let counter =0;


water_complete.addEventListener('click',()=>{
    
    if(counter <= 7){
        counter++;
        window.localStorage.setItem('ml_inc',Number(ml+=250));
        water_p_c+=12.5;
        water_value+=30;
        window.localStorage.setItem('waterperc',water_perc_num.innerText = `${water_p_c}%`);
        window.localStorage.setItem('dashoffsetW',water_percent.style.strokeDashoffset = water_value);
        window.localStorage.setItem('watercount',water_inc.innerText = `${counter}/8`);
        window.localStorage.setItem('watermlnum',water_ml.innerText = `${ml}ml`);
        progress_bar.value += 1;
        window.localStorage.setItem('progress',progress_bar.value);
        console.log(window.localStorage.getItem('progress'));
    }
    else if(counter>= 8){
        activity.innerHTML += '<p>Water task complete!</p>'
        complete_drink.remove();
    }
    else{
        complete_drink.remove();
    }

})




// excercise btn
excercise_complete.addEventListener('click',()=>{
    window.localStorage.setItem('ex_percent',exc_percent.style.strokeDashoffset = 240);
    window.localStorage.setItem('ex_per_num',exc_percent_num.innerText = `100%`);
    window.localStorage.setItem('exc_min',min_exc.innerText = `30m`);
    progress_bar.value += 1;
    activity.innerHTML += '<p>excercise task complete!</p>'
    complete_excercise.remove();
    window.localStorage.setItem('progress',progress_bar.value);
    
})





sleep_complete.addEventListener('click',()=>{

    window.localStorage.setItem('hours',hours_display.innerText = `8h`);
    window.localStorage.setItem('sleep_perc_num',sleep_percent_num.innerText = '100%');
    window.localStorage.setItem('sleep_circle',sleep_percent.style.strokeDashoffset = 240);
    progress_bar.value += 1;
    window.localStorage.setItem('progress',progress_bar.value);
    activity.innerHTML += '<p>Sleep task complete!</p>'
    sleep_task.remove();
   
})


