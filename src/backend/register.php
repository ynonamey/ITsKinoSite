<?php
    session_start();
    require_once 'connect.php';
    
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $email = $_POST['email'];

    if ($password === $password_confirm) {
        $pass = password_hash($password,PASSWORD_DEFAULT);
        mysqli_query($connect, "INSERT INTO `Users` (`id`, `login`, `password`, `email`) VALUES (NULL, '$login', '$pass', '$email')");
        $_SESSION['message'] = 'Регистрация успешна';
        header('Location:../login.php');
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location:../register.php');
    }