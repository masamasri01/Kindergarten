$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});


function  plus(){
    let box = document.getElementById('addroomdiv');

    let btn = document.getElementById('plusicon');
    if (box.style.display === 'none') {
        box.style.display = 'block';
        document.getElementById('navv').style.opacity(0.5);

    } else {
        box.style.display = 'none';

    }

}