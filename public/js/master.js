$(document).ready(function() {
    $("nav ul li a").hover(
        function () {
            $(this).find(".menu-desc:first").show(200);
        },
        function () {
            $(this).find(".menu-desc:first").hide(200);
        }
    );
});