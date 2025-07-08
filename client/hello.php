<?php  
session_start();
if (isset($_SESSION["user"])) {
    require "conn.php";
    $query = "SELECT * FROM user  WHERE id != :me";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(":me"=>$_SESSION["user"]["id"]));
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    require "query.php";
    $data1 = query1();
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
    <div class="main">
        <div class="content">
            <h1 style="margin-top: 20%; margin-left: 5%;">Bonjour <?php echo $_SESSION["user"]["username"] ?> sur notre application de communication <br>
            Envoyez et recevez des messages</h1>
        </div>
        <?php 
        require "sidebare.php";
        echo sidebare();
        ?>
    </div>
</body>
</html>
<?php 
} else {
    header("Location:login.html");
} 
?>