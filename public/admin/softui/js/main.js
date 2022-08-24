window.livewire.onError(statusCode => {
    return false
})

$("#tabToggle01").click(function(){
    $(".tabToggle01").addClass("intro");
    $(".tabToggle02").removeClass("intro");
    $(".tabToggle03").removeClass("intro");
});
$("#tabToggle02").click(function(){
    $(".tabToggle02").addClass("intro");
    $(".tabToggle01").removeClass("intro");
    $(".tabToggle03").removeClass("intro");
});
$("#tabToggle03").click(function(){
    $(".tabToggle03").addClass("intro");
    $(".tabToggle01").removeClass("intro");
    $(".tabToggle02").removeClass("intro");
});







$("#sectabToggle01").click(function(){
    $(".sectabToggle01").addClass("intro");
    $(".sectabToggle02").removeClass("intro");
    $(".sectabToggle03").removeClass("intro");
});
$("#sectabToggle02").click(function(){
    $(".sectabToggle02").addClass("intro");
    $(".sectabToggle01").removeClass("intro");
    $(".sectabToggle03").removeClass("intro");
});
$("#sectabToggle03").click(function(){
    $(".sectabToggle03").addClass("intro");
    $(".sectabToggle01").removeClass("intro");
    $(".sectabToggle02").removeClass("intro");
});




$("#thirdtabToggle01").click(function(){
    $(".thirdtabToggle01").addClass("intro");
    $(".thirdtabToggle02").removeClass("intro");
    $(".thirdtabToggle03").removeClass("intro");
});
$("#thirdtabToggle02").click(function(){
    $(".thirdtabToggle02").addClass("intro");
    $(".thirdtabToggle01").removeClass("intro");
    $(".thirdtabToggle03").removeClass("intro");
});
$("#thirdtabToggle03").click(function(){
    $(".thirdtabToggle03").addClass("intro");
    $(".thirdtabToggle01").removeClass("intro");
    $(".thirdtabToggle02").removeClass("intro");
});


$("#fourtabToggle01").click(function(){
    $(".fourtabToggle01").addClass("intro");
    $(".fourtabToggle02").removeClass("intro");
    $(".fourtabToggle03").removeClass("intro");
});
$("#fourtabToggle02").click(function(){
    $(".fourtabToggle02").addClass("intro");
    $(".fourtabToggle01").removeClass("intro");
    $(".fourtabToggle03").removeClass("intro");
});
$("#fourtabToggle03").click(function(){
    $(".fourtabToggle03").addClass("intro");
    $(".fourtabToggle01").removeClass("intro");
    $(".fourtabToggle02").removeClass("intro");
});



$("#fivetabToggle01").click(function(){
    $(".fivetabToggle01").addClass("intro");
    $(".fivetabToggle02").removeClass("intro");
    $(".fivetabToggle03").removeClass("intro");
});
$("#fivetabToggle02").click(function(){
    $(".fivetabToggle02").addClass("intro");
    $(".fivetabToggle01").removeClass("intro");
    $(".fivetabToggle03").removeClass("intro");
});
$("#fivetabToggle03").click(function(){
    $(".fivetabToggle03").addClass("intro");
    $(".fivetabToggle01").removeClass("intro");
    $(".fivetabToggle02").removeClass("intro");
});


function headerContent() {
    var x = document.getElementById('header-content-section');
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}



function infoBlocks() {
    var x = document.getElementById('info-blocks-section');
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}


function infoBlocksHeader() {
    var x = document.getElementById('infoBlocksHeader');
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

$('[data-fancybox]').fancybox({
    // Options will go here
    buttons : [
        'close'
    ],
    wheel : false,
    transitionEffect: "slide",
    // thumbs          : false,
    // hash            : false,
    loop            : true,
    // keyboard        : true,
    toolbar         : false,
    // animationEffect : false,
    // arrows          : true,
    clickContent    : false
});

function closeGallery() {
    var x = document.getElementById('gallery-section');
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}



