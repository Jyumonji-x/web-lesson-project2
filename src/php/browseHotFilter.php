<!--搜索页面热门标签搜索-->
<?php
include 'sqlConnect.php';
//创建连接
$conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
$id = $_POST["lineID"];
$kind = $_POST["lineClass"];
if($kind=="contentTag"){
    $findHotSql="SELECT Title,Description,PATH FROM travelimage WHERE (content = '{$id}');";
}else if($kind=="countryTag"){
    $findHotSql="SELECT Title,Description,PATH FROM travelimage WHERE (CountryCodeISO = '{$id}') ;";
}else if($kind=="cityTag"){
    $findHotSql="SELECT Title,Description,PATH FROM travelimage WHERE (CityCode = '{$id}') ;";
}
else{

}
$hotResult=mysqli_query($conn,$findHotSql);
$title=[];
$description=[];
$imageName=[];
while($photoRow =mysqli_fetch_assoc($hotResult))
{
    array_push($title,$photoRow["Title"]);
    array_push($imageName,$photoRow["PATH"]);
}
$result = [];
array_push($result,$title);
array_push($result,$imageName);
echo json_encode($result);