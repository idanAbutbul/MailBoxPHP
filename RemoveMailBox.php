<?php
include "mysql_conn.php";
$mysql_obj = new mysql_conn();
$mysql = $mysql_obj->GetConn();

include "class_mailbox.php";
$mailbox_obj = new mailbox_crud($mysql);

if (isset($_GET['remove_id'])) {
    $mailbox_id = $_GET['remove_id'];
    $mailbox_obj->DeleteMailbox($mailbox_id);
    header("location: ./MailBoxList.php");
}
?>
