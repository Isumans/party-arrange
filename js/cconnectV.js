const form = document.getElementById('connectForm');

form.addEventListener('submit', function(event) {
    event.preventDefault();
    let error=[];
    const name= document.getElementById('name');
    const email= document.getElementById('email');
    const message= document.getElementById('message');

    if(name.value.trim() === ''){
        error.push('Name is required');
    }
    if(email.value.trim() === ''){
        error.push('Email is required');
    } 
    
    if(message.value.trim() === ''){
        error.push('Message is required');
    }
    if (error.length > 0){
        error.forEach(function(err){
            alert(err);
        });
        
    }else{
        form.submit();
    }

});