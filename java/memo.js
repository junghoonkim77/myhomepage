var textare_color = document.querySelectorAll('textarea') ; 
const clock = document.querySelector('.h1-clock');
const setTime = document.querySelector('.inputtime');

function getAlarm()
{  const setValue = setTime.value;  
const date = new Date();  
const hours = date.getHours();  
const minute = date.getMinutes();  
const current = `${hours < 10 ? `0${hours}` : hours}:${minute < 10 ? `0${minute}` : minute}`;	  

if(current == setValue)
{ textare_color[0].style.backgroundColor ='tomato';
textare_color[1].style.backgroundColor ='tomato';
alert("알람시간입니다.")
}}
function getTime(){
const time = new Date();
const hour = time.getHours();
const minutes = time.getMinutes();
const seconds = time.getSeconds();
//clock.innerHTML = hour +":" + minutes + ":"+seconds;
clock.innerHTML = `${hour<10 ? `0${hour}`:hour}:${minutes<10 ? `0${minutes}`:minutes}:${seconds<10 ? `0${seconds}`:seconds}`
}

function init(){
setInterval(getTime, 1000);
alarm = setInterval(getAlarm, 1000);
}
init();

window.onload = function () {
   const valOfDIV = document.querySelector("#btn1");

   valOfDIV.addEventListener("click", function () {
       const copyElement = document.querySelector('.h1-clock');
       copy(copyElement.innerHTML)
   })
}
  function copy (value) {
   navigator.clipboard.writeText(value);
  }

