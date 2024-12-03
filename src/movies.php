<?php session_start();
if (!($_SESSION['admin'])) {
    header('Location:login.php');
}

?>

<?php require_once "header.php" ?>

    <div class="container">

        <div class="movies_info">
            <h2>Выберите жанр</h2>
            <p>А остальное мы сделаем за вас</p>
        </div>

        <div id="buttons">
            <button class="genre-button" data-genre="Боевик">Боевик</button>
            <button class="genre-button" data-genre="Комедия">Комедия</button>
            <button class="genre-button" data-genre="Драма">Драма</button>
            <button class="genre-button" data-genre="Ужасы">Ужасы</button>
            <button class="genre-button" data-genre="Триллер">Триллер</button>
            <button class="genre-button" data-genre="Фантастика">Фантастика</button>
        </div>

    <!-- <div id="movies-list"></div> --> 
        <div class="films">
            <div id="movies-list">
                    <div class="film">Вы не выбрали жанр.</div>
                </div>
            </div>
        </div>

<?php require_once "footer.php" ?>