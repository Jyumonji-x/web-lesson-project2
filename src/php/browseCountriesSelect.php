<!--搜索页面二级联动显示国家的实现-->
<?php
include 'sqlConnect.php';
//创建连接
$conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);

$findCountrySql="SELECT CountryName,ISO FROM geocountries ORDER BY CountryName;";
$countryResult=mysqli_query($conn,$findCountrySql);
$countryName=[];
$ISO = [];
while($countryRow =mysqli_fetch_assoc($countryResult))
{
    array_push($countryName,$countryRow["CountryName"]);
    array_push($ISO,$countryRow["ISO"]);
}
$result = [];
array_push($result,$countryName);
array_push($result,$ISO);
echo json_encode($result);