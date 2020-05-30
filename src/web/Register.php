<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/Register.css">
    <link rel="stylesheet" href="../css/loginFooter.css">
    <script src="../js/Register.js"></script>
</head>
<body>
<div class="Middle">
    <div class="MainBoard" id="BackGround1"></div>
    <div class="MainBoard" id="BackGround2"></div>
    <div class="MainBoard" id="BackGround3"></div>
    <div class="MainBoard" id="BackGround4"></div>
    <div class="MainBoard" id="BackGround5"></div>
    <div class="MainBoard" id="BackGround6"></div>
    <div class="MainBoard" id="BackGround7"></div>
    <div class="MainBoard" id="BackGround8"></div>
    <div class="MainBoard">
        <div class="header">Join us!</div>
        <div class="inputBox">
        <form  action="../php/Register.php" name="Register" method="post" onsubmit="return registerCheck()">
            <p>Username</p>
            <input class="input" type="text" name="userName"><br>
            <p>E-mail</p>
            <input class="input" type="email" name="Email"><br>
            <p>Password</p>
            <input class="input" type="password" name="password"><br>
            <p>Confirm Your Password</p>
            <input class="input" type="password" name="passwordConfirm"><br>
            <p></p>
            <input type="submit" value="Sign up">
        </form>
        </div>
    </div>
</div>
<div class = "footer">
    <p>Tongqiao Xu  No. 19302010015</p>
</div>
</body>
</html>