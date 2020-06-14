
<?php
//修改页面的显示
$imageID = $_POST["imageID"];
session_start();
if (isset($_SESSION["sessionUid"])) {
    $userUid = $_SESSION["sessionUid"];
    include 'sqlConnect.php';
//创建连接
    $conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    $findPhotoSql = "SELECT * FROM travelimage WHERE UID={$userUid} AND ImageID = {$imageID} ;";
    $searchResult = mysqli_query($conn, $findPhotoSql);
    $title = [];
    $description = [];
    $path = [];
    $imageID = [];
    $cityCode=[];
    $countryCodeISO=[];
    $content = [];
    while ($photoRow = mysqli_fetch_assoc($searchResult)) {
        array_push($title, $photoRow["Title"]);
        array_push($description, $photoRow["Description"]);
        array_push($path, $photoRow["PATH"]);
        array_push($imageID,$photoRow["ImageID"]);
        array_push($cityCode,$photoRow["CityCode"]);
        array_push($countryCodeISO,$photoRow["CountryCodeISO"]);
        array_push($content,$photoRow["content"]);
    }
    $result = [];
    array_push($result, $title);
    array_push($result, $description);
    array_push($result, $path);
    array_push($result,$imageID);
    array_push($result,$cityCode);
    array_push($result,$countryCodeISO);
    array_push($result,$content);

    echo json_encode($result);
}