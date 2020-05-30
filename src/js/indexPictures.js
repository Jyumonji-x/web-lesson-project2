// 主页图片初始化显示
$(document).ready(function(){
        $.get("./src/php/indexFindFavorPhotos.php",function(data) {
            data = JSON.parse(data);
            console.log(data);
            let mainBox = document.getElementById("pictureShowing");
            mainBox.innerHTML="";
            let row =document.createElement("div");
            row.classList.add("row");
            for(let i =0;i<3;i++){
                let col = document.createElement("div");
                col.classList.add("col-sm");
                for(let j =0;j<2;j++){
                    col.append(onePictureBox(j+i*2));
                }
                row.append(col);
            }
            mainBox.append(row);
            function onePictureBox(i) {
                let card = document.createElement("div");
                card.classList.add("card","mt-3","col-sm");

                let cardBody = document.createElement("div");
                cardBody.classList.add("card-body");

                let cardTitle = document.createElement("h5");
                cardTitle.classList.add("card-title");
                cardTitle.innerHTML=data[0][i];
                let cardText = document.createElement("p");
                cardText.classList.add("card-text","shortContent");
                cardText.innerHTML=data[2][i];
                cardBody.append(cardTitle,cardText);
                let a =document.createElement("a");
                a.href="./src/web/Details.php?path="+data[1][i];
                let img = document.createElement("img");
                img.src = "./img/images/"+data[1][i];
                img.classList.add("img-fluid","card-img-top");
                img.alt = "alt";
                a.append(img)
                card.append(a,cardBody);
                return card;
            }
        });
    });