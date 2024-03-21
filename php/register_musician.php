<?php
session_start();

include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM artist WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['message'] = "Username already exists!";
        header('Location: register.php');
        exit;
    } else {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO artist (username, password) VALUES ('$username', '$password')";
            
        $result = mysqli_query($conn, $sql);    

        $_SESSION['message'] = 'Registration successful!';
        header('Location: login.php');

        exit;
    }

    $stmt->close();
    $conn->close();
}

/* if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = 'Registration successful!';
        header('Location: login.php');
    } else {
        $_SESSION['message'] = 'Registration failed!';
    }
} */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viva giorgio</title>
</head>
<body>

<h2>Registration Form</h2>

<?php
if (isset($_SESSION['message'])) {
    echo "<p>{$_SESSION['message']}</p>";
    unset($_SESSION['message']);
}
?>



<form method="post" action="register_musician.php">
    <label>Username:</label>
    <input type="text" name="username" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <button type="submit">Register</button>
</form>

<a href="login.php">Login</a>
<a href="regis

</body>
</html>