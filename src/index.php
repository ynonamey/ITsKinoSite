<?php session_start();
if (isset($_SESSION['admin'])) {
    // header('Location:../index.php');
}

?>

<?php require_once "header.php" ?>

<div class="container_info"><img src="img/joker.jpg" alt=""></div>
<div class="container">
    <div class="info_block">
        <div class="info_text">
            <h2>Не знаешь что посмотреть?</h2>
            <h1>Доверься itsKINO</h1>
        </div>
        <a href="movies.php" class="info_button">
            <div class="info_button_container">
                <img src="img/icon_button.png" alt="#">
                <span>Попробовать</span>
            </div>
        </a>
        <div class="logo_info">
            <img src="img/logo.png" alt="logo">
        </div>
    </div>
    <div class="film_blog">
        <div class="film_blog_info">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur nihil minima aliquid accusantium, ad atque commodi impedit, tenetur, et autem quaerat accusamus laboriosam suscipit vero libero debitis quasi voluptas dolore enim repellendus? Est, magnam labore. Mollitia ab qui ducimus iste aliquid eaque repellat alias omnis voluptate, culpa consequuntur soluta nesciunt veritatis ipsa quas dolores autem nulla quae quidem nostrum itaque saepe? Tempora suscipit eveniet quos dolorum iure quia magni recusandae aut sunt mollitia est ducimus odit velit modi adipisci excepturi corporis nobis pariatur consequuntur, quae assumenda labore vitae commodi maxime? Ex illum quis repellendus, optio harum id ipsa? Earum est accusamus, doloremque, excepturi ullam rerum, minus debitis quibusdam neque vel quia et exercitationem in officiis aut quae. Vitae repellat illum perferendis vero omnis fugiat natus ad? Labore nemo saepe harum alias debitis dicta quidem recusandae quibusdam veritatis officiis minus voluptates est, eius velit odit doloribus deserunt molestias pariatur? Dicta, consequuntur!</p>
        </div>
        <div class="film_blog_image">
            <img src="img/slider.jpg" alt="">
        </div>
    </div>
</div>



<?php require_once "footer.php" ?>