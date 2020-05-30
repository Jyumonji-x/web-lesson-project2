//修改页面的修改逻辑
function change() {
    let imageID=1;
    let url = window.location.href;
    let position = url.indexOf("?imageID=")+9;
    if(position!==8){
        imageID = url.substring(position);
    }

    let title = document.getElementById("titleBox").value;
    let description = document.getElementById("descriptionBox").value;
    let content = document.getElementById("contents").value;
    let country = document.getElementById("countries").value;
    let city = document.getElementById("cities").value;
    if(title===""){
        alert("Please put in the Title!");
    }
    else if(description===""){
        alert("Please put in the Description!");
    }
    else if(content==='null'){
        alert("Please choose the Content!");
    }
    else if(country==="null"){
        alert("Please choose the Country!");
    }
    else{
        $.post("../php/uploadModifyChanger.php",{imageID:imageID,title:title,description:description,content:content,country:country,city:city}, function (data) {
            window.location.href="MyPhoto.php";
            console.log(data);
        })

    }
    console.log("imageID="+imageID);
    console.log("title="+title);
    console.log("description="+description);
    console.log("content="+content);
    console.log("country="+country);
    console.log("city="+city);

}