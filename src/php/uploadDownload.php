<!--将上传的图片获取到服务器上-->
<?php
$imgFile = $_FILES["file"];
$title = $_POST["title"];
$description = $_POST["description"];
$content = $_POST["content"];
$country = $_POST["country"];
$city = $_POST["city"];


session_start();
if (isset($_SESSION["sessionUid"])) {
    $userUid=$_SESSION["sessionUid"];
    include 'sqlConnect.php';
//创建连接
    $conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);

$incrementSql = "SHOW TABLE STATUS FROM travel WHERE Name = 'travelimage';";

$incrementResult = mysqli_query($conn, $incrementSql);
while ($row = mysqli_fetch_assoc($incrementResult)) {
    $autoIncrement = $row["Auto_increment"];
}
$name =intval($autoIncrement).substr($imgFile["name"],strripos($imgFile["name"],"."));

if(move_uploaded_file($imgFile["tmp_name"],"../../img/images/".$name)){

    $changeSql = "INSERT INTO travelimage (Title,Description,content,CityCode,CountryCodeISO,PATH,UID) VALUES ('{$title}','{$description}','{$content}',{$city},'{$country}','{$name}',{$userUid});";
    echo $changeSql;
    if (mysqli_query($conn, $changeSql)){
        echo "success! We are going to the MyPhoto page...
        <script>window.location.href='../web/MyPhoto.php';</script>";
    }else{
        echo "fail! We are going to the MyPhoto page...
                <script>window.location.href='../web/MyPhoto.php';</script>";
    }
}
else{
    echo "fail! We are going to the MyPhoto page...
<script>window.location.href='../web/MyPhoto.php';</script>";
}


}
