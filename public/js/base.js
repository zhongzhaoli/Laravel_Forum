$(window).load(function(){
    $("[data-delete]").on('click',function(){
        var card = $(this).parents(".card");
        var id = $(card).find("[name='id']").attr("value");
        var token = $(card).find("[name='_token']").attr("value");
        $.ajax({
            url:"/create/"+id,
            data:{"_method":"delete","_token":token},
            type:"post",
            success:function(e){
                if(e === "success"){
                    alert("删除成功");
                    $(card).remove();
                }
            }
        })
    })
    $("[data-write]").on('click',function(){
        var card = $(this).parents(".card");
        var id = $(card).find("[name='id']").attr("value");
        window.location.href="/create/"+id+"/edit";
    })

});