const eyeBtn = document.querySelectorAll(".eye-btn");

eyeBtn.forEach(btn => {
    btn.addEventListener("click",()=>{
        btn.classList.toggle("fa-eye");
        if(btn.previousElementSibling.getAttribute("type") == "password"){
            btn.previousElementSibling.setAttribute("type","text");
        }else{
            btn.previousElementSibling.setAttribute("type","password");
        }
    });
});