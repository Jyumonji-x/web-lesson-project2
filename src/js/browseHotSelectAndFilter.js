// 获得热门的标签。其中可以获得最多1个content标签，2个city标签和2个country标签
$(document).ready(function(){
        $.post("../php/browseHotSelect.php", function (data) {
            data = JSON.parse(data);
            let frame = document.getElementById("hotTags");
            frame.innerHTML="";
            for(let i =0; i <data[0].length;i++){
                if(data[0][i]!==undefined) {
                    let line = document.createElement("a");
                    line.innerText = data[0][i];
                    line.id = data[0][i];
                    line.classList.add("list-group-item", "list-group-item-action","Tags");
                    line.title = "contentTag";
                    frame.append(line);
                }
            }
            for(let i =0; i <data[1].length;i++){
                if(data[1][1][i]!==undefined&&data[1][0][i]!==undefined) {
                    let line = document.createElement("a");
                    line.innerText = data[1][1][i];
                    line.id = data[1][0][i];
                    line.classList.add("list-group-item", "list-group-item-action","Tags");
                    line.title="countryTag";
                    frame.append(line);
                }
            }
            for(let i =0; i <data[2].length;i++){
                if(data[2][1][i]!==undefined&&data[2][0][i]!==undefined){
                    let line = document.createElement("a");
                    line.innerText = data[2][1][i];
                    line.id=data[2][0][i];
                    line.classList.add("list-group-item","list-group-item-action","Tags");
                    line.title = "cityTag";
                    frame.append(line);
                }
            }
            $(".Tags").click(function() {
                $.post("../php/browseHotFilter.php",{lineID:$(this).attr("id"),lineClass:$(this).attr("title")}, function (data) {
                    data = JSON.parse(data);
                    if(data[0].length!==0){
                        showResult(data,1);
                    }
                    else showResult(data,0);
                })
            })
        })

});