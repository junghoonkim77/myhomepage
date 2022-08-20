document.getElementById("btn1").onclick = function(){
    var valOfDIV = document.querySelector('.h1-clock').innerText;
    var textArea = document.createElement('textarea');
    document.body.appendChild(textArea);
    textArea.value = valOfDIV;
    textArea.select();
    document.execCommand('copy');
    document.body.removeChild(textArea);
    alert("오비시간복사");}