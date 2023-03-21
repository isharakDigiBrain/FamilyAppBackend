//customize.js
// this page has created ishara 
//each customize js codes goes here
//main.js file don't remove controller function work in that section

function openModal(btnInfo) {
    var buttonClass = $(btnInfo).attr('class').split(" ")[0];
    $modal =
        $('#' + buttonClass + "-modal").addClass("modal-animation-two").removeClass("out");
    $('body').addClass('modal-active');
}

$('.close-modal-btn').click(function () {
    //getting parent modal id to close it
    var modalId = $(this).parent().parent().parent().attr("id");
    $("#" + modalId).addClass('out');
    $('body').removeClass('modal-active');
});

//icon animation
$(document).ready(function () {
    if (window.matchMedia('(max-width: 1000px)').matches) {
        $(".sidebar").addClass('close');
    } else {
        $(".sidebar").addClass('open');
    }
    $('.animatedMenuIcon').click(function () {
        $(this).toggleClass('open');
        console.log($(".sidebar"))
        if ($(this).hasClass('open')) {
            $(".sidebar").removeClass('close').addClass('open');

        } else {
            $(".sidebar").removeClass('open').addClass('close');

        }

    });
});

//toggling open close user menu
function userMenuToggle() {
    const toggleMenu = document.querySelector(".user-menu");
    toggleMenu.classList.toggle("active");
}