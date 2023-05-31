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
        $id = Conexao::getConn()->lastInsertid('doctor');
        $doctor->setId($id);
    }

    public function read(){
        $sql = 'SELECT * FROM surgery';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        $surgerys = [];
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($resultado as $row) {
                $surgery = new Surgery($row['name'],$row['description']);
                $surgery->setId($row['id']);
                $surgerys[] = $surgery;
            }
        }else {
            echo '<img src="../Components/SVG/nodata.svg" alt="Sem itens na lista">';
            echo '<p>Não há itens na lista.</p>';
        }
        return $surgerys;
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

    public function delete($id) {
        $sql = 'DELETE FROM doctor WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}