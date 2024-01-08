<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signin"])) {
    // Validate and sanitize user inputs
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if (!$email || !$password) {
        echo "Invalid email or password format. Please check your inputs.";
        exit;
    }

    $user = new User();
    $regular = "auteur";
    $admin = "admin";

    $userChecker = $user->CheckUser($email, $db);
    

    if ($userChecker) {
        // User exists, now verify the password
        if (password_verify($password, $userChecker["password"])) {
            if ($userChecker["role"]== "auteur") {
                //dd($checkAuthor);
                $user->loginAuthor($userChecker["user_id"]);
            } elseif ($userChecker ["role"]== "admin") {
                //dd("ana admin");
                $user->loginAdmin($userChecker["user_id"]);

            } else {
                echo "Invalid user role. Please contact support.";
            }
        } else {
            echo "Invalid email or password. Please try again.";
        }
    } else {
        echo "User not found. Please check your email and try again.";
    }
}
?>
