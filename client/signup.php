<?php 
if (isset($_POST["nom"])) {
    $nom = $_POST["nom"];
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    if (!empty($nom) && !empty($username) && !empty($pass)) {
        include "conn.php";
        $query = "INSERT INTO user VALUES (NULL, :nom, :username, :pass)";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(":nom"=>$nom, ":username"=>$username, ":pass"=>$pass));
        header("Location:login.html");
        die;
    } else {
        header("Location:signup.html");
        die;
    }
} else {
        header("Location:signup.html");
    die;
}
?>