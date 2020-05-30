//确认注册信息都已填好，且两次密码输入相同
function registerCheck(){
    if(Register.userName.value===""){
        Register.userName.focus();
        alert("Please write in the userName!");
        return false;
    }
    if(Register.Email.value===""){
        Register.Email.focus();
        alert("Please write in the E-mail!");
        return false;
    }
    if(Register.password.value===""){
        Register.password.focus();
        alert("Please write in the password!");
        return false;
    }
    if(Register.passwordConfirm.value===""){
        Register.passwordConfirm.focus();
        alert("Please confirm the password!");
        return false;
    }
    if(Register.password.value !== Register.passwordConfirm.value){
        Register.passwordConfirm.focus();
        alert("Wrong password confirmation! Please confirm the password again.");
        return false;
    }
}