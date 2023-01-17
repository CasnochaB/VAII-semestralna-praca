
var elements = document.getElementsByClassName("heart");

class ScriptLike{
    constructor() {
        console.log(elements);
        this.reloadData();
        for (var i = 0; i < elements.length; i++) {
            var element = elements[i];
            recipeID = elements[i].id;
            element.onclick = this.sendLike();
            console.log("CONSTRUCTOR:" + recipeID);
        }
    }

    async getLike() {
        try {
            for(var i = 0; i < elements.length; i++) {
                recipeID = elements[i].id.substring(5);
                console.log("GETLIKE:"+recipeID);
                let userId = await this.getLoggedUser();
                let response = await fetch("?c=recipes&a=getLike&idr=" + recipeID + "&idu=" + userId);
                let data = await response.json();
                var image = document.getElementById(elements[i].id);
                var html = "";

                html += `<img style="width: 50%"`;
                var numberOfLikesE = document.getElementById("likes");
                numberOfLikesE.innerText = data[1];
                if (data[0] == null) {
                    html += `src = "public/assets/img/heart.svg"`;
                } else {
                    html += `src = "public/assets/img/heart-fill.svg"`;
                }
                html += `>`;
                image.innerHTML = html;
            }
        } catch (e) {
            console.error('Chyba: ' + e.message);
        }
    }

    async sendLike() {
        try {
            for(var i = 0; i < elements.length; i++) {
                recipeID = elements[i].id.substring(5);
                let response = await fetch("?c=recipes&a=like", {
                    method: 'POST', // or 'PUT'
                    headers: {
                        'Content-Type': "application/json",
                    },
                    body: JSON.stringify({
                        recipe: recipeID,
                        user: await this.getLoggedUser()
                    })
                });
            }
        } catch (e) {
            console.error('Chyba: ' + e.message);
        }
        await this.reloadData();
    }


    async reloadData() {
        await this.getLike();
    }

    async getLoggedUser() {
        let response = await fetch("?c=user&a=loggedUser");
        let data = await response.json();
        return data.me;
    }
}

var likeWindow;
likeWindow = new ScriptLike();