<?php
//删除自己的照片

$imageID = $_POST["imageID"];
session_start();
if (isset($_SESSION["sessionUid"])) {
    $userUid = $_SESSION["sessionUid"];
    include 'sqlConnect.php';
//创建连接
    $conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);


    $photoSql = "SELECT PATH FROM travelimage WHERE UID={$userUid} AND ImageID = {$imageID}";
    $photoResult = mysqli_query($conn, $photoSql);
    while ($photoRow = mysqli_fetch_assoc($photoResult)) {
        $path = $photoRow["PATH"];
    }
    unlink("../../img/images/".$path);
    echo("../../img/images/".$path);

    $findPhotoSql = "DELETE FROM travelimage WHERE UID={$userUid} AND ImageID = {$imageID} ;";
    $searchResult = mysqli_query($conn, $findPhotoSql);
    $findPhotoSql = "DELETE FROM travelimagefavor WHERE UID={$userUid} AND ImageID = {$imageID} ;";
    $searchResult = mysqli_query($conn, $findPhotoSql);


}