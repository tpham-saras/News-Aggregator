function myFunction(){
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}

function closePopup(){
    document.getElementById('popup').style.display='none';
    document.body.style.backgroundColor = "white";
}

function openPopup(){
    document.getElementById('popup').style.display='block';
    document.body.style.backgroundColor = '#484848';
}