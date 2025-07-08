<?php  
session_start();
if (isset($_SESSION["user"]) || is_numeric($_GET["id"])) {
    $other_id = $_GET["id"];
    require "conn.php";
    $query = "SELECT * FROM user  WHERE id != :me";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(":me"=>$_SESSION["user"]["id"]));
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    require "query.php";
    $data1 = query1();

    $query3 = "SELECT * 
                FROM messages 
                WHERE (sender_id=:me AND received_id=:other) OR (sender_id=:other AND received_id=:me)";
    $stmt3 = $conn->prepare($query3);
    $stmt3->execute(array(":me"=>$_SESSION["user"]["id"], ":other"=>$other_id));
    $data3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    // print_r($data3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- <button class="btn">Click me</button> -->
    
    <!-- Saisir un texte : <input type="text" class="saisir"> -->

    <!-- <form action="" method="get">
        Nom : <input type="text">
    </form> -->

    <!-- <p class="para"></p> -->

    <!-- <button id="a">Bouton A</button>
    <button id="b">Bouton B</button> -->

    <!-- <a href="https://www.crunchyroll.com/fr" id="lien">crunch</a>
    <input type="text" class="inp">
    <p class="para"></p> -->

    <div class="main">
        <div class="content">
            <div class="chat-box">
    <?php foreach ($data3 as $msg) { ?>
        <div class="bubble <?php echo ($msg['sender_id'] == $_SESSION['user']['id']) ? 'me' : 'other'; ?>" >
            <?= htmlspecialchars($msg['message']) ?>
            <div class="time"><?= $msg['created_at'] ?></div>
        </div>
    <?php } ?>
</div>

<div class="msg-box">
    <input type="text" class="msg" placeholder="Écrivez votre message...">
    <button class="btn">Envoyer</button>
</div>

        </div>
        <?php 
        require "sidebare.php";
        echo sidebare();
        ?>
    </div>
</body>
</html>
<script>
    /*
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



// document.querySelectorAll(".users").forEach(userDiv => {
//     userDiv.addEventListener("click", () => {
//         document.querySelectorAll(".users").forEach(el => el.classList.remove("active"));

//         userDiv.classList.add("active");

//         const userId = userDiv.getAttribute("data-id");
//         window.location.href = "chat.php?id=" + userId;
//     });
// });

let socket = new WebSocket("ws://localhost:8080");

socket.onopen = () => {
    console.log("Connexion aux web socket server");
}

socket.onmessage = (e) => {
    console.log(e.data);
    let data = JSON.parse(e.data);
    let myId = <?php echo json_encode($_SESSION["user"]["id"]); ?>;
    let otherId = <?php echo json_encode($other_id); ?>;

    if (
        (data.id == myId && data.id_rec == otherId) ||
        (data.id == otherId && data.id_rec == myId)
    ) {
        let bubble = document.createElement("div");
        bubble.classList.add("bubble", data.id == myId ? "me" : "other");
        bubble.innerHTML = `
            ${data.msg}
            <div class="time">${data.created_at}</div>
        `;
        document.querySelector(".chat-box").appendChild(bubble);
        document.querySelector(".chat-box").scrollTop = document.querySelector(".chat-box").scrollHeight;
    }

    let otherUserId = data.id == myId ? data.id_rec : data.id;
    let userDiv = document.querySelector(`.users[data-id="${otherUserId}"]`);

    if (userDiv) {
        userDiv.querySelector(".message").textContent = data.msg;
        userDiv.querySelector(".time").textContent = data.created_at;

        let sidebar = document.querySelector(".sidebare");
        sidebar.removeChild(userDiv);
        sidebar.prepend(userDiv);
    }
}



socket.onclose = () => {
    console.log("Server is closed");
}

socket.onerror = (err) => {
    console.log("Message => " + err);
}

document.querySelector(".btn").addEventListener("click", () => {
    let id = <?php echo json_encode($_SESSION["user"]["id"]); ?>;
    let id_rec = <?php echo json_encode($other_id); ?>;
    let nom = <?php echo json_encode($_SESSION["user"]["nom"]); ?>;
    let msgInput = document.querySelector(".msg");
    let msg = msgInput.value;                      
    let data = {id, nom, msg, id_rec};
    socket.send(JSON.stringify(data)); 
    msgInput.value = ""; 
})
</script>
<?php
} else {
    session_destroy();
    header("Location:login.html");
    die;
}
?>