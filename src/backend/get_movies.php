<?php
require_once 'config.php'; 
header('Content-Type: application/json');
try {
    $connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
   
    $genres = isset($_GET['genres']) ? explode(',', $_GET['genres']) : [];
    $genres = array_filter($genres); 
    if (count($genres) > 0) {
        $placeholders = rtrim(str_repeat('?,', count($genres)), ',');
        $stmt = $connect->prepare("SELECT id, film_name, film_image, years, genre FROM films WHERE genre IN ($placeholders)");
        $stmt->execute($genres);
        $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($movies) {
            echo json_encode($movies);
        } else {
            echo json_encode(['message' => 'No movies found for the given genres.']);
        }
    } else {
        echo json_encode(['message' => 'No genres provided.']);
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
