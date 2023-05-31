<?php
require_once('SurgeryDao.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $surgeryDAO = new SurgeryDAO();
    $surgeryDAO->delete($id);
    header('Location: ../view/surgery-list.php');
    exit();
}
?>