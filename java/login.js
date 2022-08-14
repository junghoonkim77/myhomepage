<<<<<<< HEAD

document.querySelector("#btn").addEventListener("click", () => {
    const id = "admin";
    const password = "1234";
 
    if(id == document.querySelector("#id").value) {
        if(password == document.querySelector("#password").value) {
            alert("업무시작");
            location.href = ""; //
        }
        else {
            alert("비밀번호가 맞지 않습니다.");
        }
    }
    else {
        alert("아이디 혹은 비밀번호가 맞지 않습니다.");
    }
});
=======

document.querySelector("#btn").addEventListener("click", () => {
    const id = "admin";
    const password = "1234";
 
    if(id == document.querySelector("#id").value) {
        if(password == document.querySelector("#password").value) {
            alert("업무시작");
            location.href = ""; //
        }
        else {
            alert("비밀번호가 맞지 않습니다.");
        }
    }
    else {
        alert("아이디 혹은 비밀번호가 맞지 않습니다.");
    }
});
>>>>>>> 42a664f1b8bd5935d345dbfe53e019e02672263b
