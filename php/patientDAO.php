<?php
require_once 'Conexao.php';
require_once 'patient.php';   
class PatientDAO {

    public function create (Patient $patient) {
        $sql = 'INSERT INTO  patient (name, gender, number, cpf, date, adress, date_surgery, medical_history, expenses, type_surgery, doctor_name, insurance) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $patient->getName());
        $stmt->bindValue(2, $patient->getGen());
        $stmt->bindValue(3, $patient->getNum());
        $stmt->bindValue(4, $patient->getCpf());
        $stmt->bindValue(5, $patient->getDate());
        $stmt->bindValue(6, $patient->getAdr());
        $stmt->bindValue(7, $patient->getDateSurgery());
        $stmt->bindValue(8, $patient->getMedicalHistory());
        $stmt->bindValue(9, $patient->getExpenses());
        $stmt->bindValue(10, $patient->getTypeSurgery());
        $stmt->bindValue(11, $patient->getDoctor());
        $stmt->bindValue(12, $patient->getInsurance());
        $stmt->execute();
        $id = Conexao::getConn()->lastInsertid('patient');
        $patient->setId($id);
    }

    public function read(){
        $sql = 'SELECT * FROM patient';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $patients = [];
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($resultado as $row) {
                $patient = new Patient($row['name'],$row['gender'], $row['number'], $row['cpf'], $row['date'], $row['adress'], $row['date_surgery'],$row['medical_history'],$row['expenses'],$row['type_surgery'],$row['doctor_name'],$row['insurance']);
                $patient->setId($row['id']);
                $patients[] = $patient;
            }
        }return $patients;
    }

    public function SurgeryNames(){
        $sql = 'SELECT name FROM surgery';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $names = [];
        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $names[] = $row['name'];
            }
        }
        return $names;
    }
    public function DoctorNames(){
        $sql = 'SELECT id, name FROM doctor';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $names = [];
        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $names[$row['name']] = $row['name'];
            }
        }
        return $names;
    }
    

    public function update(Patient $patient) {
    $sql = 'UPDATE patient SET name=?, speciality=?, gender=?, crm=?, number=?, cpf=?, date=?, adress=? WHERE id=?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $patient->getName());
    $stmt->bindValue(2, $patient->getGen());
    $stmt->bindValue(3, $patient->getNum());
    $stmt->bindValue(4, $patient->getCpf());
    $stmt->bindValue(5, $patient->getDate());
    $stmt->bindValue(6, $patient->getDateSurgery());
    $stmt->bindValue(7, $patient->getMedicalHistory());
    $stmt->bindValue(9, $patient->getExpenses());
    $stmt->bindValue(10, $patient->getTypeSurgery());
    $stmt->bindValue(11, $patient->getDoctor());
    $stmt->bindValue(12, $patient->getInsurance());
    $stmt->execute();
}

    public function delete($id) {
        $sql = 'DELETE FROM patient WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}