let commentForm = document.getElementById("addReviewForm");


commentForm.addEventListener("click",(e)=>{
    e.preventDefault();
    

    const urlParams = new URLSearchParams(window.location.search);
    const blog_sno = urlParams.get('blog_sno');
    const blog_username = urlParams.get('username');

    console.log(blog_sno,blog_username);

    let name = document.getElementById("reviewRating");
    let email = document.getElementById("email");
    let rating = document.getElementById("reviewRating");
    let message = document.getElementById("reviewMessage");


    if(rating.value == "" || rating.value == null){
        alert("Rating cannot be empty");   
        return;     
    }

    if(message.value == "" || message.value == null){
        alert("Content Message cannot be empty");   
        return;     
    }



    let form = new FormData();
    form.append("name",name.value);
    form.append("email",email.value);
    form.append("rating",rating.value);
    form.append("message",message.value);
    form.append("blog_sno",blog_sno);
    form.append("blog_username",blog_username);

    let url = "./php/reviewBack.php";
    let xhr = new XMLHttpRequest();

    xhr.open("POST",url,true);


    xhr.onload = ()=>{
        let data = xhr.responseText;
        // console.log(data);
        
        if(data=="success"){
            alert(`Thanks!!!`);
            // location.reload();
            
        }else{
            alert(`${data}!!! Please try again`);
        }        
    }

    xhr.send(form);

})
