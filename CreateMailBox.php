<?php
session_start();
include "mysql_conn.php";
$mysql_obj = new mysql_conn();
$mysql = $mysql_obj->GetConn();

if (isset($_GET['SendBtn'])) {
    if(isset($_GET['token']) && ($_GET['token'] == $_SESSION['TOKEN']) ){ // csrf protection
        include "class_mailbox.php";
    $mailbox_obj = new mailbox_crud($mysql);
    $mailbox_obj->CreateMailbox();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Mailbox</title>
</head>
<body>
<h2>Create Mailbox</h2>
<form method="GET" action="">
    <input type="hidden" name="token" value="<?= $_SESSION['TOKEN']?>" /> <!-- csrf protection !-->

    <label for="lecturerName">Lecturer Name:</label>
    <input type="text" name="lecturerName" placeholder="Lecturer Name" required /><br>

    <label for="boxNumber">Box Number:</label>
    <input type="text" name="boxNumber" placeholder="Box Number" required /><br>

    <label for="lecturerNumber">Lecturer Number:</label>
    <input type="text" name="lecturerNumber" placeholder="Lecturer Number" required /><br>

    <button name="SendBtn" value="1">Create Mailbox</button>
</form>
</body>
</html>
