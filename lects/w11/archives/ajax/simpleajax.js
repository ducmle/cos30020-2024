function getData(dataSource, aName, aPwd)  {
    alert("source:"+dataSource+"***Name:"+aName+"***Pwd:"+aPwd);
    $.ajax({
        type: "POST",
        url: dataSource,
        data: "name="+aName+"&pwd="+aPwd,
        success: function(msg){
            $("#response").html(msg);
        }
    });
}
