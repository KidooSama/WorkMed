<?php
require_once('MedicDao.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Chame a função "delete" do objeto "DoctorDAO" para excluir o médico
    $MedicDAO = new MedicDAO();
    $MedicDAO->delete($id);
    
    // Redirecione para a página que exibe a lista atualizada de médicos
    header("Location: ../caminho/para/sua/lista-de-medicos.php");
    exit();
}
?>