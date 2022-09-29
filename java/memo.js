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


//클릭후 특정범위내 글자 복사
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
//글자수 카운트 함수 

String.prototype.bytes = function() {
 var str = this;
 var l = 0;
 for (var i=0; i<str.length; i++) l += (str.charCodeAt(i) > 128) ? 2 : 1;
 return l;
 }
 
 function cal_pre()
 {
 var textare_txt_count = document.querySelectorAll('textarea')
 var size_check = textare_txt_count[0].value;
 var size_check2= textare_txt_count[1].value;
 //var size_check = document.comment.value;
 document.form.size.value = size_check.bytes();
 //document.form.size1.value =size_check2.bytes();
 document.form.size1.value = size_check2.bytes();
 }

 //textarea 내용 지우기 함수 

 function erasertext1(){
  var textare_color = document.querySelectorAll('textarea') ;
  textare_color[0].value="";
    }
function erasertext2(){
  var textare_color = document.querySelectorAll('textarea') ;
  textare_color[1].value="";
    }  
