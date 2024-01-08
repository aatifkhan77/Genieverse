let cancelEditBtn = document.getElementById("cancelEditBtn");
cancelEditBtn.addEventListener("click" , (e)=>{
    window.location.href = "#settings"
})



let form = document.getElementById("editProfileForm");

let username = document.getElementById("editUsername");
username.addEventListener("input",(e)=>{

    let url = `./php/userEditBack.php?checkUsername=${username.value}`;

    let xhr = new XMLHttpRequest();

    xhr.open("GET",url,true);

    xhr.onload = ()=>{
        let data = xhr.responseText;
        if(data=="fail"){
            alert("Username already exists.");    
            username.value = "";        
        }
        
    }
    xhr.send();
})



form.addEventListener("submit",(e)=>{
    e.preventDefault();
    
    let name = document.getElementById("editName");
    let username = document.getElementById("editUsername");
    let phoneno = document.getElementById("editPhone");
    let address = document.getElementById("editAddress");



    let form = new FormData();
    form.append("name",name.value);
    form.append("username",username.value);
    form.append("email",email.value);
    form.append("phoneno",phoneno.value);
    form.append("address",address.value);


    let url = "./php/userEditBack.php";
    let xhr = new XMLHttpRequest();

    xhr.open("POST",url,true);


    xhr.onload = ()=>{
        let data = xhr.responseText;
        // console.log(data);
        
        if(data=="Success"){
            alert(`Fields has been Updated...`);
            location.href="./userProfile.php";
            
        }else{
            alert(`${data}!!! Please try again`);
        }        
    }

    xhr.send(form);

})
