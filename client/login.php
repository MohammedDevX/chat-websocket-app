<?php
session_start();
if (!isset($_SESSION["user"])) {
    if (isset($_POST["username"])) {
        $username = $_POST["username"];
        $pass = $_POST["pass"];
    
        if (!empty($username) && !empty($pass)) {
            require "conn.php";
            $query = "SELECT * FROM user WHERE user_name=:username AND pass=:pass";
            $stmt = $conn->prepare($query);
            $stmt->execute(array(":username"=>$username, ":pass"=>$pass));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                session_start();
                $_SESSION["user"] = ["id"=>$data["id"], "nom"=>$data["nom"], "username"=>$data["user_name"], "pass"=>$data["pass"]];
                header("Location:hello.php");
                die;
            } else {
                header("Location:login.html");
                die;
            }
        } else {
            die;
        }
    } else {
        header("Location:login.html");
        die;
    }
} else {
    header("Location:logout.php");
}