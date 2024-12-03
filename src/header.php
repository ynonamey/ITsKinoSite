<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <title>Kino</title>
</head>
<body>
<div class="container_img">
    <header>
        <div class="logo_image_header">
            <a href="index.php"><img src="img/logo.png" alt="logo"></a>
        </div>
        
        <?php 
        
        if (isset($_SESSION['admin'])!='') { ?> 
         <div class="header_login_button">
            <span class="hello">Здравствуйте, </span><a href="profile.php"><span class="title_menu"> <?= $_SESSION['admin']['login'] ?></span></a>
            <div class="logout">
            <a href="backend/logout.php">
                <span><span class="icon_menu"><i class="fa fa-sign-out" aria-hidden="true"></i></span></span>
                <span><span class="title_menu logout_btn">Выйти</span></span>
            </a>
            </div>
        </div>
   <? } else { ?>
    <div class="header_login_button">
            <a href="login.php">Войти</a>
        </div>
   <? } ?>
        
 
    </header>