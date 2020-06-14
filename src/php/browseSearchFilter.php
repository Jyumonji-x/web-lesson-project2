
<?php
//搜索页面的模糊搜索
include 'sqlConnect.php';
//创建连接
$conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
$searchContent = $_POST["input"];

    $findSearchSql="SELECT Title,Description,PATH FROM travelimage WHERE Title LIKE '%{$searchContent}%';";

$searchResult=mysqli_query($conn,$findSearchSql);
$title=[];
$description=[];
$imageName=[];
while($photoRow =mysqli_fetch_assoc($searchResult))
{
    array_push($title,$photoRow["Title"]);
    array_push($imageName,$photoRow["PATH"]);
}
$result = [];
array_push($result,$title);
array_push($result,$imageName);
echo json_encode($result);