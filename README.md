# 💬 Real-Time Chat App

Instant messaging application between two users, developed with **WebSocket**, **native PHP** and **MySQL**. Messages are exchanged instantly without reloading and saved in a database.

## 🛠️ Technologies

- **Native PHP** (frontend + WebSocket server)
- **MySQL** to store exchanges
- **Ratchet** (librairie WebSocket pour PHP)
- **JavaScript** for client-side logic
- **HTML/CSS** for the chat interface

## 🚀 Launch the application

1. Clone this repository:
   ```bash
   git clone https://github.com/MohammedDevX/chat-websocket-app.git
   cd chat-websocket-app
2. Configure the MySQL database (run the provided script or create the messages table).
3. Start the WebSocket server:
    ```bash
    cd server
    php server.php
4. Open chat.php in two separate browser tabs (locally, via XAMPP/WAMP) specifying a different ?id= for each.
5. Test sending/receiving messages in real time – no refresh required.