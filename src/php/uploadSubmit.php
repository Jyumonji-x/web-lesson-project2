
<?php
//上传页面的提交
$title = addslashes($_POST["title"]);
$description = addslashes($_POST["description"]);
$content = $_POST["content"];
$countryCodeISO = $_POST["country"];
$cityCode = $_POST["city"];
$incrementSql = "SHOW TABLE STATUS FROM travel WHERE Name = 'travelimage';";

$incrementResult = mysqli_query($conn, $incrementSql);
while ($row = mysqli_fetch_assoc($incrementResult)) {
    $autoIncrement = $row["Auto_increment"];
}
$imgName = intval($autoIncrement).substr($imgFile["name"],strripos($imgFile["name"],"."));
echo $imgName;
session_start();
if (isset($_SESSION["sessionUid"])) {
    $userUid = $_SESSION["sessionUid"];
    include 'sqlConnect.php';
//创建连接
    $conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    $changeSql = "INSERT INTO travelimage (Title,Description,content,CityCode,CountryCodeISO,PATH,UID) VALUES ('{$title}','{$description}','{$content}',{$cityCode},'{$countryCodeISO}','{$imgName}',{$userUid});";
    mysqli_query($conn, $changeSql);
}
