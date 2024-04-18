
document.addEventListener("DOMContentLoaded", function() {
    const buttonSubmit = document.querySelector(".btn-outline-success");
    const input= document.querySelector(".form-control");
    
    buttonSubmit.addEventListener("click", (e) =>{
        let varibleID= input.value;
        console.log(varibleID)
        e.preventDefault();
    });
});

