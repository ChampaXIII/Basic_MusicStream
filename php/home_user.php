<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home - Artist</title>
</head>
<body>
    <h1>You're an artist, now your parents are disappointed. Congratulations!</h1>
</body>
</html>
