<?php

class mailbox_crud {
    private $mysql;

    function __construct($conn) {
        $this->mysql = $conn;
    }


    public function CreateMailbox() {
        $lecturerName = isset($_GET['lecturerName']) ? $_GET['lecturerName'] : "";
        $boxNumber = isset($_GET['boxNumber']) ? $_GET['boxNumber'] : "";
        $lecturerNumber = isset($_GET['lecturerNumber']) ? $_GET['lecturerNumber'] : "";

        if (!empty($lecturerName) && !empty($boxNumber) && !empty($lecturerNumber)) {
            $q = "INSERT INTO `mailbox_crud` (`lecturerName`, `boxNumber`, `lecturerNumber`) ";
            $q .= "VALUES ('$lecturerName', '$boxNumber', '$lecturerNumber')";

            $result = mysqli_query($this->mysql, $q);
        }
    }




    public function UpdateMailbox($params) {
        $id = isset($params['id']) ? $params['id'] : -1;
        $lecturerName = isset($params['lecturerName']) ? $params['lecturerName'] : "";
        $boxNumber = isset($params['boxNumber']) ? $params['boxNumber'] : "";
        $lecturerNumber = isset($params['lecturerNumber']) ? $params['lecturerNumber'] : "";
    
        if ($id > 0) {
            $q = "UPDATE `mailbox_crud` SET ";
            $q .= "`lecturerName`='$lecturerName', ";
            $q .= "`boxNumber`='$boxNumber', ";
            $q .= "`lecturerNumber`='$lecturerNumber' ";
            $q .= "WHERE id=$id";
    
            $result = mysqli_query($this->mysql, $q);
        }
    }
    
    public function GetMailboxList() {
        $q  = "SELECT * FROM `mailbox_crud` ";
        $result = mysqli_query($this->mysql, $q);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function GetMailbox($id) {
        $q  = "SELECT * FROM `mailbox_crud` ";
        $q .= " WHERE id=$id";
        $result = mysqli_query($this->mysql, $q);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function DeleteMailbox($id) {
        $q = "DELETE FROM `mailbox_crud` WHERE id=$id";
        $result = mysqli_query($this->mysql, $q);
    }
}
