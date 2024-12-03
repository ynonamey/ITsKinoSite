<?php
    session_start();
    require_once 'connect.php'; 

    $login = $_POST['login'];
    $password = $_POST['password'];

    $check_users = mysqli_query($connect, "SELECT * from `Users` WHERE `login` = '$login'"); 
    if (mysqli_num_rows($check_users) > 0) {

        $admin = mysqli_fetch_assoc($check_users);
        if (password_verify($password,$admin['password'])) {
            $_SESSION['admin'] = [
                "id" => $admin['id'],
                "login" => $admin['login'],
                "count_films" => $admin['count_films'],
                "scrolled_films" => $admin['scrolled_films'],
                "timestamp_create" => $admin['timestamp_create'],
            ];
        } else {
            $_SESSION['message'] = 'Ошибка ввода данных';
            header('Location: ../login.php');
        }
        
    header('Location:../index.php');

    } else {
        $_SESSION['message'] = 'Пользователь не найден';
        header('Location: ../login.php');
    }