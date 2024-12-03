<?php session_start(); 
if (isset($_SESSION['admin'])) {
    header('Location:index.php');
}
?>

<?php require_once "header.php" ?>


        <div class="container">
            <div class="container_form_auth">
                <div class="main_login_container">
                    <div class="logo_img">
                            <img src="img/logo.png" alt="logo">
                        </div>
                    <div class="login-container">
                        <form action="backend/register.php" method="post" class="login-form">
                            <input type="text" name="login" placeholder="Придумайте логин" required>
                            <input type="email" name="email" placeholder="Введите почту" required>
                            <input type="password" name="password" placeholder="Придумайте пароль" required>
                            <input type="password" name="password_confirm" placeholder="Придумайте пароль" required>
                            <button type="submit">Вход</button>
                            
                            <?php
                            if (isset($_SESSION['message'])) {
                                echo ' <p class="message">'. $_SESSION['message'].'</p> ';
                            }
                            unset($_SESSION['message']);
                            ?>

                        </form>
                        <div class="no_acc">
                            <a href="login.php">Уже есть аккаунт?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

<?php require_once "footer.php" ?>