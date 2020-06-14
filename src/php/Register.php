
<?php
//注册逻辑
include 'sqlConnect.php';
//创建连接
$conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
//从登录页接受来的数据
$email = $_POST['Email'];
$userName = $_POST['userName'];
$pass = $_POST['password'];
$findRepeatEmailSql = "SELECT UID,UserName,Pass FROM traveluser WHERE (Email='{$email}' OR Email='{$userName}');";
$findRepeatUserNameSql = "SELECT UID,UserName,Pass FROM traveluser WHERE (UserName='{$email}' OR UserName='{$userName}');";
$EmailResult = mysqli_query($conn, $findRepeatEmailSql);
$UserNameResult = mysqli_query($conn, $findRepeatUserNameSql);
if(mysqli_num_rows($UserNameResult)){
    echo "<script>alert('The user name has been used.') ;location='../web/Register.php'</script>";
}
else if(mysqli_num_rows($EmailResult)){
    echo "<script>alert('The email address has been used.');location='../web/Register.php'</script>";
}
else if(!preg_match('/^[A-Za-z0-9_]{6,80}$/u',$userName)){
    echo "<script>alert('Illegal user name.');location='../web/Register.php'</script>";

}
else if(!preg_match('/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/u',$email)){
    echo "<script>alert('Illegal email.');location='../web/Register.php'</script>";
}
else if(!preg_match('/^[A-Za-z0-9_]{6,18}$/u',$pass)){
    echo "<script>alert('Illegal password.');location='../web/Register.php'</script>";
}
else if(!(preg_match('/^.*[0-9]+.*$/u',$pass) && preg_match('/^.*[A-z]+.*$/u',$pass))){
    echo "<script>alert('Too simple password.');location='../web/Register.php'</script>";
}
else{
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $rowNumberSql="SELECT COUNT(*) FROM table_name;";
    $UID = mysqli_query($conn, $rowNumberSql)+1;
    $addUser="INSERT INTO traveluser (UserName,Pass,Email,DateJoined,DateLastModified,State) VALUES ('{$userName}','{$pass}','{$email}',NOW(),NOW(),1)";
    mysqli_query($conn,$addUser);
    echo "<script>alert('Success!');location='../web/Login.php'</script>";
}