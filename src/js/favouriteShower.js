// 收藏页面的显示
$(document).ready(function(){
        $.post("../php/favouriteShower.php", function (data) {

            console.log(data);
            data = JSON.parse(data);
            if(data[0].length!==0){
                favoriteShowResult(data,1);
            }
            else favoriteShowResult(data,0);

        })
    function favoriteShowResult(data,pageNumber) {
        let resultBox = document.getElementById("favorBox");
        let pageBox = document.getElementById("pageBox");
        const everyPage = 6;
        resultBox.innerHTML="";
        pageBox.innerHTML="";

        let imgNumber = 0;
        for(let i =0;i<data[2].length;i++){
            if(data[2][i]!=null){
                imgNumber++;
            }
        }
        console.log(imgNumber);
        let pageAmount = Math.ceil(imgNumber/everyPage);
        if(pageNumber!==0) {
            if (pageNumber !== 1) {
                let previous = document.createElement("li");
                let previousLink = document.createElement("a");
                previousLink.classList.add("page-link");
                previousLink.innerHTML = "Previous";
                previous.onclick = function () {
                    favoriteShowResult(data, pageNumber - 1)
                };
                previous.append(previousLink);
                previous.classList.add("page-item");
                pageBox.append(previous);
            }
            for (let i = 1; i <= pageAmount&&i<pageNumber+5; i++) {
                let page = document.createElement("li");
                let pageLink = document.createElement("a");
                page.classList.add("page-item");
                pageLink.classList.add("page-link");
                pageLink.innerHTML = i;
                page.onclick = function () {
                    favoriteShowResult(data, i)
                }
                page.append(pageLink);
                if (i === pageNumber) {
                    page.classList.add("active");
                }
                pageBox.append(page);
            }
            if (pageNumber !== pageAmount) {
                let next = document.createElement("li");
                let nextLink = document.createElement("a");
                nextLink.classList.add("page-link");
                nextLink.innerHTML = "Next";
                next.onclick = function () {
                    favoriteShowResult(data, pageNumber + 1)
                }
                next.append(nextLink);
                next.classList.add("page-item");
                pageBox.append(next);
            }

            for(let i =0;i<6;i++){
                if(data[2][(pageNumber-1)*everyPage+i]!==null&&data[2][(pageNumber-1)*everyPage+i]!==undefined){
                    let main = document.createElement("div");
                    main.classList.add("card","mb-3","col-12");
                    let main2 = document.createElement("div");
                    main2.classList.add("row","no-gutters");
                    let col2 = document.createElement("div");
                    col2.classList.add("col-2","pictureFrame");
                    let img = document.createElement("div");
                    let a =document.createElement("a");
                    a.href="./Details.php?path="+data[2][(pageNumber-1)*everyPage+i];
                    img.classList.add("card-img","pictureShowingPicture");
                    img.style.backgroundImage = 'url(../../img/images/'+data[2][(pageNumber-1)*everyPage+i]+')';
                    a.append(img);
                    col2.append(a);
                    let textBox = document.createElement("div");
                    textBox.classList.add("card-body");
                    let title = document.createElement("h5");
                    title.classList.add("card-title");
                    title.innerHTML=data[0][(pageNumber-1)*everyPage+i];
                    let content = document.createElement("p");
                    content.classList.add("card-text","shortContent");
                    content.innerHTML=data[1][(pageNumber-1)*everyPage+i];
                    let deleteBtn = document.createElement("button");
                    deleteBtn.type="button";
                    deleteBtn.classList.add("btn","btn-primary");
                    deleteBtn.innerHTML="Delete";
                    deleteBtn.onclick=function(){
                        deleteFavor( data[3][(pageNumber-1)*everyPage+i] );
                    }
                    textBox.append(title,content,deleteBtn);
                    let col8 = document.createElement("div");
                    col8.classList.add("col-8");
                    col8.append(textBox);
                    main2.append(col2,col8);
                    main.append(main2);
                    resultBox.append(main);
                }
            }
        }
        else resultBox.innerHTML="<p>You don't have favorite photos!</p>"
    }
    function deleteFavor(imageID) {
        $.post("../php/favouriteDeleteFavor.php",{imageID:imageID}, function (data) {
            window.location.reload();
        })
    }
});
