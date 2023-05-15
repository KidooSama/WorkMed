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
                $doctor = new Doctor($row['name'], $row['cpf'], $row['date'], $row['adress'], $row['speciality'], $row['crm'], $row['number'], $row['gender']);
                $doctors[] = $doctor;
            }
        }
        return $doctors;
    }
    

    public function update(Doctor $doctor) {
        $sql = 'UPDATE filme SET nome = ?, genero = ?, duracao = ? WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $doctor->getName());
        $stmt->bindValue(2, $doctor->getCpf());
        $stmt->bindValue(3, $doctor->getGen());
        $stmt->bindValue(4, $doctor->getDate());
        $stmt->bindValue(3, $doctor->getAdr());
        $stmt->bindValue(3, $doctor->getSpeciality());
        $stmt->bindValue(3, $doctor->getCrm());
        

        $stmt->execute();
    }

    public function delete($id) {
        $sql = 'DELETE FROM doctor WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}