// 详细页面的信息获取实现
$(document).ready(function(){
    let imagePath=1;
    let url = window.location.href;
    let position = url.indexOf("?path=")+6;
    if(position!==5){
        imagePath = url.substring(position);
    }
    $.post("../php/detailsShower.php",{path:imagePath}, function (data) {
        // php中data的顺序：
        // array_push($result, $imageID);
        // array_push($result, $title);
        // array_push($result, $description);
        // array_push($result, $path);
        // array_push($result, $content);
        // array_push($result, $countryName);
        // array_push($result, $cityName);
        // array_push($result, $userName);
        // array_push($result, $count);
        // array_push($result, $canLike);
        // array_push($result, $like);
        data = JSON.parse(data);
        console.log(data);
        let mainBox = document.getElementById("mainBox");
        mainBox.innerHTML = "";
        let title = document.createElement("h1");
        title.innerHTML = data[1];
        let bigRow = document.createElement("div");
        bigRow.classList.add("row","align-items-center","bg-light");
        let col8 = document.createElement("div");
        col8.classList.add("col-8");
        let img = document.createElement("img");
        img.src = "../../img/images/"+data[3];
        img.classList.add("img-fluid","m-4");
        let col3 = document.createElement("div");
        col3.classList.add("col-3","p-4");
        let likeNumber = document.createElement("h2");
        likeNumber.innerHTML = "like number: "+data[8];
        let likeBtn = document.createElement("button");
        likeBtn.classList.add("btn","btn-danger");

        if(data[10]) {
            likeBtn.innerHTML = "dislike";
            likeBtn.onclick = function () {
                detailDislike();
                window.location.reload();
            }
        }
        else {
            likeBtn.innerHTML = "like";
            likeBtn.onclick = function(){
                detailLike();
                window.location.reload();
            }
        }
        console.log(data[9]);
        if(!data[9]) likeBtn.disabled = true;
        let details = document.createElement("h2");
        details.innerHTML = "Details";
        let content = document.createElement("p");
        content.innerHTML = "Content: "+data[4];
        let country = document.createElement("p");
        country.innerHTML = "Country: "+data[5];
        let city = document.createElement("p");
        city.innerHTML = "City: "+data[6];
        let photographer = document.createElement("p");
        photographer.innerHTML = "Photographer: " + data[7];
        let descriptionFrame = document.createElement("div");
        descriptionFrame.classList.add("m-5");
        let description = document.createElement("p");
        description.innerHTML = data[2];
        col8.append(img);
        col3.append(likeNumber,likeBtn,details,content,country,city,photographer);
        bigRow.append(col8,col3);
        descriptionFrame.append(description);
        mainBox.append(title,bigRow,descriptionFrame);

        function detailLike() {
            $.post("../php/detailsLike.php",{imageID:data[0]}, function (data) {
                console.log(data);
            })
        }
        function detailDislike() {
            $.post("../php/detailsDislike.php",{imageID:data[0]}, function (data) {
                console.log(data);
            })
        }
    })
})