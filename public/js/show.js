function send_comment(z){
    var form = $(z).parents('form');
    var data = $(form).serialize();
    var url = form[0].action;
    $.ajax({
        url:url,
        data:data,
        type:'post',
        success:function(e){
            alert(e);
        }
    })
}