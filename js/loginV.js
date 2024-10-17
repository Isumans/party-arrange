const lform =document.getElementById("loginV");

lform.addEventListener("submit", function(event) {
    event.preventDefault();
    let error=[]; 
    const email=document.getElementById("email");
    const password=document.getElementById("password");

    if (email.value==""){
        error.push("Please enter your email");
    }
    if (password.value==""){
        error.push("Please enter your password");
    }
    if (error.length > 0){
        error.forEach(function(err){
            alert(err);
        });
        
    }else{
        lform.submit();
    }
});

