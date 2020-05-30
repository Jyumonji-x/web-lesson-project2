// 二级联动实现国家对应的城市显示
$(document).ready(function(){
    $("#countries").change(function() {
        $.post("../php/browseCitiesSelect.php",{iso:$("#countries option:selected").val()}, function (data) {
            data = JSON.parse(data);
            let lists = document.getElementById("cities");

            lists.innerHTML = "";

            //<option value="0">Filter by Country</option>
            let line = document.createElement("option");
            line.value = 'null';
            line.innerHTML = "Filter by City";
            lists.append(line);
            for (let i = 0; i < data[1].length; i++) {
                line = document.createElement("option");
                line.value = data[1][i];
                line.innerHTML = data[0][i];
                lists.append(line);
            }
        })
    })
});