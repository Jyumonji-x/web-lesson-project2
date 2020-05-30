//模糊搜索的逻辑实现
$(document).ready(function(){

    $("#searchBtn").click(function() {
        if(document.getElementById("searchInput").value === ""){
            alert("Please input something first!");
        }else{
            $.post("../php/browseSearchFilter.php",{input:$("input:text[id='searchInput']").val()}, function (data) {

                data = JSON.parse(data);
                if(data[0].length!==0){
                    showResult(data,1);
                }
                else showResult(data,0);
            })
        }

    })
});