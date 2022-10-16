//add active class on click 
$('.dropdown-item').click( function (){
    $('.dropdown-item').removeClass('active')
    $(this).addClass('active')
})

$('.nav-link').click( function (){
    $('.nav-link').removeClass('active')
    $(this).addClass('active')
})
