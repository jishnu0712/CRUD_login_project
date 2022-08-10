const email = document.getElementById("email");
const pwd = document.getElementById("pwd");
const form = document.getElementById("form");
const error = document.getElementById("error");

form.addEventListener('submit',(e)=>{
    let messages = [];

    if(email.value === null || email.value === ''){
        messages.push("Email is mandatory");
    }

    if(pwd.value === "password" ) {
        messages.push("Password can't be password");
    }

    if(pwd.value.length < 3) {
        messages.push("password must be of length 3");
    }

    if(messages.length > 0) {
        e.preventDefault();
        error.innerHTML = messages.join(", ");
    }
});