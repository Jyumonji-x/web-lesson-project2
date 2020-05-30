<!--详情页面 显示详情的实现-->
<?php
session_start();
if (isset($_SESSION["sessionUid"])) {
    $userUid = $_SESSION["sessionUid"];
    $canLike=true;
}
else{
    $canLike=false;
}
    $path = $_POST["path"];
include 'sqlConnect.php';
//创建连接
$conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);

$photoSql = "SELECT * FROM travelimage WHERE PATH='{$path}'";
$photoResult = mysqli_query($conn, $photoSql);
$description = "";
while ($photoRow = mysqli_fetch_assoc($photoResult)) {
    $imageID = $photoRow["ImageID"];
    $title=$photoRow["Title"];
    $description=$photoRow["Description"];
    $path = $photoRow["PATH"];
    $content = $photoRow["content"];
    $countryCode = $photoRow["CountryCodeISO"];
    $cityCode = $photoRow["CityCode"];
    $uid = $photoRow["UID"];
}

$countrySql = "SELECT CountryName FROM geocountries WHERE ISO='{$countryCode}'";
$countryResult = mysqli_query($conn, $countrySql);
while ($countryRow = mysqli_fetch_assoc($countryResult)) {
    $countryName = $countryRow["CountryName"];
}
$citySql = "SELECT AsciiName FROM geocities WHERE GeoNameID='{$cityCode}'";
$cityResult = mysqli_query($conn, $citySql);
if($cityResult){
    while ($cityRow = mysqli_fetch_assoc($cityResult)) {
        $cityName = $cityRow["AsciiName"];
    }
}

$userSql = "SELECT UserName FROM traveluser WHERE UID = '{$uid}'";
$userResult = mysqli_query($conn, $userSql);
while ($userRow = mysqli_fetch_assoc($userResult)) {
    $userName = $userRow["UserName"];
}

$findFavorIdSql="SELECT ImageID FROM travelimagefavor WHERE ImageID = '{$imageID}';";
$idResult=mysqli_query($conn,$findFavorIdSql);
$count=0;
while($row = mysqli_fetch_assoc($idResult))
{
    $count++;
}
$like = false;
if($canLike){
    $findFavorSql="SELECT * FROM travelimagefavor WHERE ImageID = '{$imageID}' AND UID='{$userUid}';";
    $favorOrNot = mysqli_query($conn,$findFavorSql);
    while ($row = mysqli_fetch_assoc($favorOrNot)){
        $like = true;
    }
}
$result = [];
array_push($result, $imageID);
array_push($result, $title);
array_push($result, $description);
array_push($result, $path);
array_push($result, $content);
array_push($result, $countryName);
array_push($result, $cityName);
array_push($result, $userName);
array_push($result, $count);
array_push($result, $canLike);
array_push($result, $like);
echo json_encode($result);
