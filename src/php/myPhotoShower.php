
<?php
//显示我的照片
session_start();
if (isset($_SESSION["sessionUid"])) {
    $userUid = $_SESSION["sessionUid"];
    include 'sqlConnect.php';
//创建连接
    $conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);

    $photoSql = "SELECT Title,Description,PATH,ImageID FROM travelimage WHERE UID={$userUid}";
    $photoResult = mysqli_query($conn, $photoSql);
    $title = [];
    $description = [];
    $imageName = [];
    $imageID = [];
    while ($photoRow = mysqli_fetch_assoc($photoResult)) {
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
