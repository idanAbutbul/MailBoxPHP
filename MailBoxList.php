<?php
include "mysql_conn.php";
$mysql_obj = new mysql_conn();
$mysql = $mysql_obj->GetConn();

include "class_mailbox.php";
$mailbox_obj = new mailbox_crud($mysql);
$mailboxList = $mailbox_obj->GetMailboxList();
?>
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mailboxes List</title>
    <style>
        body{background: gray;}
        td{border:solid 2px black;}
        th{border:solid 2px black;}
    </style>
</head>
<body>
<h1>Mailboxes List</h1>
<table>
    <tr>
        <th></th>
        <th>Lecturer Name</th>
        <th>Box Number</th>
        <th>Lecturer Number</th>
        <th></th>
    </tr>
    <?php
    foreach ($mailboxList as $row) { ?>
        <tr>
            <td><a href="./editMailbox.php?mid=<?= $row['id'] ?>">Edit</a></td>
            <td><?= $row['lecturerName'] ?></td> 
            <td><?= $row['boxNumber'] ?></td> 
            <td><?= $row['lecturerNumber'] ?></td>
            <td><a href="./removeMailbox.php?remove_id=<?= $row['id'] ?>">Remove</a></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
