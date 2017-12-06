$(window).load(function () {
    $(".photo").on('click', function () {
        $("[name='photo']").click();
    })
})
function photo_change(a) {
    var file = $(a)[0].files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function (e) {
        var res = this.result;
        $(".photo img").attr('src', res);
    }
}