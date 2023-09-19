<?php
include "mysql_conn.php";
$mysql_obj = new mysql_conn();
$mysql = $mysql_obj->GetConn();

include "class_mailbox.php";
$mailbox_obj = new mailbox_crud($mysql);

if (isset($_GET['SendBtn'])) {
    $mailbox_obj->UpdateMailbox($_GET);
    header("location:./MailBoxList.php");
}

$id = isset($_GET['mid']) ? $_GET['mid'] : -1;
$row = $mailbox_obj->GetMailbox($id);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Mailbox</title>
</head>
<body>
<h1>Update Mailbox</h1>
<form action="" method="get">
    <input type="hidden" name="id" value="<?= $id ?>" />
    <input type="text" name="lecturerName" value="<?= $row['lecturerName'] ?>" />
    <br>
    <input type="text" name="boxNumber" value="<?= $row['boxNumber'] ?>" />
    <br>
    <input type="text" name="lecturerNumber" value="<?= $row['lecturerNumber'] ?>" />
    <br>
    <button name="SendBtn" value="1">Update</button>
</form>
</body>
</html>
