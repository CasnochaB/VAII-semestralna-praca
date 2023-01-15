
class CommentAjax{
    constructor() {
        document.getElementById("send-comment").onclick = () => this.sendComment();
        this.reloadData();

        setInterval(() => {
            this.reloadData()
        }, 10000);
    }

    async getComments() {
        try {
            let response = await fetch("?c=recipes&a=getComments&id=" + recipeID);
            let data = await response.json();
            var messages = document.getElementById("comments");
            var html = "";
            var loggedUserID = await this.getLoggedUser();
            data.forEach((comment) => {
                // sformátuje správu (pridá adresáta, ak treba, podfarbí správy)
                var add = "";

                html += `<div class="container">
                    <div class="row" style="max-width: 60%;background-color: aliceblue" >
                    <div class="comment-container border">
                    <div class="navbar-brand" style="margin-top: 10px">
                    <img src="public/assets/img/person-circle.svg" alt="Bootstrap" width="32" height="32">
                        ${comment.creator.login}
                        </div>
                        <hr>
                        ${comment.text}
                        `;
                if (comment.creator.id === loggedUserID) {
                    html += `<button id="delete-comment" class="btn btn-primary" style="float: right; height: 30px;text-align: center">zmazať   </button>
                        `;
                }
                html += `<hr>
                        </div>
                    </div>
                    </div>`
            });
            messages.innerHTML = html;
        } catch (e) {
            console.error('Chyba: ' + e.message);
        }
    }

    async sendComment() {
        try {
            let response = await fetch("?c=recipes&a=comment", {
                method: 'POST', // or 'PUT'
                headers: {
                    'Content-Type': "application/json",
                },
                body: JSON.stringify({
                    recipe: recipeID,
                    text: document.getElementById("comment-text").value
                })
            });
            // nakoniec vymaže správu a adresáta
            document.getElementById("comment-text").value = "";
        } catch (e) {
            console.error('Chyba: ' + e.message);
        }
        await this.reloadData();
    }

    async deleteComment() {

    }

    async reloadData() {
        await this.getComments();
    }

    async getLoggedUser() {
        let response = await fetch("?c=user&a=loggedUser");
        let data = await response.json();
        return data.me;
    }
}

var commentWindow;

document.addEventListener('DOMContentLoaded', () => {
    commentWindow = new CommentAjax();
}, false)
;