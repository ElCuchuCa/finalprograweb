const IS_VALID = document.getElementsByClassName("is-valid");

function validateEmail(formType){
    const regex = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;

    if(formType.id == "email-login"){
        IS_VALID[0].innerHTML='';
        email = formType.value;
        if(email.match(regex)){
            IS_VALID[0].innerHTML= "Email valido";
            IS_VALID[0].classList.remove("invalid-color");
            IS_VALID[0].classList.add("valid-color");
            formType.classList.remove("invalid-border");
            formType.classList.add("valid-border");
        }

        if(!email.match(regex)){
            IS_VALID[0].innerHTML= "Email no valido";
            IS_VALID[0].classList.remove("valid-color");
            IS_VALID[0].classList.add("invalid-color");
            formType.classList.add("invalid-border");
            formType.classList.remove("valid-border");
        }
    }

    else{
        IS_VALID.innerHTML='';
        email = formType.value;

        if(email.match(regex)){
            IS_VALID[2].innerHTML= "Email valido";
            IS_VALID[2].classList.remove("invalid-color");
            IS_VALID[2].classList.add("valid-color");
            formType.classList.remove("invalid-border");
            formType.classList.add("valid-border");
        }

        if(!email.match(regex)){
            IS_VALID[2].innerHTML= "Email no valido";
            IS_VALID[2].classList.remove("valid-color");
            IS_VALID[2].classList.add("invalid-color");
            formType.classList.add("invalid-border");
            formType.classList.remove("valid-border");
        }
    }
}

function validateName(formType){
    const regex = /^[a-zA-Z ]{2,30}$/;
    const validName = "Nombre valido";
    const invalidName = "Nombre no valido";

    if(formType.id == "name-register"){
        IS_VALID[3].innerHTML='';
        const name = formType.value;

        if(name.match(regex)){
            IS_VALID[3].innerHTML= validName;
            IS_VALID[3].classList.remove("invalid-color");
            IS_VALID[3].classList.add("valid-color");
            formType.classList.remove("invalid-border");
            formType.classList.add("valid-border");
        }

        if(!name.match(regex)){
            IS_VALID[3].innerHTML= invalidName;
            IS_VALID[3].classList.remove("valid-color");
            IS_VALID[3].classList.add("invalid-color");
            formType.classList.add("invalid-border");
            formType.classList.remove("valid-border");
        }
    }
}

function validatePass(formType){
    const regex = /^(?=.*[\d])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])[\w!@#$%^&*]{8,}$/;
    const validPass = "Contraseña valida";
    const invalidPass = "Contraseña no valida";

    if(formType.id == "pass-login"){
        IS_VALID[1].innerHTML='';
        contraseña = formType.value;

        if(contraseña.match(regex)){
            IS_VALID[1].innerHTML= validPass;
            IS_VALID[1].classList.remove("invalid-color");
            IS_VALID[1].classList.add("valid-color");
            formType.classList.remove("invalid-border");
            formType.classList.add("valid-border");
        }
        
        if(!contraseña.match(regex)){
            IS_VALID[1].innerHTML= invalidPass;
            IS_VALID[1].classList.remove("valid-color");
            IS_VALID[1].classList.add("invalid-color");
            formType.classList.add("invalid-border");
            formType.classList.remove("valid-border");
        }
    }

    if(formType.id == "pass-register"){
        IS_VALID[4].innerHTML='';
        contraseña = formType.value;

        if(contraseña.match(regex)){
            IS_VALID[4].innerHTML= validPass;
            IS_VALID[4].classList.remove("invalid-color");
            IS_VALID[4].classList.add("valid-color");
            formType.classList.remove("invalid-border");
            formType.classList.add("valid-border");
        }
        
        if(!contraseña.match(regex)){
            IS_VALID[4].innerHTML= invalidPass;
            IS_VALID[4].classList.remove("valid-color");
            IS_VALID[4].classList.add("invalid-color");
            formType.classList.add("invalid-border");
            formType.classList.remove("valid-border");
        }
    }
}

function passMatch(){
    const btnSubmit = document.getElementById('submit');
    pass1 = document.getElementById('pass-register');
    pass2 = document.getElementById('pass-register-repeat');
    
    if(pass1.value == pass2.value){
        btnSubmit.disabled = false;
        IS_VALID[5].innerHTML= 'Contraseñas coinciden';
        IS_VALID[5].classList.add("valid-color");
        IS_VALID[5].classList.remove("invalid-color");
    }

    else{
        btnSubmit.disabled = true;
        IS_VALID[5].innerHTML= 'Contraseñas no coinciden';
        IS_VALID[5].classList.remove("valid-color");
        IS_VALID[5].classList.add("invalid-color");    }  
}

function clearForm(){
    var i;
    const formLogin = document.forms["login-form"];
    formLogin["email"].value="";
    formLogin["password"].value="";

    const formReg = document.forms["register-form"];
    formReg["email"].value="";
    formReg["name"].value="";
    formReg["password"].value="";
    formReg["passwordrepeat"].value="";

    for(i = 0 ; i <= 5 ; i++ ){
        IS_VALID[i].innerHTML="";
    }

    const borderInputLogin = document.getElementById("email-login");
    borderInputLogin.classList.remove("valid-border");
    borderInputLogin.classList.remove("invalid-border");

    const borderInputReg = document.getElementById("email-register");
    borderInputReg.classList.remove("valid-border");
    borderInputReg.classList.remove("invalid-border");

    const borderInputName = document.getElementById("name-register");
    borderInputName.classList.remove("valid-border");
    borderInputName.classList.remove("invalid-border");

    const borderInputPassLog = document.getElementById("pass-login");
    borderInputPassLog.classList.remove('valid-border');
    borderInputPassLog.classList.remove('invalid-border');

    const borderInputPassReg = document.getElementById("pass-register");
    borderInputPassReg.classList.remove('valid-border');
    borderInputPassReg.classList.remove('invalid-border');

    const borderInputPassRep = document.getElementById("pass-register-repeat");
    borderInputPassRep.classList.remove('invalid-border');
    borderInputPassRep.classList.remove('valid-border');
}

function clearObraForm(){
    var obraeName = document.getElementById("obrae-name");
    var obraePrice = document.getElementById("obrae-price");
    var imgName = document.getElementById("obrae-img");
    obraeName.value = "";
    obraePrice.value = "";
    imgName.value = "";
}


function validatePrice(idobraeprice){
    const regex = /^[0-9]+$/;
    const addBtn = document.getElementById('obrae-done');
    const priceIsValid = document.getElementsByClassName("is-valid");
    const priceInvalid = "Precio no valido (ingrese numeros)";
    const price = idobraeprice.value;

    if(!price.match(regex)){
        priceIsValid[0].innerHTML= priceInvalid;
        priceIsValid[0].classList.remove("valid-color");
        priceIsValid[0].classList.add("invalid-color");
        addBtn.disabled = true;
    }
    if(price.match(regex) || price == ''){
        priceIsValid[0].innerHTML= "";
        addBtn.disabled = false;
    }
}

