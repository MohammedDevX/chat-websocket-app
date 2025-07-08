# 💬 Chat App en Temps Réel

Application de messagerie instantanée entre deux utilisateurs, développée avec **WebSocket**, **PHP natif** et **MySQL**. Les messages sont échangés instantanément sans rechargement et sauvegardés en base de données.

## 🛠️ Technologies

- **PHP natif** (frontend + serveur WebSocket)
- **MySQL** pour stocker les échanges
- **Ratchet** (librairie WebSocket pour PHP)
- **JavaScript** pour la logique côté client
- **HTML/CSS** pour l’interface du chat

## 🚀 Lancer l'application

1. Cloner ce dépôt :
   ```bash
   git clone https://github.com/MohammedDevX/chat-websocket-app.git
   cd chat-websocket-app
2. Configurer la base MySQL (exécuter le script fourni ou créer la table messages).

3. Démarrer le serveur WebSocket :
```bash
    cd server
    php server.php

4. Ouvrir chat.php dans deux onglets navigateurs distincts (en local, via XAMPP/WAMP) en précisant un ?id= différent pour chaque.

5. Tester l’envoi/réception de messages en temps réel – pas de rafraîchissement nécessaire.