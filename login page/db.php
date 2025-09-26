<?php
$host = "localhost";
$port = "5432";
$dbname = "loginpage";
$user = "postgres";
$password = "newpassword";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ensure built-in account exists
    $hash = password_hash("1234", PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (id, firstname, lastname, email, password)
            VALUES (1, 'Kriztel', 'Garcia', 'garciakriztel24@gmail.com', :password)
            ON CONFLICT (id) DO NOTHING";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':password' => $hash]);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
