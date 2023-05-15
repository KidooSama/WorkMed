<?php
require_once('MedicDao.php');

$id = $_GET['id'];

$doctorController = new MedicDAO();
$doctorController->delete($id);

header('Location: ../view/medic-list.php');

?>