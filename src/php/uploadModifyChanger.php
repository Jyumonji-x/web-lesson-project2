<!--修改页面的修改实现-->
<?php

$imageID = $_POST["imageID"];
$title = addslashes($_POST["title"]);
$description = addslashes($_POST["description"]);
$content = $_POST["content"];
$countryCodeISO = $_POST["country"];
$cityCode = $_POST["city"];

session_start();
if (isset($_SESSION["sessionUid"])) {
    $userUid = $_SESSION["sessionUid"];
    include 'sqlConnect.php';
//创建连接
    $conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    $changeSql = "UPDATE travelimage SET Title='{$title}',Description='{$description}',content='{$content}',CityCode={$cityCode},CountryCodeISO='{$countryCodeISO}' WHERE ImageID = {$imageID} AND UID={$userUid};";
    echo $changeSql;
    $Result = mysqli_query($conn, $changeSql);

}