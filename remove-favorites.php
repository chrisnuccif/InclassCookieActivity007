<?php
session_start();


if (isset($_GET['PaintingID'])) {
    $paintingID = $_GET['PaintingID'];

    if (isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = array_filter($_SESSION['favorites'], function($favorite) use ($paintingID) {
            return $favorite['PaintingID'] != $paintingID;
        });
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'removeAll') {
    unset($_SESSION['favorites']);
}

header("Location: view-favorites.php");
exit();
