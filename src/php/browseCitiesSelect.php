
<?php
//搜索页面的二级联动显示城市条目的实现
include 'sqlConnect.php';
//创建连接
$conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
$selectedCountry=$_POST["iso"];
$findCitySql="SELECT GeoNameID,AsciiName FROM geocities WHERE CountryCodeISO='{$selectedCountry}' ORDER BY AsciiName;";
$cityResult=mysqli_query($conn,$findCitySql);
$cityName=[];
$GeoNameID = [];
while($cityRow =mysqli_fetch_assoc($cityResult))
{
    array_push($cityName,$cityRow["AsciiName"]);
    array_push($GeoNameID,$cityRow["GeoNameID"]);
}
$result = [];
array_push($result,$cityName);
array_push($result,$GeoNameID);
echo json_encode($result);