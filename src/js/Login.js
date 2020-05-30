// 登录时确认信息已经全部填入
function loginInCheck(){
    if(Login.userName.value===""){
        Login.userName.focus();
        alert("Please write in the userName!");
        return false;
    }
    if(Login.password.value===""){
        Login.password.focus();
        alert("Please write in the password!");
        return false;
    }
}