<?php
session_start();
include "dbconnect.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Basic validation
    if (empty($username) || empty($password)) {
        $errors[] = "Username and password are required";
    } else {

        // Fetch user by username only
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ? LIMIT 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {

            // Bind database results (id, username, hashed_password)
            $stmt->bind_result($id, $db_username, $hashedPassword);
            $stmt->fetch();
            $stmt->close();

            // Verify password
            if (password_verify($password, $hashedPassword)) {

                // Secure session
                session_regenerate_id(true);

                $_SESSION['username'] = $db_username;
                $_SESSION['user_id'] = $id;

                header("Location: dashboard.php");
                exit();

            } else {
                $errors[] = "Incorrect username or password";
            }

        } else {
            $errors[] = "Incorrect username or password";
        }
    }
}

// Display errors
if (!empty($errors)) {
    echo '<div class="alert alert-danger"><ul>';
    foreach ($errors as $e) {
        echo "<li>" . htmlspecialchars($e) . "</li>";
    }
    echo '</ul></div>';
}
?>
