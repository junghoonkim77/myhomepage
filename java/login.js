var o =["118176867","200867639","118175287"];
var p =["1234","4321","7890"]


Object.prototype.contain = function(needle){
    for( i=0 ; i<o.length ; i++ ){ 
    if(o[i] == needle){
        return true;
    }
    } return  false;
}

Object.prototype.contain1 = function(needle){
    for( j=0 ; j<o.length ; j++ ){ 
    if(p[j] == needle){
        return true ;
    }
    } return false ;
}


document.querySelector("#btn").addEventListener("click", () => {
    const id = document.querySelector('#id').value;
    const password = document.querySelector("#password").value;
    var link = "html/gate.html"

   
    if(o.contain(id)) {
        if(p.contain1(password)) {
            alert("업무시작");
            window.open(link);
        }
        else {
            alert("비밀번호가 맞지 않습니다.");
        }
    }
    else {
        alert("아이디 혹은 비밀번호가 맞지 않습니다.");
    }
});