$("#showSidebarBtn").click(function (){
    $(".sidebar").animate({
        marginLeft: 0
    });
});

$("#hideSidebarBtn").click(function (){
    $(".sidebar").animate({
        marginLeft: '-100%'
    });
});

function goUrl(url){
    setTimeout(function (){
        location.href = `${url}`;
    }, 500)};


$("#full-btn").click(function (){
    // alert("hello")
    let current = $("#full-btn").closest("#full");
    current.toggleClass("full-screen");
    if(current.hasClass('full-screen')){
        $("#full-btn").html(` <i class="feather-minimize"></i>`);
    }else {
        $("#full-btn").html(` <i class="feather-maximize"></i>`);
    }
});
$(".full-btn").click(function (){
    // alert("hello")
    let current = $(".full-btn").closest(".full");
    current.toggleClass("full-screen");
    if(current.hasClass('full-screen')){
        $(".full-btn").html(` <i class="feather-minimize"></i>`);
    }else {
        $(".full-btn").html(` <i class="feather-maximize"></i>`);
    }
});


let screenHeight = $(window).height();
let currentScrollHeight = $(".nav-main .active-nav").offset().top;

if(screenHeight*0.8<currentScrollHeight){
    $(".sidebar").animate({
        scrollTop: currentScrollHeight
    }, 1000)
}

