const rform= document.getElementById("registerV");

rform.addEventListener("submit", function(event) {
    event.preventDefault();
    let error= [];
    const name= document.getElementById("username");
    const email= document.getElementById("email");
    const password= document.getElementById("password");
    const number= document.getElementById("phone_number");

    if(name.value.trim() === "") {
        error.push("Name is required");
    }else if(name.value.trim().length>50) {
        error.push("name must be less than 50 characters");
    }
    if(email.value.trim() === "") {
        error.push("Email is required");
    }else if(email.value.trim().length>100){
        error.push("Email must be less than 100 characters");
    }
    if(password.value.trim() === "") {
        error.push("Password is required");
    } else if(password.value.trim().length>255){
        error.push("Password must be less than 255 characters");
    }
    if(number.value.trim() === "") {
        error.push("Phone number is required");
    }else if(number.value.trim().length >10) {
        error.push("Phone number must be maximun 10 digits long");
    } 
    if (error.length > 0){
        error.forEach(function(err){
            alert(err);
        });
        
    }else{
        rform.submit();
    }
    
});