//显示结果的函数，实现了分页逻辑
function showResult(data,pageNumber) {
    let mainBox = document.getElementById("filterResult");
    let pageBox = document.getElementById("pages");
    const everyPage = 12;
    mainBox.innerHTML = "";
    pageBox.innerHTML="";

    let imgNumber = 0;
    for(let i =0;i<data[1].length;i++){
        if(data[1][i]!=null){
            imgNumber++;
        }
    }
    let pageAmount = Math.ceil(imgNumber/everyPage);

if(pageNumber!==0){
    if(pageNumber!==1){
        let previous = document.createElement("li");
        let previousLink = document.createElement("a");
        previousLink.classList.add("page-link");
        previousLink.innerHTML="Previous";
        previous.onclick=function (){
            showResult(data,pageNumber-1)
        };
        previous.append(previousLink);
        previous.classList.add("page-item");
        pageBox.append(previous);
    }
    for(let i =1; i<=pageAmount&&i<pageNumber+5 ; i++){
        let page = document.createElement("li");
        let pageLink = document.createElement("a");
        page.classList.add("page-item");
        pageLink.classList.add("page-link");
        pageLink.innerHTML=i;
        page.onclick=function () {
            showResult(data,i)
        }
        page.append(pageLink);
        if(i===pageNumber){
            page.classList.add("active");
        }
        pageBox.append(page);
    }
    if(pageNumber!==pageAmount) {
        let next = document.createElement("li");
        let nextLink = document.createElement("a");
        nextLink.classList.add("page-link");
        nextLink.innerHTML = "Next";
        next.onclick = function () {
            showResult(data, pageNumber + 1)
        }
        next.append(nextLink);
        next.classList.add("page-item");
        pageBox.append(next);
    }



    for(let i =1;i<4;i++){
        let row = document.createElement("div");
        row.classList.add("row","mb-3");
        for(let j =1;j<5;j++){
            if(imageFrame(everyPage*(pageNumber-1)+4*(i-1)+j-1)){
                console.log(everyPage*(pageNumber-1)+4*(i-1)+j-1);
                row.append(imageFrame(everyPage*(pageNumber-1)+4*(i-1)+j-1));
            }
        }
        mainBox.append(row);

    }

}
else{
    mainBox.innerHTML = "<p>Can't find a result.</p>";
}


    function imageFrame(i) {
        if(data[1][i]!=null){
            let imgFrame = document.createElement("div");
            let img = document.createElement("div");
            let a =document.createElement("a");
            a.href = "./Details.php?path="+data[1][i];
            img.classList.add("pictureShowingPicture","img-fluid");
            img.style.backgroundImage = 'url(../../img/images/'+data[1][i]+')';
            imgFrame.classList.add("col-3","pictureFrame");
            a.append(img);
            imgFrame.append(a);
            return imgFrame;

        }
        else{
            return false;
        }
    }
}