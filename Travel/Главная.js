$(function(){
    var header =$("#header"),
        firstB = $("#firstM").innerHeight(),
        scrolloffset = 0;

    $(window).on("scroll", function(){
        
        scrolloffset = $(this).scrollTop();
        console.log(scrolloffset);
        if(scrolloffset+80 >= firstB){
            header.addClass("header--fixed");
        }
        else{
            header.removeClass("header--fixed");
        }
    });
});