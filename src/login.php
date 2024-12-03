<!-- <?php session_start(); 
if (isset($_SESSION['admin'])) {
    header('Location:index.php');
}
?> -->

<?php require_once "header.php" ?>

        <div class="container">
           <div class="container_form_auth">
            <div class="main_login_container">
                    <div class="logo_img">
                            <img src="img/logo.png" alt="logo">
                        </div>
                    <div class="login-container">
                        <form action="backend/login.php" method="post" class="login-form">
                            <input type="text" name="login" placeholder="Логин" required>
                            <input type="password" name="password" placeholder="Пароль" required>
                            <button type="submit">Авторизоваться</button>

                            <?php
                            if (isset($_SESSION['message'])) {
                                echo ' <p class="message">'. $_SESSION['message'].'</p> ';
                            }
                            unset($_SESSION['message']);
                            ?>

                        </form>
                        <div class="no_acc">
                            <a href="register.php">Нету аккаунта?</a>
                        </div>
                    </div>
                </div>
           </div>
        </div>  
    
<?php require_once "footer.php" ?>