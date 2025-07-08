# 💬 Chat App en Temps Réel

Application de messagerie instantanée entre deux utilisateurs, développée avec **WebSocket**, **PHP natif** et **MySQL**. Les messages sont échangés instantanément sans rechargement et sauvegardés en base de données.

## 🛠️ Technologies

- **PHP natif** (frontend + serveur WebSocket)
- **MySQL** pour stocker les échanges
- **Ratchet** (librairie WebSocket pour PHP)
- **JavaScript** pour la logique côté client
- **HTML/CSS** pour l’interface du chat

## 📁 Structure

chat-websocket-app/
├── client/ ← Interface PHP/JS/CSS côté utilisateur
├── server/ ← Serveur WebSocket (Ratchet + PHP)
└── README.md ← Ce fichier

bash
Copier
Modifier

## 🚀 Lancer l'application

1. Cloner ce dépôt :
   ```bash
   git clone https://github.com/MohammedDevX/chat-websocket-app.git
   cd chat-websocket-app
Configurer la base MySQL (exécuter le script fourni ou créer la table messages).

Démarrer le serveur WebSocket :

bash
Copier
Modifier
cd server
php server.php
Ouvrir chat.php dans deux onglets navigateurs distincts (en local, via XAMPP/WAMP) en précisant un ?id= différent pour chaque.

Tester l’envoi/réception de messages en temps réel – pas de rafraîchissement nécessaire.