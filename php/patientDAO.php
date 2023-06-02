<?php
require_once 'Conexao.php';
require_once 'patient.php';   
class PatientDAO {

    public function create (Patient $patient) {
        $sql = 'INSERT INTO  patient (name, cpf, gender, date, number, adress, date_surgery, room_used, insurance, doctor_name, expenses, type_surgery) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $patient->getName());
        $stmt->bindValue(2, $patient->getCpf());
        $stmt->bindValue(3, $patient->getGen());
        $stmt->bindValue(4, $patient->getDate());
        $stmt->bindValue(5, $patient->getNum());
        $stmt->bindValue(6, $patient->getAdr());
        $stmt->bindValue(7, $patient->getDateSurgery());
        $stmt->bindValue(8, $patient->getRoomUsed());
        $stmt->bindValue(9, $patient->getInsurance());
        $stmt->bindValue(10, $patient->getDoctor());
        $stmt->bindValue(11, $patient->getExpenses());
        $stmt->bindValue(12, $patient->getTypeSurgery());
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
                $patient = new Patient($row['name'],$row['cpf'], $row['gender'], $row['date'], $row['number'], $row['adress'], $row['date_surgery'],$row['room_used'],$row['insurance'],$row['doctor_name'],$row['expenses'],$row['type_surgery']);
                $patient->setId($row['id']);
                $patients[] = $patient;
            }
        }return $patients;
    }

    public function SurgeryNames(){
        $sql = 'SELECT id, name FROM surgery';
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

    public function RoomNames(){
        $sql = 'SELECT id, name FROM room';
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
    public function getPatientById($id)
    {
        $sql = 'SELECT * FROM patient WHERE id = :id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
            // Criar um objeto Patient com os dados obtidos do banco de dados
            $patient = new Patient(
                $result['name'],
                $result['cpf'],
                $result['gender'],
                $result['date'],
                $result['number'],
                $result['adress'],
                $result['date_surgery'],
                $result['room_used'],
                $result['insurance'],
                $result['doctor_name'],
                $result['expenses'],
                $result['type_surgery']
            );
    
            return $patient;
        }
    
    }
    

    public function update(Patient $patient) {
    $sql = 'UPDATE patient SET name=?, cpf=?, gender=?, date=?, number=?, adress=?, date_surgery=?, room_used=?, insurance=?, doctor_name=?, expenses=?, type_surgery=? WHERE id=?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $patient->getName());
    $stmt->bindValue(2, $patient->getCpf());
    $stmt->bindValue(3, $patient->getGen());
    $stmt->bindValue(4, $patient->getDate());
    $stmt->bindValue(5, $patient->getNum());
    $stmt->bindValue(6, $patient->getAdr());
    $stmt->bindValue(7, $patient->getDateSurgery());
    $stmt->bindValue(8, $patient->getRoomUsed());
    $stmt->bindValue(9, $patient->getInsurance());
    $stmt->bindValue(10, $patient->getDoctor());
    $stmt->bindValue(11, $patient->getExpenses());
    $stmt->bindValue(12, $patient->getTypeSurgery());
    $stmt->execute();
}

    public function delete($id) {
        $sql = 'DELETE FROM patient WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}