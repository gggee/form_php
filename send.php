<?php
define("HOST", "localhost");
define("DATABASE", "classicmodels");
define("CHARSET", "utf8");
define("USER", "root");
define("PASSWORD", "");

function conn() {
    return new PDO(
        "mysql:host=" . HOST . ";" .
        "dbname=" . DATABASE . ";" .
        "charset=" . CHARSET,
        USER,
        PASSWORD
    );
}

try {
    $pdo = conn();
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)";
    $result = $pdo->prepare($sql);

    $result->bindParam(':name', $name);
    $result->bindParam(':email', $email);
    $result->bindParam(':message', $message);

    if ($result->execute()) {
        echo "Message sent successfully!";
    }
} else {
    echo "Invalid data.";
}
?>
