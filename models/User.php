<?php
class User
{
    /**
     * @param $email
     * @param $db
     * @return false|mixed
     */
    function CheckUser($email, $db) {
        $sql = "SELECT * FROM user WHERE email = :email";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result : false;
    }



    /**
     * @param $email
     * @param $password
     * @param $username
     * @param $picture
     * @param $db
     * @return void
     */
    function AddUser($email, $password, $username, $db) {
        $sql = "INSERT INTO user (email, password, username,role) VALUES (:email, :password, :username ,'auteur')";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->execute();
    }

    function updateUserRole($db) {
        $sql = "UPDATE user SET role = 'admin' WHERE user_id = (SELECT user_id FROM user ORDER BY user_id LIMIT 1)";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        // Unset the statement to release resources
        unset($stmt);
    }

    function loginAuthor ($user_id) {
        $_SESSION["user_id"] = $user_id;
        $_SESSION["login"] = true;
//        header('Location: index.php?page=home');
    }
    function loginAdmin ($user_id) {
        $_SESSION["user_id"] = $user_id;
        $_SESSION["login"] = true;
       // header('Location: index.php?page=dashboard');
    }
    function logout () {
        session_destroy();
        header("Location: index.php?page=login");
        exit();
    }


}

