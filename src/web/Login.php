<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/loginFooter.css">
    <script src="../js/Login.js" ></script>
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
        <div class="header">Sign in for Album</div>
        <div class="inputBox">
            <form  action="../php/Login.php" name="Login" method="post" onsubmit="return loginInCheck()">
                <p>Username/E-mail address</p>
                <input class="input" type="text" name="userName"><br>
                <p>Password</p>
                <input class="input" type="password" name="password"><br>
            <p></p>
                <br>
                <input type="submit" value="Sign in">
            </form>
            <br>
            <button onclick="location.href='Register.php'">register</button>
        </div>
    </div>
</div>
<div class = "footer">
        <p>Tongqiao Xu  No. 19302010015</p>
</div>
</body>
</html>