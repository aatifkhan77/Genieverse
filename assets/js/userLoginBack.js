let signInBtn = document.getElementById("signInBtn");
// let spinner = document.getElementById("spinner");

signInBtn.addEventListener("click",(e)=>{
    e.preventDefault();
    
    let formData = new FormData();
    let useremail = document.getElementById("useremail");
    let password = document.getElementById("pass");
    if(useremail.value == "" || password.value == ""){
        alert("Fields cannot be Empty.");
        return;
    }

    formData.append("useremail",useremail.value)
    formData.append("password",password.value)

    let url = "./assets/php/userLoginBack.php";
    let xhr = new XMLHttpRequest();

    xhr.open("POST",url,true);


    xhr.onload = ()=>{
        let data = xhr.responseText;
        // console.log(data);
        if(data == "success"){

            window.location.reload();
        }else{

            alert(`${data}!! Please try again`);
        }
        
    }

    xhr.send(formData);


})