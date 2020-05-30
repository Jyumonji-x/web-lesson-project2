// 二级联动菜单的搜索逻辑
$(document).ready(function(){
    $("#chooserFilterBtn").click(function() {
        if($("#countries option:selected").val()==="null"&&$("#cities option:selected").val()==="null"&&$("#contents option:selected").val()==="null"){
            alert("Please choose something first.")
        }else{
            $.post("../php/browseChooserFilter.php",{countryISO:$("#countries option:selected").val(),cityID:$("#cities option:selected").val(),content:$("#contents option:selected").val()}, function (data) {
                data = JSON.parse(data);
                if(data[0].length!==0){
                    showResult(data,1);
                }
                else showResult(data,0);

            })
        }
    })
});