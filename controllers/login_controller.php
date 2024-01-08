<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signin"])) {
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $user= new User();

    // Assuming CheckUser returns user data or false if the user doesn't exist
    $userChecker = $user->CheckUser($email, $db);
    //var_dump($userChecker);

    if ($userChecker) {
        // User exists, now verify the password
        if (password_verify($password, $userChecker["password"])) {
            User::login($userChecker["user_id"]);
            header("Location: index.php?page=dashboard");
            exit();

        } else {
            echo "Invalid email or password. Please try again.";
        }
    } else {
        echo "User not found. Please check your email and try again.";
    }
}
