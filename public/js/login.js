
var userID;
var logged = false;
class Login{
    constructor() {
        this.isLogged();
        document.getElementById("login-submit").onclick = () => this.logIn();
    }
    async isLogged()
    {
        let response = await fetch("?c=auth&a=isLogged", {
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': "application/json",
            },
            body: JSON.stringify({
            })
        });
        let data = await response.json();
        if (data) {
            this.logged();
        }
    }

    async logged() {
        try {
            document.getElementById("logged-logo").innerHTML = `<a class="btn" href="?c=admin" type="button" >
                    <img class="" src="public/assets/img/person-circle.svg" alt="Bootstrap" width="32" height="32">
                    </a>`;
            document.getElementById("logged-option").innerHTML = `
                <ul class="navbar-nav me-auto navbar-text">
                <li class="nav-item dropdown">
                <a class="nav-link " href="?c=recipes" role="button" >Recepty</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link" href="?c=admin&a=recipes"> Moje recepty</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link" href="?c=recipes&a=favorite&id=` + userID + `"> Obľúbené</a>
                </li>
                </ul>`;
            document.getElementById("login-container").innerHTML = `
                <a  class="nav-link right-offset" href="?c=auth&a=logout"> Odhlásiť</a>`;
        } catch (e) {
            console.error('Chyba: ' + e.message);
        }
    }

    async logIn() {
        try {
            let response = await fetch("?c=auth&a=login", {
                method: 'POST', // or 'PUT'
                headers: {
                    'Content-Type': "application/json",
                },
                body: JSON.stringify({
                    login: document.getElementById("login-text").value,
                    password: document.getElementById("password").value
                })
            });
            let data = await response.json();
            if (data[0] == null) {
                userID = data[1];
                logged = true;
                console.log(userID);
                this.logged();
                $('#loginModal').modal('hide');
            } else {
                document.getElementById("login-outcome").innerText = "Nespravny login alebo heslo";
            }
        } catch (e) {
            console.error('Chyba: ' + e.message);
        }
    }

}

var loginWindow;

document.addEventListener('DOMContentLoaded', () => {
    loginWindow = new Login();
}, false)
;