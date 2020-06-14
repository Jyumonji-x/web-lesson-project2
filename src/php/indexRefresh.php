
<?php
//主页刷新
function getRefresh()
{
    include 'sqlConnect.php';
//创建连接
    $conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    $randomSql = "SELECT Title,PATH,Description FROM travelimage ORDER BY rand() limit 6;";
    $urlResult = mysqli_query($conn, $randomSql);
    $title = [];
    $path = [];
    $content = [];
    while ($row = mysqli_fetch_assoc($urlResult)) {
        array_push($title, $row['Title']);
        array_push($path, $row['PATH']);
        array_push($content, $row['Description']);
    }
    $result = [];
    array_push($result,$title);
    array_push($result,$path);
    array_push($result,$content);
    echo json_encode($result);

}
getRefresh();
