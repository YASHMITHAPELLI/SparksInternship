function transfer(){
    var a = document.getElementById("to").value;
    var b = document.getElementById("amount");
    var c=b.value;
    if(a!="" || c!=""){
        confirm("Proceed to transaction?");
       
    }
    else{
        alert("Please enter valid information");
    
    }
}

