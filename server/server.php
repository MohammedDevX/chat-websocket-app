<?php

require __DIR__ . '/vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage();
        echo "🟢 Serveur WebSocket lancé...\n";
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "👤 Nouvelle connexion ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
    $data = json_decode($msg, true);
    require "conn.php";

    $now = date("Y-m-d H:i:s");

    $query = "INSERT INTO messages (message, sender_id, received_id, created_at)
            VALUES (:message, :id_sender, :id_rec, :created_at)";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ":message" => $data["msg"],
        ":id_sender" => $data["id"],
        ":id_rec" => $data["id_rec"],
        ":created_at" => $now
    ]);

    $data["created_at"] = $now;

    foreach ($this->clients as $client) {
        $client->send(json_encode($data));
    }
}

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "❌ Connexion fermée ({$conn->resourceId})\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "⛔ Erreur : {$e->getMessage()}\n";
        $conn->close();
    }
}

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

// Lancer le serveur WebSocket sur le port 8080
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Chat()
        )
    ),
    8080
);

$server->run();
