
<?php
include 'sqlConnect.php';
//主页查找热门图片

//创建连接
$conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);

$findFavorIdSql="SELECT ImageID FROM travelimagefavor;";
$idResult=mysqli_query($conn,$findFavorIdSql);
$count=[];

while($row = mysqli_fetch_assoc($idResult))
{
    if(!isset($count[$row['ImageID']])){
        $count[$row['ImageID']]=1;
    }
    else{
        $count[$row['ImageID']]++;
    }
}
arsort($count);
$selected = array_slice(array_keys($count),0,6);
$title=[];
$description=[];
$imageName=[];
$imageID=[];
$in = implode(',', $selected);
$findPhotoSql="SELECT ImageID,Title,Description,PATH FROM travelimage WHERE ImageID IN ({$in});";
$urlResult=mysqli_query($conn,$findPhotoSql);

while($photoRow =mysqli_fetch_assoc($urlResult))
{
    array_push($title,$photoRow["Title"]);
    array_push($description,$photoRow["Description"]);
    array_push($imageName,$photoRow["PATH"]);
    array_push($imageID,$photoRow["ImageID"]);
}
$result = [];
array_push($result,$title);
array_push($result,$imageName);
array_push($result,$description);
array_push($result,$imageID);

echo json_encode($result);