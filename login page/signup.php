<?php
require 'db.php'; // PostgreSQL connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST['firstname']);
    $lastname  = trim($_POST['lastname']);
    $email     = trim($_POST['email']);
    $password  = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        $sql = "INSERT INTO users (firstname, lastname, email, password) 
                VALUES (:firstname, :lastname, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':firstname' => $firstname,
            ':lastname'  => $lastname,
            ':email'     => $email,
            ':password'  => $hashedPassword
        ]);

        // Redirect to login page
        header("Location: login.html?registered=1");
        exit();
    } catch (PDOException $e) {
        if ($e->getCode() == '23505') {
            echo "❌ Email already registered!";
        } else {
            echo "❌ Database error: " . $e->getMessage();
        }
    }
}
?>
