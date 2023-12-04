var select = document.getElementsByClassName("select");

function selectFormS(event) {
    event.target.style.color='#000';
}
function selectFormD(event){
    event.target.style.color='#fff';
}

for (let index = 0; index < select.length; index++) {
    select[index].addEventListener("click",selectFormS);
    select[index].addEventListener("mouseout",selectFormD);
    
}



