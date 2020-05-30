//修改页面显示
$(document).ready(function(){
    let imageID=1;
    let url = window.location.href;
    let position = url.indexOf("?imageID=")+9;
    if(position!==8){
        imageID = url.substring(position);
    }
    $.post("../php/uploadModifyShower.php",{imageID:imageID}, function (data) {
        data=JSON.parse(data);
        console.log(data);
        let photo = document.getElementById("modifiedPhoto");
        photo.src = "../../img/images/"+data[2][0];
        document.getElementById("titleBox").value = data[0][0];
        document.getElementById("descriptionBox").value = data[1][0];
        let contents = document.getElementById("contents");
        for(let i = 0;i<contents.length;i++){
            if (contents[i].value===data[6][0]){
                contents[i].selected=true;
            }
        }
        $.post("../php/browseCountriesSelect.php",function(data1) {
            data1 = JSON.parse(data1);
            let lists = document.getElementById("countries");
            lists.innerHTML="";
            let line = document.createElement("option");
            line.value="0";
            line.innerHTML = "Filter by Country";
            lists.append(line);
            for(let i =0;i<data1[1].length;i++){
                line =document.createElement("option");
                line.value = data1[1][i];
                line.innerHTML = data1[0][i];
                lists.append(line);
            }
            let countryList =document.getElementById("countries");
            let selectedCountry= 0;
            if(data[5]!==undefined){
                selectedCountry = data[5][0];
            }
            for(let i=0;i<countryList.length;i++){
                if(countryList[i].value===selectedCountry)
                    countryList[i].selected = true;
            }

            $.post("../php/browseCitiesSelect.php",{iso:$("#countries option:selected").val()}, function (data0) {
                data0 = JSON.parse(data0);

                let lists = document.getElementById("cities");

                lists.innerHTML = "";

                //<option value="0">Filter by Country</option>
                let line = document.createElement("option");
                line.value = "0";
                line.innerHTML = "Filter by City";
                lists.append(line);
                for (let i = 0; i < data0[1].length; i++) {
                    line = document.createElement("option");
                    line.value = data0[1][i];
                    line.innerHTML = data0[0][i];
                    lists.append(line);
                }
                let cityList =document.getElementById("cities");
                let selectedCity= 0;
                if(data[4]!==undefined){
                    selectedCity = data[4][0];
                }

                for(let i=0;i<cityList.length;i++){
                    if(cityList[i].value===selectedCity)
                        cityList[i].selected = true;
                }
            })
        })
    })
    $("#countries").change(function() {
        $.post("../php/browseCitiesSelect.php",{iso:$("#countries option:selected").val()}, function (data) {
            console.log($("#countries option:selected").val());
            data = JSON.parse(data);
            let lists = document.getElementById("cities");

            lists.innerHTML = "";

            //<option value="0">Filter by Country</option>
            let line = document.createElement("option");
            line.value = "0";
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

})