//二级联动实现的国家显示
$(document).ready(function(){

    $.post("../php/browseCountriesSelect.php",function(data) {
        data = JSON.parse(data);
        let lists = document.getElementById("countries");
        lists.innerHTML="";
        let line = document.createElement("option");
        line.value='null';
        line.innerHTML = "Filter by Country";
        lists.append(line);
        for(let i =0;i<data[1].length;i++){
            line =document.createElement("option");
            line.value = data[1][i];
            line.innerHTML = data[0][i];
            lists.append(line);
        }
    })
});
