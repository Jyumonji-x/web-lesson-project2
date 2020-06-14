
<?php
//收藏页面删除收藏的实现
$imageID = $_POST["imageID"];
session_start();
if (isset($_SESSION["sessionUid"])) {
    $userUid = $_SESSION["sessionUid"];
    include 'sqlConnect.php';
//创建连接
    $conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    $findSearchSql = "DELETE FROM travelimagefavor WHERE UID={$userUid} AND ImageID = {$imageID} ;";
    $searchResult = mysqli_query($conn, $findSearchSql);
    $title = [];
    $description = [];
    $imageName = [];
    $imageID = [];
    while ($photoRow = mysqli_fetch_assoc($searchResult)) {
        array_push($title, $photoRow["Title"]);
        array_push($description, $photoRow["Description"]);
        array_push($imageName, $photoRow["PATH"]);
        array_push($imageID,$photoRow["ImageID"]);
    }
    $result = [];
    array_push($result, $title);
    array_push($result, $description);
    array_push($result, $imageName);
    array_push($result,$imageID);
    echo json_encode($result);
}