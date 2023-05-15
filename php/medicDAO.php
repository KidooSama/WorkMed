<?php
require_once 'Conexao.php';
require_once 'doctor.php';   
class MedicDAO {

    public function create (Doctor $doctor) {
        $sql = 'INSERT INTO  doctor (name, speciality, gender, crm, number, cpf, date, adress ) VALUES (?,?,?,?,?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $doctor->getName());
        $stmt->bindValue(2, $doctor->getSpeciality());
        $stmt->bindValue(3, $doctor->getGen());
        $stmt->bindValue(4, $doctor->getCrm());
        $stmt->bindValue(5, $doctor->getNum());
        $stmt->bindValue(6, $doctor->getCpf());
        $stmt->bindValue(7, $doctor->getDate());
        $stmt->bindValue(8, $doctor->getAdr());
        $stmt->execute();
    }

    public function read(){
        $sql = 'SELECT * FROM doctor';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $doctors = [];
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($resultado as $row) {
                $doctor = new Doctor($row['name'],$row['speciality'],$row['gender'],$row['crm'], $row['number'], $row['cpf'], $row['date'], $row['adress'] );
                $doctors[] = $doctor;
            }
        }
        return $doctors;
    }
    

    public function update(Doctor $doctor) {
    $sql = 'UPDATE doctor SET name=?, speciality=?, gender=?, crm=?, number=?, cpf=?, date=?, adress=? WHERE id=?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $doctor->getName());
    $stmt->bindValue(2, $doctor->getSpeciality());
    $stmt->bindValue(3, $doctor->getGen());
    $stmt->bindValue(4, $doctor->getCrm());
    $stmt->bindValue(5, $doctor->getNum());
    $stmt->bindValue(6, $doctor->getCpf());
    $stmt->bindValue(7, $doctor->getDate());
    $stmt->bindValue(8, $doctor->getAdr());
    $stmt->bindValue(9, $doctor->getId());
    $stmt->execute();
}

public function getById($id) {
    $sql = 'SELECT * FROM doctor WHERE id=?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        return new Doctor($result['name'], $result['speciality'], $result['gender'], $result['crm'], $result['number'], $result['cpf'], $result['date'], $result['adress']);
    } else {
        return null;
    }
}


    public function delete($id) {
        $sql = 'DELETE FROM doctor WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}