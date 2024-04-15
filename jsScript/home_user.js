function loadSongs() {
    var artist = document.getElementById('artist');
    var artistId = document.querySelector('select[name="artist"]').value;

    //alert(artistId);
    if(artistId == null) {
        $.ajax({
            url: 'api.php',
            type: 'GET',
            success: function (data) {
                displaySongs(data);
            }
        });
    }else{
        $.ajax({
            url: 'api.php?id_artist=' + artistId,
            type: 'GET',
            success: function (data) {
                displaySongs(data);
            }
        });
    }
}

function displaySongs(songs) {
    var songList = $('#songList');
    songList.empty();

    $.each(songs, function (index, song) {
        songList.append(
            '<li>' +
            'Title: ' + song.title + ', Artist: ' + song.artist_username + ', Genre: ' + song.genre +
            '</li>'
        );
    });
}

$(document).ready(function () {
    // Load songs on page load
    loadSongs();
});
