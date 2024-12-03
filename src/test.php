<?php session_start();
if (!($_SESSION['admin'])) {
    header('Location:login.php');
}

?>

<?php require_once "header.php" ?>

    <div class="container">


        <div id="buttons">
            <button class="genre-button" data-genre="action">Экшен</button>
            <button class="genre-button" data-genre="comedy">Комедия</button>
            <button class="genre-button" data-genre="drama">Драма</button>
            <button class="genre-button" data-genre="horror">Ужасы</button>
            <button class="genre-button" data-genre="romance">Романтика</button>
            <button class="genre-button" data-genre="sci-fi">Научная фантастика</button>
            <button class="genre-button" data-genre="Научная фантастика">Научная фантастика</button>
        </div>

        <h2>Фильмы:</h2>
        <!-- <div id="movies-list"></div> -->
        <div id="movies-list">Вы не выбрали жанр.</div>
   
    </div>

<?php require_once "footer.php" ?>