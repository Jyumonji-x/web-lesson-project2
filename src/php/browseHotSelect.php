<?php
//搜索页面获取热门标签
include 'sqlConnect.php';
//创建连接
$conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
//获取热门的content标签
$findHotContentSql="SELECT content FROM travelimage WHERE  content is not null;";
$contentResult=mysqli_query($conn,$findHotContentSql);
$count=[];
while($row = mysqli_fetch_assoc($contentResult))
{
    if(!isset($count[$row['content']])){
        $count[$row['content']]=1;
    }
    else{
        $count[$row['content']]++;
    }
}

$content = array_keys($count)[0];
$result = [];
$contents=[];
array_push($contents,$content);
array_push($result,$contents);
$findHotCountryIdSql="SELECT CountryCodeISO FROM travelimage WHERE CountryCodeISO is not null;";

$isoResult=mysqli_query($conn,$findHotCountryIdSql);
$count=[];
while($row = mysqli_fetch_assoc($isoResult))
{
    if(!isset($count[$row['CountryCodeISO']])&&!is_null($row['CountryCodeISO'])){
        $count[$row['CountryCodeISO']]=1;
    }
    else{
        $count[$row['CountryCodeISO']]++;
    }
}
arsort($count);
$flag = 0;
$iso1 = null;
$iso2 = null;
for($i=0;$i<count($count);$i++){
    if(!is_null(array_keys($count)[$i])&&is_null($iso1)){
        $iso1 = array_keys($count)[$i];
    }
    else if(!is_null(array_keys($count)[$i])&&!is_null($iso1)){
        $iso2 = array_keys($count)[$i];
        break;
    }
}
//获取热门的country标签，可以获取两个
$findHotCountryNameIdSql="SELECT CountryName,ISO FROM geocountries WHERE ISO ='{$iso1}' OR ISO = '{$iso2}' ;";
$countryNameResult=mysqli_query($conn,$findHotCountryNameIdSql);
$countries=[];
$countryNames=[];
$countryISOs=[];
while($row = mysqli_fetch_assoc($countryNameResult))
{
    array_push($countryNames,$row["CountryName"]);
    array_push($countryISOs,$row["ISO"]);
}
array_push($countries,$countryISOs);
array_push($countries,$countryNames);
array_push($result,$countries);
arsort($count);
//获取热门的city标签，可以获取两个
$findHotCityIdSql="SELECT CityCode FROM travelimage WHERE CityCode is not null;";
$idResult=mysqli_query($conn,$findHotCityIdSql);
$count=[];
while($row = mysqli_fetch_assoc($idResult))
{
    if(!isset($count[$row['CityCode']])&&!is_null($row['CityCode'])){
        $count[$row['CityCode']]=1;
    }
    else{
        $count[$row['CityCode']]++;
    }
}
arsort($count);

$id1=null;
$id2=null;
for($i=0;$i<count($count);$i++){
    if(!is_null(array_keys($count)[$i])&&is_null($id1)){
        $id1 = array_keys($count)[$i];

    }
    else if(!is_null(array_keys($count)[$i])&&!is_null($id1)){
        $id2 = array_keys($count)[$i];
        break;
    }
}
$findHotCityNameIdSql="SELECT AsciiName,GeoNameID FROM geocities WHERE GeoNameID ='{$id1}' OR GeoNameID = '{$id2}' ;";
$cityNameResult=mysqli_query($conn,$findHotCityNameIdSql);
$cities=[];
$cityNames=[];
$cityIDs=[];
while($row = mysqli_fetch_assoc($cityNameResult))
{
    array_push($cityNames,$row["AsciiName"]);
    array_push($cityIDs,$row["GeoNameID"]);
}
array_push($cities,$cityIDs);
array_push($cities,$cityNames);
array_push($result,$cities);
echo json_encode($result);
