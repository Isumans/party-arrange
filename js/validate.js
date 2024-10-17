 const pForm= document.getElementById("packForm");

 pForm.addEventListener("submit", function(event) {
    event.preventDefault();
    let error =[];
    const pName= document.getElementById("package_name");
    const pPrice= document.getElementById("price");
    const pDesc= document.getElementById("description");
    const category= document.getElementById("category");
    const pLimit= document.getElementById("guest_limit");
    const pDuration= document.getElementById("duration");

    if(pName.value.trim().length >55) {
        error.push("Name is invalid");
    }
    if(pPrice.value.trim() <0 || pPrice.value.trim()>10000) {
        error.push("Price is not in range");
    }
    if(pDesc.value.trim() === "") {
        error.push("Description is required");
    }
    if(category.value.trim() != "Small Scale" ||category.value.trim() != "Medium Scale" ||category.value.trim() != "Large Scale" ) {
        error.push("Invalid category");
    }
    if(pLimit.value.trim()<0 || pLimit.value.trim()>1000) {
        error.push("Guest limit invalid");
    }
    if(pDuration.value.trim() <0 ||pDuration.value.trim() >20) {
        error.push("Duration is invalid");
    }
    if (error.length > 0){
        error.forEach(function(err){
            alert(err);
        });
        
    }else{
        pForm.submit();
    }

 });