function addSong() {
    var title = $('#title').val();
    var id_artist = document.getElementById('id_artist').innerText;
    var genre = $('#genre').val();

    if (title === '' || genre === '' || id_artist === '') {
        alert('All fields are required!');
        return;
    }
   
    $.ajax({
        url: 'api.php',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({ title: title, id_artist: id_artist, genre: genre }),
        success: function (data) {
            //alert(data.message);
            loadSongs();

            document.getElementById('title').value = '';
            document.getElementById('genre').value = '';
        }
    });
}

function editSong(id) {
    var title = prompt('Enter new title:');
    var genre = prompt('Enter new genre:');
    var id_artist = document.getElementById('id_artist').innerText;

    $.ajax({
        url: 'api.php',
        type: 'PUT',
        contentType: 'application/x-www-form-urlencoded',
        data: { id: id, title: title, id_artist: id_artist, genre: genre },
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
                //alert(data.message);
                loadSongs();
            }
        });
    }
}

function loadSongs() {
    $.ajax({
        url: 'api.php?id_artist=' + document.getElementById('id_artist').innerText,
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