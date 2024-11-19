<?php
session_start();


$paintingID = isset($_GET['PaintingID']) ? $_GET['PaintingID'] : null;
$imageFileName = isset($_GET['ImageFileName']) ? $_GET['ImageFileName'] : null;
$title = isset($_GET['Title']) ? $_GET['Title'] : null;


if ($paintingID && $imageFileName && $title) {
    if (!isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = [];
    }

    $favorites = $_SESSION['favorites'];

    $isAlreadyFavorite = false;
    foreach ($favorites as $favorite) {
        if ($favorite['PaintingID'] == $paintingID) {
            $isAlreadyFavorite = true;
            break;
        }
    }

    if (!$isAlreadyFavorite) {
        $favorites[] = [
            'PaintingID' => $paintingID,
            'ImageFileName' => $imageFileName,
            'Title' => $title
        ];

        $_SESSION['favorites'] = $favorites;
    }
}

header("Location: view-favorites.php");
exit();
