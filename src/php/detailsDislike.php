
<?php
//详情页面 取消收藏按钮
session_start();
if (isset($_SESSION["sessionUid"])) {
    $userUid = $_SESSION["sessionUid"];
}
$imageID = $_POST["imageID"];
include 'sqlConnect.php';
//创建连接
$conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);

$photoSql = "DELETE FROM travelimagefavor WHERE ImageID = '{$imageID}' AND UID = '{$userUid}';";

mysqli_query($conn, $photoSql);