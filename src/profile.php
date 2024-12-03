<?php session_start();
if (!($_SESSION['admin'])) {
    header('Location:index.php');
}

?>

<?php require_once "header.php" ?>

<div class="container">
    <div class="info_user">
        <div class="user_info_text">
            <div class="main_user_info">
                <p class="User_name"><?= $_SESSION['admin']['login'] ?></p>
                <p>Зарегестрирован <?= $_SESSION['admin']['timestamp_create'] ?></p>
            </div>
            <div class="films_user_info">
                <p>Просмотрено фильмов <span><?= $_SESSION['admin']['count_films'] ?></span></p>
                <p>Прокручено фильмов <span><?= $_SESSION['admin']['scrolled_films'] ?></span></p>
                </p>
            </div>
        </div>
        <div class="info_user_avatar">
            <img src="backend/avatar/16191901415.webp" alt="">
        </div>
    </div>
    <div class="info_film">
        <div class="count_film">
            <p>Вы посмотрели уже</p>
            <p><span><span><?= $_SESSION['admin']['count_films'] ?></span></p>
            <p>Фильма!</p>
            <p><span class="count_film_span">Да вы настоящий киноман.</span></p>
        </div>
        <div class="reactions_films">
            <p>Нравятся</p>
            <div class="like">
                <div class="films">
                    <p>Ужасы</p>
                    <p>Триллер</p>
                    <p>Детские фильмы</p>
                </div>
                <div class="count">
                    <p>155 <span>фильмов</span></p>
                    <p>50 <span>фильмов</span></p>
                    <p>0 <span>фильмов</span></p>
                </div>
            </div>
            <p>Не нравятся</p>
            <div class="dislike">
                <div class="films">
                    <p>Ужасы</p>
                    <p>Триллер</p>
                    <p>Детские фильмы</p>
                </div>
                <div class="count">
                    <p>58 <span>фильмов</span></p>
                    <p>21 <span>фильмов</span></p>
                    <p>15 <span>фильмов</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="stats">
        <h2>Еще немного статистики</h2>
        <div class="stats_blogs">
            <div class="stats_count">
                <div class="stats_info_image">
                    <img src="img/icon4.png" alt="icon">
                    <p>30%</p>
                </div>
                <div class="stats_info">
                    <p>Шанс добавления фильма
                        в ваш список просмотра</p>
                </div>
            </div>
            <div class="stats_count">
                <div class="stats_info_image">
                    <img src="img/icon4.png" alt="icon">
                    <p>3</p>
                </div>
                <div class="stats_info">
                    <p>Часов вы потратили на просмотры фильмов</p>
                </div>
            </div>
            <div class="stats_count">
                <div class="stats_info_image">
                    <img src="img/icon3.png" alt="icon">
                    <p>0</p>
                </div>
                <div class="stats_info">
                    <p>Фильмов ждут,
                        чтобы вы их посмотрели</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "footer.php" ?>