
<?php
//搜索页面的搜索逻辑
$isTitle=$_POST["byTitle"];
$isDescription=$_POST["byDescription"];
$title = $_POST["title"];
$description = $_POST["description"];

include 'sqlConnect.php';
//创建连接
$conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
if(!is_null($isTitle)){
    $findSearchSql="SELECT Title,Description,PATH FROM travelimage WHERE Title LIKE'%{$title}%';";
}
else if(!is_null($isDescription)){
    $findSearchSql="SELECT Title,Description,PATH FROM travelimage WHERE Description LIKE '%{$description}%';";
}

$searchResult=mysqli_query($conn,$findSearchSql);
$title=[];
$description=[];
$imageName=[];
while($photoRow =mysqli_fetch_assoc($searchResult))
{
    array_push($title,$photoRow["Title"]);
    array_push($description,$photoRow["Description"]);
    array_push($imageName,$photoRow["PATH"]);
}
$result = [];
array_push($result,$title);
array_push($result,$description);
array_push($result,$imageName);
echo json_encode($result);