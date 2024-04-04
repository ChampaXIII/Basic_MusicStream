<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song Playlist CRUD</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<h2>Song Playlist</h2>

<form id="addSongForm">
    <label>Your ID:</label>
    <p id="id_artist"><?php echo $_SESSION['id']; ?></p><br>

    <label>Title:</label>
    <input type="text" id="title" required><br>

    <label>Genre:</label>
    <input type="text" id="genre" required><br>
    
    <button type="button" onclick="addSong()">Add Song</button>
</form>

<ul id="songList"></ul>

<script src="../jsScript/home_artist.js"></script>

<a href="logout.php">Logout</a>
</body>
</html>
