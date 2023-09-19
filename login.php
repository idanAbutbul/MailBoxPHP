<?php
session_start();

if (isset($_GET['btnPressed'])) {
    $password = isset($_GET['password']) ? $_GET['password'] : "";

    if ($password === "AAA") {
        header("location: MailBoxList.php");
    } else {
        echo "Incorrect password. Try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mailbox Login</title>
</head>
<body>
<h2>Mailbox Login</h2>
<form method="GET" action="">
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <button name="btnPressed" value="1">Login</button>
</form>
</body>
</html>
