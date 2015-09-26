<?php
//session_start();
$error = '';

function setupPDO() {
    $dbName = "upload_users";
    $dbUser = "root";
    $dbPwd = "axifluviMYSQL23*!";
    $host = "localhost";
    $connStr = "mysql:dbname=$dbName;host=localhost";
    $sql =  new PDO($connStr, $dbUser, $dbPwd);
    return $sql;
}

/**
 * @param $pdoConnector
 * @param $uname
 * @param $pwd
 */
function loginUser($pdoConnector, $uname, $pwd) {
    $pdoConnector->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdoConnector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statment = 'SELECT * FROM members WHERE username = :u AND password = :p';
    $query = $pdoConnector->prepare($statment);
    $query->bindParam(':u', $uname, PDO::PARAM_STR, 12);
    $query->bindParam(':p', $pwd, PDO::PARAM_STR, 12);
    $query->execute();
    return $query;
}

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $connection = setupPDO();
        if ($connection->connect_error) {
            die('Connect Error (' . $connection->connect_errno . ') '
                . $connection->connect_error);
        }
        $username = stripslashes($username);
        $password = stripslashes($password);
        $hashedPwd = md5($password);
        $query = loginUser($connection, $username, $hashedPwd);
        if ($query->rowCount()==1) {
            $_SESSION['login_user'] = $username; // Initializing Session
            header("location: profile.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
        }
    }
}
?>