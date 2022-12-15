const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', () => {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
        });

function validateForm() {

    if (document.forms["addform"]["name"].value.trim() == "") {
        document.getElementById("nameerror").style.visibility = "visible";
        return false;
    }


    if (document.forms["addform"]["email"].value.trim() == "") {
        document.getElementById("mailerror").style.visibility = "visible";
        return false;
    }
    var mail = document.addform.email.value;
    var p1 = /^[A-Za-z0-9._%+-]+@STSPL\.COM$/;
    var p2 = /^[A-Za-z0-9._%+-]+@stspl\.com$/;
    if (!((p1).test(mail) || (p2).test(mail))) {
        document.getElementById("msg").innerHTML = "**INVALID EMAIL Please enter email like:a@stspl.com or A@STSPL\.COM"
        return false;
    }


    if (document.forms["addform"]["address"].value.trim() == "") {
        document.getElementById("addresserror").style.visibility = "visible";
        return false;
    }

    if (document.forms["addform"]["password"].value.trim() == "") {
        document.getElementById("passworderror").style.visibility = "visible";
        return false;
    }
    var password = document.addform.password.value;
    if(password.length<4){  
        document.getElementById("msg1").innerHTML = "**Password must be at least 4 characters long"
        return false;  
        }  

    if (document.forms["addform"]["period"].value.trim() == "") {
        document.getElementById("montherror").style.visibility = "visible";
        return false;
    }
    if (document.forms["addform"]["lang"].value.trim() == "") {
        document.getElementById("langerror").style.visibility = "visible";
        return false;
      }

      if (document.forms["addform"]["file"].value.trim() == "") {
        document.getElementById("fileerror").style.visibility = "visible";
        return false;
      }
}