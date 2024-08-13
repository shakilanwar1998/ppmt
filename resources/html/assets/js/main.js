$("#mobile-menu").on("click", function () {
    $(".menu-lang").toggleClass("mobile-line");
    $("#main-menu").toggleClass("collaps-menu");
});
$("#main-menu>ul>li>a").on("click", function () {
    $(".nav-menu-collaps").removeClass("collaps-menu");
    $(".menu-lang").removeClass("mobile-line");
});
$(".menu-overlay").on("click", function () {
    $(".nav-menu-collaps").removeClass("collaps-menu");
    $(".menu-lang").removeClass("mobile-line");
});


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});

// $(document).ready(function(){
//     $('.tabs-inner').click(function(){
//         $('.tabs-inner').removeClass('active-tab');
//         $(this).addClass('active-tab');
//     });
//     $('.tabs-inner a').click(function(){
//         $('.tabs-inner a').removeClass('activelink');
//         $(this).addClass('activelink');
//         var tagid = $(this).data('tag');
//         $('.tab').removeClass('active').addClass('hide');
//         $('#'+tagid).addClass('active').removeClass('hide');
//     });
// });