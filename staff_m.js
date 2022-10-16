function f1(element,idd){

var idd=idd;
    var id=element.id;
    let x=document.getElementById(id).innerText;

    const words = x.split(' ');

    document.getElementById('fname').value=words[0];
    document.getElementById('lname').value=words[1];
    document.getElementById('theId').value=idd;
    document.getElementById('s').innerHTML='('+x+')';
    document.getElementById('s1').innerHTML='('+x+')';

}
