<?php
include '../db.php'; // Include database connection

function fetchMedia() {
    global $conn; // Use the database connection

    $sql = "SELECT * FROM entertainment ORDER BY created_at DESC";
    $result = $conn->query($sql);

    $mediaList = [];
    while ($row = $result->fetch_assoc()) {
        $mediaList[] = $row; // Store all media in an array
    }

    return $mediaList; // Return media data
}
?>
