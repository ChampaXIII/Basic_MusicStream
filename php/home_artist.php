<?php
session_start();

include_once('config.php');

$user_id = $_SESSION['id'];
$username = $_SESSION['username'];

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM artist WHERE id = '$user_id' AND username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // L'utente esiste
} else {
    $sql = "SELECT * FROM users WHERE id = '$user_id' AND username = '$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        // L'utente esiste ma è un utente
        header('Location: home_artist.php');
        exit();
    }else{
        // L'utente non esiste, reindirizza alla pagina di login
        header('Location: login.php');
        exit();
    }
}

// Fetch the songs details
$sql = "SELECT id, title FROM songs WHERE id_artist=$user_id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song Playlist CRUD</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body onload='loadSongs('<?php echo $_SESSION['id']; ?>')'>

<h2>Artist</h2>

<form id="addSongForm">
    <select>
        <option value="">Create</option>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
        <?php endwhile; ?>
        <?echo  $row['title'] ?>
    </select>
    </br>

    <label>Title:</label>
    <input type="text" id="title" required><br>

    <label>Genre:</label>
    <input type="text" id="genre" required><br>
    
    <button type="button" onclick="addSong('<?php echo $_SESSION['id']; ?>')">Add Song</button>
</form>

<ul id="songList"></ul>

<script src="../jsScript/home_artist.js"></script>

<a href="logout.php">Logout</a>
</body>
</html>
