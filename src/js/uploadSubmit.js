//上传页面的提交逻辑
function photoSubmit(){
    let img = document.getElementById("input_file");
    let title = document.getElementById("titleBox").value;
    let description = document.getElementById("descriptionBox").value;
    let content = document.getElementById("contents").value;
    let country = document.getElementById("countries").value;
    let city = document.getElementById("cities").value;
    if(img[0].files[0]===undefined){
        alert("Please upload the photo!");
    }
    else if(title===""){
        alert("Please put in the Title!");
    }
    else if(description===""){
        alert("Please put in the Description!");
    }
    else if(content==="Filter by Content"){
        alert("Please choose the Content!");
    }
    else if(country===null||country==="0"){
        alert("Please choose the Country!");
    }
    else{
        //img.submit();
        let path = img[0].files[0].name;
        $.post("../php/uploadSubmit.php",{file:img.files[0],title:title,description:description,content:content,country:country,city:city,path:path}, function (data) {
            console.log(data);
            // window.location.href ="./myPhoto.php";
        })

    }

}

function submitForm(){
    let imgFile = document.getElementById("input_file").value;
    let title = document.getElementById("titleBox").value;
    let description = document.getElementById("descriptionBox").value;
    let content = document.getElementById("contents").value;
    let country = document.getElementById("countries").value;
    if(imgFile === ""){
        alert("Please upload the Photo!")
    }
    else if(title===""){
        alert("Please put in the Title!");
    }
    else if(description===""){
        alert("Please put in the Description!");
    }
    else if(content==="null"){
        alert("Please choose the Content!");
    }
    else if(country==="null"){
        alert("Please choose the Country!");
    }
    else{
        document.getElementById("form").submit();
    }
}