var required = document.getElementsByClassName("req");
var btn = document.getElementById('btn')

btn.addEventListener("click",()=>{
    for (let index = 0; index < required.length; index++) {
        required[index].removeAttribute("required");
    }
})