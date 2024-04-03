<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Validate the form data (you can add more validation as per your requirements)
    if (empty($name) || empty($email) || empty($password)) {
        echo "Please fill in all the fields.";
    } else {
        // Perform the registration process here (e.g., store the data in a database)
        // You can add your own logic here to handle the registration process
        
        // Display a success message
        echo "Registration successful!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music Label Registration</title>
</head>
<body>
    <h1>Music Label Registration</h1>
    
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>