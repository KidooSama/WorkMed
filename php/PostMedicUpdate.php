<?php
require_once 'medicDAO.php';

$medicDAO = new MedicDAO();
$id = $_GET['id'];
$name = $_POST['nome'];
$speciality = $_POST['especialidade'];
$gen = $_POST['genero'];
$crm = $_POST['crm'];
$num = $_POST['celular'];
$cpf = $_POST['cpf'];
$date = $_POST['data_nascimento'];
$adr = $_POST['endereco'];

$doctor = new Doctor($name, $speciality, $gen, $crm, $num, $cpf, $date, $adr);
$doctor->setId($id);
$medicDAO->update($doctor);

header('Location: ../view/medic-list.php');

?>
