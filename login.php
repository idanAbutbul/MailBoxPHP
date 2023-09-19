<?php
session_start();
$gss = isset($_SESSION['gss']) ? $_SESSION['gss'] : 0; // brut force
if ($gss < 5) {
    if (isset($_GET['btnPressed'])) {
    $password = isset($_GET['password']) ? $_GET['password'] : "";

        if ($password === "AAA") {
            header("location: MailBoxList.php");
            setcookie("MyUser",$password); // cookie poition
        } else {
            echo "Incorrect password. Try again.";
            setcookie("MyUser",0); // cookie poition
            $gss++; // brut force
        }
    }
}
else{
    echo "Incorrect password. Try again.";
}
$_SESSION['gss'] = $gss; // brut force

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
