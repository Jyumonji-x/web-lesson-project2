
<?php
//搜索页面的二级联动搜索
include 'sqlConnect.php';
//创建连接
$conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
$selectedCountry=$_POST["countryISO"];
$selectedCity = $_POST["cityID"];
$selectedContent = $_POST["content"];
if($selectedContent ==="null"||$selectedContent ==="0"||is_null($selectedContent)){
    if($selectedCity==="null"||$selectedCity ==="0"||is_null($selectedCity)){
        $chooseSql = "SELECT Title,PATH,Description FROM travelimage WHERE CountryCodeISO='{$selectedCountry}'";
    }
    else if($selectedCountry==="null"||$selectedCountry ==="0"||is_null($selectedCountry)){
        $chooseSql = "SELECT Title,PATH,Description FROM travelimage";
    }
    else{
        $chooseSql = "SELECT Title,PATH,Description FROM travelimage WHERE CityCode='{$selectedCity}' AND CountryCodeISO='{$selectedCountry}'";
    }
}
else if($selectedCountry==='null'||$selectedCountry ==="0"||is_null($selectedCountry)){
    $chooseSql = "SELECT Title,PATH,Description FROM travelimage WHERE Content='{$selectedContent}'";
}
else if($selectedCity==="null"||$selectedCity ==="0"||is_null($selectedCity)){
    $chooseSql = "SELECT Title,PATH,Description FROM travelimage WHERE Content='{$selectedContent}' AND CountryCodeISO='{$selectedCountry}'";
}
else{
    $chooseSql = "SELECT Title,PATH,Description FROM travelimage WHERE CityCode='{$selectedCity}' AND CountryCodeISO='{$selectedCountry}' AND Content='{$selectedContent}'";
}
$chooseResult=mysqli_query($conn,$chooseSql);
$title = [];
$path = [];
while ($row = mysqli_fetch_assoc($chooseResult)) {
    array_push($title, $row['Title']);
    array_push($path, $row['PATH']);
}

$result = [];
array_push($result,$title);
array_push($result,$path);
echo json_encode($result);

