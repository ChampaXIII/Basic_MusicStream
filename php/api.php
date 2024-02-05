<?php
include 'config.php';

header('Content-Type: application/json');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create Song
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $title = $data['title'];
    $artist = $data['artist'];
    $genre = $data['genre'];

    $sql = "INSERT INTO songs (title, artist, genre) VALUES ('$title', '$artist', '$genre')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Song added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error adding song']);
    }
}

// Read Songs
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM songs";
    $result = mysqli_query($conn, $sql);

    $songs = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $songs[] = $row;
    }

    echo json_encode($songs);
}

// Update Song
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $data);
    $id = $data['id'];
    $title = $data['title'];
    $artist = $data['artist'];
    $genre = $data['genre'];

    $sql = "UPDATE songs SET title='$title', artist='$artist', genre='$genre' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Song updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error updating song']);
    }
}

// Delete Song
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $id = $data['id'];

    $sql = "DELETE FROM songs WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Song deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error deleting song']);
    }
}

mysqli_close($conn);

