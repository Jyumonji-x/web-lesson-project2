
<?php
//登录逻辑
include 'sqlConnect.php';
//创建连接
$conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
//从登录页接受来的数据
$userName=$_POST['userName'];
$pass=$_POST['password'];
$sql="SELECT UID,UserName,Pass FROM traveluser WHERE (UserName='{$userName}' OR Email='{$userName}' );";
$result=mysqli_query($conn,$sql);
$row=mysqli_num_rows($result);
$uidArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
$uid = $uidArray['UID'];
$correctPass = $uidArray['Pass'];
echo $correctPass;
if(!$row){

    echo "<script>alert('Wrong User name!');location='../web/Login.php'</script>";

}
else{
    if(password_verify ($pass,$correctPass)){
        session_start();
        $_SESSION["sessionUid"]=$uid;
        echo "<script>alert('Log in! UID='+$uid);location='../../index.php'</script>";
    }else{
        echo "<script>alert('Wrong Password!');location='../web/Login.php'</script>";

    }

};
