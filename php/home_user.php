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
    <label>Title:</label>
    <input type="text" id="title" required><br>

    <label>Artist:</label>
    <input type="text" id="artist" required><br>

    <label>Genre:</label>
    <input type="text" id="genre" required><br>

    <button type="button" onclick="addSong()">Add Song</button>
</form>

<ul id="songList"></ul>

<script>
    function addSong() {
        var title = $('#title').val();
        var artist = $('#artist').val();
        var genre = $('#genre').val();
        $.ajax({
            
            url: 'api.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ title: title, artist: artist, genre: genre }),
            success: function (data) {
                alert(data.message);
                loadSongs();

                document.getElementById('title').value = '';
                document.getElementById('artist').value = '';
                document.getElementById('genre').value = '';
            }
        });
    }

    function editSong(id) {
        var title = prompt('Enter new title:');
        var artist = prompt('Enter new artist:');
        var genre = prompt('Enter new genre:');

        $.ajax({
            url: 'api.php',
            type: 'PUT',
            contentType: 'application/x-www-form-urlencoded',
            data: { id: id, title: title, artist: artist, genre: genre },
            success: function (data) {
                alert(data.message);
                loadSongs();
            }
        });
    }

    function deleteSong(id) {
        if (confirm('Are you sure you want to delete this song?')) {
            $.ajax({
                url: 'api.php',
                type: 'DELETE',
                contentType: 'application/x-www-form-urlencoded',
                data: { id: id },
                success: function (data) {
                    alert(data.message);
                    loadSongs();
                }
            });
        }
    }

    function loadSongs() {
        $.ajax({
            url: 'api.php',
            type: 'GET',
            success: function (data) {
                displaySongs(data);
            }
        });
    }

    function displaySongs(songs) {
        var songList = $('#songList');
        songList.empty();

        $.each(songs, function (index, song) {
            songList.append(
                '<li>' +
                'Title: ' + song.title + ', Artist: ' + song.artist + ', Genre: ' + song.genre +
                ' <button onclick="editSong(' + song.id + ')">Edit</button>' +
                ' <button onclick="deleteSong(' + song.id + ')">Delete</button>' +
                '</li>'
            );
        });
    }

    $(document).ready(function () {
        // Load songs on page load
        loadSongs();
    });
</script>

</body>
</html>
