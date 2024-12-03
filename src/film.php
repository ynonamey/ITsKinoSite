<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

require_once 'backend/config.php';
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}

if (isset($_GET['id'])) {
    $filmId = intval($_GET['id']);
    $stmt = $pdo->prepare("SELECT * FROM films WHERE id = :id");
    $stmt->execute(['id' => $filmId]);
    $film = $stmt->fetch();

    if (!$film) {
        echo "Фильм не найден.";
        exit;
    }
} else {
    echo "Ошибка: идентификатор фильма не указан.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['want_to_watch'])) {
    $userId = $_SESSION['admin']['id'];
    $stmt = $pdo->prepare("UPDATE users SET count_films = count_films + 1 WHERE id = :user_id");
    $stmt->execute(['user_id' => $userId]);

    $_SESSION['admin']['count_films'] += 1;
}

$message = '';
$has_liked = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['like'])) {
    $userId = $_SESSION['admin']['id'];
    $stmt = $pdo->prepare("UPDATE users SET has_liked = has_liked + 1 WHERE id = :user_id");
    $stmt->execute(['user_id' => $userId]);

    $_SESSION['admin']['count_films'] += 1;
    $message = "Мы рады, что вам понравился фильм!";
    $has_liked = true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dislike'])) {
    $message = "Спасибо за ваш отзыв!";
    $has_liked = true;
}

$has_watched = $_SESSION['admin']['count_films'] > 0;

require_once "header.php";
?>

<div class="container">
    <div class="film_info_container">
        <h1><?php echo htmlspecialchars($film['film_name']); ?></h1>
        <div class="film_info_image">
            <div class="film_info_text">
                <div class="genre_years">
                    <p><?php echo htmlspecialchars($film['genre']); ?> ,</p>
                    <p><?php echo htmlspecialchars($film['years']); ?> г.</p>
                </div>
                <div class="info">
                    <h4>
                        Описание
                    </h4>
                    <p style="font-size:1.2rem"><?php echo htmlspecialchars($film['descrition']); ?></p>
                    <h4>Детали фильма</h4>
                    <p style="font-size:1.2rem">
                        <?php echo htmlspecialchars($film['details']); ?>
                    </p>
                </div>
                <div class="buttons_film">
                    <?php if (!$has_watched): ?>
                        <form action="film.php?id=<?php echo $filmId; ?>" method="POST">
                            <button type="submit" name="want_to_watch" class="reaction">Хочу посмотреть</button>
                        </form>
                    <?php else: ?>
                        <?php if (!$has_liked): ?>
                            <div class="reaction_film">
                                <p>Вам понравился фильм?</p>
                                <form action="film.php?id=<?php echo $filmId; ?>" method="POST">
                                    <button type="submit" name="like" class="reaction">Да, рекомендую</button>
                                    <button type="submit" name="dislike" class="reaction no">Нет</button>
                                    <a href="<?php echo htmlspecialchars($film['trailer']); ?>" target="_blank" class="reaction">Трейлер</a>
                                </form>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php if ($message): ?>
                    <div class="message">
                        <p><?php echo $message; ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <img src="<?php echo htmlspecialchars($film['film_image']); ?>" alt="film">
        </div>
    </div>
</div>

<?php require_once "footer.php" ?>