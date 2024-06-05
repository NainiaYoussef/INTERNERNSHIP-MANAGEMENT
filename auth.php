<?php
require_once('dbconnect.php');

if ($_POST['rememberMe'] == "1") {
    setcookie('username', $_POST['username'], time() + 60);
    setcookie('password', $_POST['password'], time() + 60);
}

if (isset($_POST['username']) && isset($_POST['password'])) {

    $stmt = $conn->prepare("Select * from admin where username=:u");

    $stmt->execute(['u' => $_POST['username']]);

    $user = $stmt->fetch();

    if ($user['username'] != "") {
        if ($user['password'] != $_POST['password']) {
            header('location:index.php?err=2');
            exit(); 
        } else {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['iduser'] = $user['id'];
            header('location:home.php');
            exit(); 
        }
    } else {
        header('location:index.php?err=1');
        exit(); 
    }

    $conn = null;
}
?>