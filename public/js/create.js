$(document).ready(
    $("[name='editormd-image-file']").on("change", function (e) {
        
    })
)
function zxca(z){
    var a = $('<div class="editormd-dialog-mask editormd-dialog-mask-bg" style="display: block;"></div>').appendTo($("form"))
    var b = $('<div class="editormd-dialog-mask editormd-dialog-mask-con" style="display: block;"></div>').appendTo($("form"))
    var file = $("[name='editormd-image-file']")[0].files[0];
    var x = $(z);
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function (e) {
        var res = this.result;
        $.ajax({
            url: '/upphoto',
            type: 'post',
            data: { 'base64': res, '_token': $("[name='_token']").attr("value") },
            success: function (e) {
                $(a).remove();
                $(b).remove();
                $(x).parent().parent().find("[data-url]")[0].value = "http://10.50.102.135:1024/" + e;
                $(x).parent().parent().find("[data-alt]")[0].value = "描述";
                $(x).parent().parent().find("[data-link]")[0].value = "http://10.50.102.135:1024/" + e;  
            }
        })
    }
};