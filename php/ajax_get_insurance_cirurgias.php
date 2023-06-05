<?php
require_once '../php/patientDAO.php';

if (isset($_GET['insurance'])) {
    $medico = $_GET['insurance'];

    $patientDAO = new PatientDAO();
    $numeroCirurgias = $patientDAO->getNumeroCirurgias($insurance);

    echo json_encode(['count' => $numeroCirurgias]);
    exit();
}
