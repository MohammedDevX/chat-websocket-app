<!-- /*
    - Evenement click simple :
*/

// let btn = document.querySelector(".btn");

// btn.addEventListener("click", () => {
//     console.log("clicked");
// })




/*
    - Chaque element creer est ajouter dans une paragraphe avec keyup :
*/

// let txt = document.querySelector(".saisir");
// let parag = document.querySelector(".para");
// let data = [];

// txt.addEventListener("keyup", (e) => {
//     // console.log(e.key);
//     if (e.key != "Backspace") {
//         data.push(e.key);
//     } else {
//         data.pop();
//     }

//     data.forEach((elements) => {
//         parag.innerHTML += elements;
//         data.pop();
//     });
// })



/*
    - Chaque element creer est ajouter dans une paragraphe avec input :
*/

// let txt = document.querySelector(".saisir");
// let parag = document.querySelector(".para");

// txt.addEventListener("input", (e) => {
//     console.log(e.data);
//     if (e.data != null) {
//         parag.innerHTML += e.data;
//     } else {
//         let tab = [];
//         tab = parag.textContent.split("");
//         tab.pop();
//         parag.innerHTML = tab.join("");
//     }
// })



/*
    - Ajouter dans une formulaire sans refrecher la page avec preventDefault() :
*/

// let btn = document.querySelector(".btn");
// let form = document.querySelector("form");
// let cont = 0;

// form.addEventListener("submit", (e) => {
//     e.preventDefault();
//     console.log("hello" + cont++);
// })



/*
    - Saisir auto qu'elle button vous avez clicker et afficher leur id avec target.id : 
*/

// document.addEventListener("click", (e) => {
//     console.log(e.target);
// })



/*
    - Bloquer un comportement avec preventDefault() : 
*/

// document.getElementById("lien").addEventListener('click', (e) => {
//     // e.preventDefault();
//     console.log("lien bloquer");
// })



/*
    - ex : 
*/
// document.getElementById("lien").addEventListener("click", (e) => {
//     e.preventDefault();
//     console.log("lien est bloquer");
// })

// let inp = document.querySelector(".inp");
// let para = document.querySelector(".para");

// inp.addEventListener("input", (e) => {
//     console.log(inp.value);
//     if (e.data != null) {
//         para.innerHTML += e.data;
//     } else {
//         let tab = para.textContent.split("");
//         tab.pop();
//         para.innerHTML = tab.join("");
//     }
// })



/*
    - Creer votre propre event : 
*/

// document.addEventListener("connexionReussi", (e) => {
//     console.log(e.detail.nom);
// })

// let myEvent = new CustomEvent("connexionReussi", {
//     detail: {nom : "Mohammed"}
// })

// document.dispatchEvent(myEvent);



/*
    - Min chat app avec web socket : 
*/

// const socket = new WebSocket("wss://ws.ifelse.io"); // Instentier un objet de la class WebSocket, et passer le url de serv dans les params 

// socket.onopen = () => {
//     document.querySelector(".chat").innerHTML += '<h3>✅ Connexion réussi</h3>';
// }

// socket.onmessage = (e) => {
//     let data = JSON.parse(e.data);
//     document.querySelector(".chat").innerHTML += `<p class="recu">[${data[0]}] : ${data[1]}</p>`;
//     console.log(data);
// }

// socket.onclose = () => {
//     console.log("Connexion est terminer");
// }

// socket.onerror = (err) => {
//     console.log(err);
// }

// document.querySelector(".btn").addEventListener("click", () => {
//     let nom = document.querySelector(".nom").value;
//     let msg = document.querySelector(".msg").value;
//     if (!nom || !msg) {
//         alert("S'il vouz plais remplir  touts les champs !");
//     }
//     let data = [nom, msg];
//     socket.send(JSON.stringify(data));
//     document.querySelector(".chat").innerHTML += `<p class="envoyer">[${nom}] : ${msg}</p>`;
//     console.log(data);
// })



let socket = new WebSocket("ws://localhost:8080");

socket.onopen = () => {
    console.log("Connexion aux web socket server");
}

socket.onmessage = (e) => {
    let data = JSON.parse(e.data);
    console.log(data);
}

socket.onclose = () => {
    console.log("Server is closed");
}

socket.onerror = (err) => {
    console.log("Message => " + err);
}

document.querySelector(".btn").addEventListener("click", () => {
    let chat = document.querySelector(".chat");
    let id = document.querySelector(".id").value;
    let msg = document.querySelector(".msg").value;
    chat.innerHTML += "Message Envoye par : " + id + " => " + msg;
    let data = {id, msg};
    socket.send(JSON.stringify(data)); 
}) -->