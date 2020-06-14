
<?php
//详情页面 收藏按钮
session_start();
if (isset($_SESSION["sessionUid"])) {
    $userUid = $_SESSION["sessionUid"];
}
$imageID = $_POST["imageID"];
include 'sqlConnect.php';
//创建连接
$conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);

$photoSql = "INSERT INTO travelimagefavor (ImageID,UID) VALUES ({$imageID},{$userUid});";
mysqli_query($conn, $photoSql);