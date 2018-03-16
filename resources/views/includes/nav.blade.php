<script>
  $(document).ready(function () {
    loadhtml();
    paceLoading();
    butonactions();
    hamburger();
    tabactions();
    progressactions();
    formelementactions();
    messageclosebuttonactions()
    notifyactions();
    cardhoveractions();
    colorize();
    $(".ui.accordion").accordion();//accordion trigger
    $(".ui.rating").rating();//rating trigger
    $(".ui.dropdown").dropdown();//dropdown and select trigger

    //sidebar trigger
    $("#toc").sidebar({
        dimPage: true,
        transition: "overlay",
        mobileTransition: "uncover"
    });
    //sidebar trigger

    $("body").niceScroll({ cursorcolor: "#ddd", cursorwidth: 5, cursorborderradius: 0, cursorborder: 0, scrollspeed: 50, autohidemode: true, zindex: 9999999 });//body scroll tigger by nicescroll
    
});
function loadhtml(){
//   $(".toc").load("html/loadsidemenu.html", function () {
            $(".ui.accordion").accordion();
            $(".sidemenu").niceScroll({ cursorcolor: "#ddd", cursorwidth: 5, cursorborderradius: 0, cursorborder: 0, scrollspeed: 50, autohidemode: true, zindex: 9999999, bouncescroll: true });//sidebar scrool trigger by nicescroll
//         });
//         $(".navbarmenu").load("html/loadnavbar.html", function () {
            hamburger();
            $(".ui.dropdown").dropdown();
//         });
//         $("#toc").load("html/loadmobilside.html", function () {
            $(".ui.accordion").accordion();
//         });
//         $(".mobilenavbar").load("html/loadmobilnavbar.html", function () {

            $(".ui.dropdown").dropdown({
                allowCategorySelection: true
            });
            $("#toc").sidebar("attach events", ".launch.button, .view-ui, .launch.item");
//         });
}
</script>