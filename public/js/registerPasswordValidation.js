
function validateForm() {

    var password = document.getElementById("passwordR").value;
    var passwordP = document.getElementById("passwordPR").value;
    var login = document.getElementById("loginR").value;
    var pass = true;

    if(login === "") {
    document.getElementById("blankMsg").innerHTML = "Vyplnte meno";
    pass = false;
}

    if(password === "") {
    document.getElementById("message1").innerHTML = "Vyplnte Heslo";
    pass = false;
}

    if(passwordP === "") {
    document.getElementById("message2").innerHTML = "Zadajte Heslo!";
    pass = false;
}

    if(password.length <= 5) {
    document.getElementById("message1").innerHTML = "Heslo musí mať aspoň 5 charakterov";
    pass = false;
}

    if(password.length > 99) {
    document.getElementById("message1").innerHTML = "Heslo nesmie presahovať 99 charakterov";
    pass = false;
}

    if(password !== passwordP) {
    document.getElementById("message2").innerHTML = "Heslá sa musia zhodovať";
    pass = false;
} else {
    alert ("Boli ste automaticky prihlásený");
}
    return pass;
}
