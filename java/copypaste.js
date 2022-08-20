document.getElementById("btn1").onclick = function(){
    var valOfDIV = document.querySelector('.h1-clock').innerText;
    var textArea = document.createElement('textarea');
    document.body.appendChild(textArea);
    textArea.value = valOfDIV;
    textArea.select();
    document.execCommand('copy');
    document.body.removeChild(textArea);
    alert("오비시간복사");}

//새로운 방법 window.onload  얘는 자스 순서에 맞지 않아도 실행되게 하는 거라네 

    window.onload = function () {
        const valOfDIV = document.querySelector("#btn1");
    
        valOfDIV.addEventListener("click", function () {
            const copyElement = document.querySelector('.h1-clock');
            copy(copyElement.innerHTML)
        })
    }
       function copy (value) {
        navigator.clipboard.writeText(value);
    alert("오비시간복사");}
    