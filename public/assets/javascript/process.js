const body = document.querySelector("body");
sidebar = body.querySelector(".app");
toggle = body.querySelector(".toggle");
modeSwitch = body.querySelector(".aside-footer");
modeText = body.querySelector(".d-compact-menu-none");

modeSwitch.addEventListener("click", ()=>{
    if(body.classList.contains('dark-skin')){
        modeText.innerText = "Light Mode"
    }else{
        modeText.innerText = "Dark Mode"
    }
})
