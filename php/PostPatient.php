<?php
require_once 'patientDAO.php';

$patientDAO = new PatientDAO();

$name = $_POST['nome'];
$num = $_POST['celular'];
$cpf = $_POST['cpf'];
$gen = $_POST['genero'];
$date = $_POST['data_nascimento'];
$adr = $_POST['endereco'];
$date_surgery = $_POST['data_cirurgia'];
$medical_history = $_POST['hitorico'];
$doctor =  $_POST['medico'];
$expenses = $_POST['gastos'];
$type_surgeries = implode(',', $_POST['surgery']);
$insurance = $_POST['convenio'];

$patient = new Patient($num, $name, $cpf, $gen, $date, $adr, $date_surgery, $medical_history, $expenses, $type_surgery, $doctor, $insurance);
$patientDAO->create($patient);

header('Location: ../view/select-list.php');

?>
