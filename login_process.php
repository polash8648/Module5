<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user data from the session (in a real application, you'd retrieve it from a database)
    $users = $_SESSION['user'];

    $email = $_POST['email'];
    $password = $_POST['password'];   

    // Check if the provided email exists and the password matches (use password_verify for a hashed password)
    if (isset($users['email']) && password_verify($password, $users['password']) && $users['email'] === $email) {
       // $_SESSION['logged_in'] = true;
        if ($users['roll'] === 'admin') {
            header("Location: admin_dashboard.php");
        } elseif ($users['roll'] === 'user') {
            header("Location: user_dashboard.php");
        }

    } else {
        echo "Login failed. Please check your credentials.";
    }
} else {
    echo "Invalid request.";
}
?>
